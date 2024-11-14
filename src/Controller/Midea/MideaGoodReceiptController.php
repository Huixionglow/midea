<?php

namespace App\Controller\Midea;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\LockMode;
use Doctrine\ORM\NoResultException;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use DateTime;
use Date;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use App\Entity\MideaGoodReceiptLog;
use App\Entity\oracle\WMS_TN\Wmrec;
use App\Entity\oracle\WMS_TN\Wmrecd1;
use App\Entity\oracle\WMS_TN\Wmrecd2;





class MideaGoodReceiptController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/good_receipt', name: 'good_receipt_staging', methods: ['POST'])]
    public function good_receipt_create(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $emfordata = $doctrine->getManager('oracle');
        $emforlog = $doctrine->getManager('mysql_entry');

        $emfordata->getConnection()->beginTransaction();
        $emforlog->getConnection()->beginTransaction();

        $datas = json_decode($request->getContent(), true);

        $headers = $request->headers->all();
        $userAgent = $request->headers->get('User-Agent');
        $currentRoute = $request->get('_route');
        $currentTimestamp = new DateTime();
        $time = $currentTimestamp->format('Y-m-d H:i:s');

        try {

            $entryNumber = $datas['entry_number'];
            $companyCode = $datas['company_code'];
            $branchCode = $datas['branch_code'];
            $whseCode = $datas['whse_code'];
            $custCode = $datas['cust_code'];

            $conditionsForREC = [
                'companyCode' => $companyCode,
                'branchCode' => $branchCode,
                'whseCode' => $whseCode,
                'custCode' => $custCode,
                'entryNum' => $entryNumber,
            ];

            $WMREC = $emfordata->getRepository(Wmrec::class)->findOneBy($conditionsForREC);

            if ($WMREC) 
			{
                $data = [];
                $data[0]['ediSummary']['sender'] = 'TiongNam';
                $data[0]['ediSummary']['receiver'] = 'MIDEA';
                $data[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d");
                $data[0]['ediSummary']['transactionTimeZone'] = 'UTC';
                $data[0]['ediSummary']['transactionType'] = '944';
                $data[0]['ediSummary']['documentId'] = $WMREC->getCustPo();
                $data[0]['ediSummary']['documentNumber'] = $WMREC->getDoc1();

                $data[0]['edi944Headers']['addressName'] = $WMREC->getSupplierName() ?? "";
                $data[0]['edi944Headers']['address1'] = $WMREC->getAdd1()?? "";
                $data[0]['edi944Headers']['businessType'] = 'B2C';
                $data[0]['edi944Headers']['businessScenario'] = 'return inbound';
                $data[0]['edi944Headers']['businessTimezone'] = 'UTC';
                $data[0]['edi944Headers']['carrierName'] = '';
                $data[0]['edi944Headers']['country'] = $WMREC->getCountry()?? "";
                $data[0]['edi944Headers']['city'] = $WMREC->getCity()?? "";
                $data[0]['edi944Headers']['documentType'] = $WMREC->getDocumentType();
                $data[0]['edi944Headers']['failureReason'] = "";
                $data[0]['edi944Headers']['milOrderNo'] = $WMREC->getDoc1();
                $data[0]['edi944Headers']['orderNumber'] = $WMREC->getDoc2();
                //$data[0]['edi944Headers']['orderStatus'] = '2';
                $data[0]['edi944Headers']['orgId'] = $WMREC->getOriId();
                $data[0]['edi944Headers']['organizationId'] = $WMREC->getOrganizationId();
                $data[0]['edi944Headers']['poNumber'] = '';
                $data[0]['edi944Headers']['state'] = $WMREC->getState()?? "";
                $data[0]['edi944Headers']['postalCode'] = $WMREC->getPostalCode()?? "";
                $data[0]['edi944Headers']['shipmentIdentification'] = $WMREC->getDoc2();
                
                
				//added by rsgan 20241029
				$conditionsForRECD1 = [
                'companyCode' => $companyCode,
                'branchCode' => $branchCode,
                'whseCode' => $whseCode,
                'custCode' => $custCode,
                'entryNum' => $entryNumber,
            ];

                $WMRECD1 = $emfordata->getRepository(Wmrecd1::class)->findBy($conditionsForRECD1);
				
				
				$orderStatus = "2";
                foreach ($WMRECD1 as $d1) 
				{
					$qtyReceivedStatus = "2";
					if (number_format($d1->getImportQty()) != number_format($d1->getTotalQty()))
					{
						$qtyReceivedStatus = "1";
						$orderStatus = "1";
					}
					
					//update by rsgan 20241029 for checking partial receiving transaction close or not? 
					if (!empty($d1->getPartialRetrieveRefEntry()))
					{
						 if($this->getRecPartialComplete($emfordata, $companyCode, $branchCode, $whseCode, $custCode, $d1->getPartialRetrieveRefEntry()))
						 {
							 $qtyReceivedStatus = "2";
							 $orderStatus = "2";
						 }
						 
						 //TO GET Origin Import qty from particular item
						 
						 $importQty = $this->getRecPartialImportQty($emfordata, $companyCode, $branchCode, $whseCode, $custCode, 
						 $d1->getPartialRetrieveRefEntry(), $d1->getItemCode(), $d1->getLineNum(), $d1->getBatchNum(), $d1->getGradeCode());
						
						 $d1->setImportQty($importQty);
					}
					
                    $data[0]['edi944Lines'][] = [
                        "lineSequenceNumber" => $d1->getLineNum(),
                        "vendorPartNumber" => $d1->getItemCode(),
                        "planQty" => number_format($d1->getImportQty()),
						"qtyReceived" => number_format($d1->getTotalQty()),
                        "qtyRecUom" => $d1->getUomCode(),
						"qtyReceivedStatus" => $qtyReceivedStatus,
                        "productBatchNumber" => $d1->getBatchNum(),
                        "toWarehouseCode" => $d1->getGradeCode(),
						"transactionId" => "1",
                        "lineDetails944" => []
                    ];
			
                }
				
				$data[0]['edi944Headers']['orderStatus'] = $orderStatus;
				
				// tmp commend 1st until cfm.
				/*
                foreach ($data[0]['edi944Lines'] as &$lineitem) 
				{ 
					// Use reference to modify the original array
                    $WMRECD2 = $emfordata->getRepository(Wmrecd2::class)->findBy([

                        'entryNum' => $entryNumber,

                        //'wmrecd1Seqid' => $lineitem['consignmentNumber']

                    ]);



                    if ($WMRECD2) {


                        foreach ($WMRECD2 as $d2) {

                            $lineitem['lineDetails944'][] = [

                                "serialNumber" => $d2->getBatchNum()

                            ];
                        }
                    } else {

                        throw new \Exception("receiving data {$entryNumber} not confirm yet.");
                    }
                }
				*/
				
            } 
			else 
			{
                throw new \Exception('receiving data' . $entryNumber . ' not found');
            }
			
            $final_data = [
                'datas' => $data
            ];

            $responseFromMidea = $this->sendGItoMidea($final_data, '944');
            $responseDecoded = json_decode($responseFromMidea, true);
            if(!isset($responseDecoded['data'])){
                throw new \Exception(json_encode($responseDecoded));
            }
                
            $msgbody = json_decode($responseDecoded['data'], true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;

            if ($msg == 'Success' && $code == "0") {
                $Response = array(
                    'seqno' => $datas['entry_number'],
                    'success' => true,
                    'message' => 'GoodReceipt Request ' . $datas['entry_number'] . ' data sent successfully',
                    'data' => 'Entry Number :' . $datas['entry_number'],
                );

                $MideaGoodReceiptLog = new MideaGoodReceiptLog();
                $MideaGoodReceiptLog->setUserAgent($userAgent);
                $MideaGoodReceiptLog->setRoute($currentRoute);
                $MideaGoodReceiptLog->setRequestTime($time);
                $MideaGoodReceiptLog->setHeader(json_encode($headers));
                $MideaGoodReceiptLog->setRequestData(json_encode($datas));
                $MideaGoodReceiptLog->setResponseData(json_encode($Response));
                $MideaGoodReceiptLog->setCreatedAt(new DateTime());
                $MideaGoodReceiptLog->setSentData(json_encode($final_data));

                $emforlog->persist($MideaGoodReceiptLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }

                return $this->json($Response, Response::HTTP_OK);
            } else {
                throw new \Exception('Failed to send data to Midea'.$msg);
            }
        } catch (\Exception $e) {
            $emfordata->getConnection()->rollBack();
            $emforlog->getConnection()->rollBack();

            $Response = array(
                'seqno' => $datas['entry_number'],
                'success' => false,
                'message' => $e->getMessage(),
                'data' => 'Entry Number :' . $datas['entry_number'],
            );


            $MideaGoodReceiptLog = new MideaGoodReceiptLog();
            $MideaGoodReceiptLog->setUserAgent($userAgent);
            $MideaGoodReceiptLog->setRoute($currentRoute);
            $MideaGoodReceiptLog->setRequestTime($time);
            $MideaGoodReceiptLog->setHeader(json_encode($headers));
            $MideaGoodReceiptLog->setRequestData(json_encode($datas));
            $MideaGoodReceiptLog->setResponseData($e->getMessage());
            $MideaGoodReceiptLog->setCreatedAt(new DateTime());
            $MideaGoodReceiptLog->setSentData(json_encode($final_data ?? null));


            $emforlog->persist($MideaGoodReceiptLog);
            $emforlog->flush();
            if ($emforlog->getConnection()->isTransactionActive()) {
                $emforlog->getConnection()->commit();
            }

            return $this->json($Response, Response::HTTP_BAD_REQUEST);
        }
    }


    public function sendGItoMidea($data, $type)
    {
        $curl = curl_init();

        $bodyStr = json_encode($this->jsonSort($data));
        $timestamp = round(microtime(true) * 1000);
        $appkey = "da52988d";
        $appSecret = "3*&wM^My.ag@6O@,@";
        $key = $this->guid();
        $messageId = $this->guid();
        $nonce = round(microtime(true) * 1000);
        $str = "appkey" . $appkey . "nonce" . $nonce . "timestamp" . $timestamp . $bodyStr . $appSecret;
        $md5Hash = strtoupper(md5($str));

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://iopenapi-hk-uat.midea.com/international/IN/common',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $bodyStr,
            CURLOPT_HTTPHEADER => array(
                'appKey: ' . $appkey,
                'timestamp: ' . $timestamp,
                'vendorCode: HK-MIL',
                'application: 3PL',
                'transactionType: ' . $type,
                'messageId: ' . $messageId,
                'key: ' . $key,
                'nonce: ' . $nonce,
                'sign: ' . $md5Hash,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    private function guid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    private function jsonSort($obj)
    {
        $sortedObj = array();
        ksort($obj);
        foreach ($obj as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $sortedObj[$key] = $this->jsonSort($value);
            } else {
                $sortedObj[$key] = $value;
            }
        }
        return $sortedObj;
    }
	
	//added by rsgan 20241029
	public function getRecPartialComplete($entityManager, $company_code, $branch_code, $whse_code, $cust_code, $entry_num)
    {
		try 
		{
			$conn = $entityManager->getConnection();
			 
			$sql = "SELECT COUNT(*) as count FROM wms_elecx.vw_partial_rec_item where company_code = :company_code
			and branch_code = :branch_code
			and whse_code = :whse_code
			and cust_code = :cust_code 
			and entry_num = :entry_num ";
			//echo $sql;
			$stmt = $conn->prepare($sql);

			$params = [
				'company_code' => $company_code,
				'branch_code' => $branch_code,
				'whse_code' => $whse_code,
				'cust_code' => $cust_code,
				'entry_num' => $entry_num
			];
		   
			$result = $stmt->executeQuery($params)->fetchAssociative();
			
			return $result['count'] == 0;
		}
		catch (\Exception $e) 
		{
            return false;
		}
		
        
    }
	
	public function getRecPartialImportQty($entityManager, $company_code, $branch_code, $whse_code, $cust_code, $entry_num, $item_code, $line_num, $batch_num, $grade_code)
    {
		try 
		{
			$conn = $entityManager->getConnection();
			 
			$sql = "SELECT import_qty FROM wms_elecx.wmrecd1 
			where company_code = :company_code
			and branch_code = :branch_code
			and whse_code = :whse_code
			and cust_code = :cust_code 
			and entry_num = :entry_num 
			and item_code = :item_code 
			and line_num = :line_num 
			and batch_num = :batch_num 
			and grade_code = :grade_code ";
			//echo $sql;
			
			$stmt = $conn->prepare($sql);

			$params = [
				'company_code' => $company_code,
				'branch_code' => $branch_code,
				'whse_code' => $whse_code,
				'cust_code' => $cust_code,
				'entry_num' => $entry_num,
				'item_code' => $item_code,
				'line_num' => $line_num,
				'batch_num' => $batch_num,
				'grade_code' => $grade_code,
			];
		   
			$result = $stmt->executeQuery($params)->fetchAssociative();
			
			return $result['import_qty'];
		}
		catch (\Exception $e) 
		{
            return 0;
		}
		
        
    }
}
