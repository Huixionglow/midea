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
use App\Entity\MideaReceivingLog;
use App\Entity\oracle\WMS_TN\Wmrec;
use App\Entity\oracle\WMS_TN\Wmrecd1;
use App\Entity\oracle\WMS_TN\Wmrecd2;





class MideaReceivingController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/receiving', name: 'receiving_staging', methods: ['POST'])]
    public function receiving_create(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $emfordata = $doctrine->getManager('oracle');
        $emforlog= $doctrine->getManager('mysql_entry');

        $emfordata->getConnection()->beginTransaction();
        $emforlog->getConnection()->beginTransaction();

        $datas = json_decode($request->getContent(), true);
        
        $headers = $request->headers->all();
        $userAgent = $request->headers->get('User-Agent');
        $currentRoute = $request->get('_route');
        $currentTimestamp = new DateTime();
        $time = $currentTimestamp->format('Y-m-d H:i:s');
        
        try{

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
            
            if($WMREC){
                $data=[];

                $data[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
                $data[0]['ediSummary']['documentId'] = $WMREC->getDoc3() ?? ""; 
                $data[0]['ediSummary']['documentNumber'] = $WMREC->getDoc1();
                $data[0]['ediSummary']['sender'] = 'TiongNam';
                $data[0]['ediSummary']['receiver'] = 'MIDEA';
                $data[0]['ediSummary']['transactionTimeZone'] = 'UTC';
                $data[0]['ediSummary']['transactionType'] = '870IN';
                $data[0]['ediSummary']['sender']='TiongNam';
                $data[0]['ediSummary']['receiver']='MIDEA';

                $data[0]['edi870Headers']['businessTimezone'] = 'UTC';
                $data[0]['edi870Headers']['businessType'] = 'B2C';
                $data[0]['edi870Headers']['documentId'] = $WMREC->getDoc3()?? "";
                $data[0]['edi870Headers']['documentType'] = 'DO';
                $data[0]['edi870Headers']['milOrderNo'] = $WMREC->getDoc1();
                $data[0]['edi870Headers']['orderNumber'] = $WMREC->getDoc1();
                $data[0]['edi870Headers']['orderStatus'] = '2';
                $data[0]['edi870Headers']['orgId'] = $WMREC->getOriId();
                $data[0]['edi870Headers']['organizationId'] = $WMREC->getOrganizationId();
                $data[0]['edi870Headers']['shipmentIdentification'] = $WMREC->getDoc2();
                $data[0]['edi870Headers']['transactionDateTime'] = (new DateTime())->format("Y-m-d H:i:s");

                $WMRECD1=$emfordata->getRepository(Wmrecd1::class)->findBy(['entryNum'=>$entryNumber]);

                foreach ($WMRECD1 as $d1){
                    $data[0]['edi870Lines'][]=[
                        "distributionOrder" => $d1->getItemCode(),
                        "fromWarehouseCode" => $d1->getGradeCode(),
                        "lineNumber" => $d1->getLineNum(),
                        "logisticNumber" => " ",
                        "logisticProductCode" => " ",
                        "productBatchNumber" => $d1->getBatchNum(),
                        "shippedQty" => $d1->getQty(),
                        "shipQtyUom" => $d1->getUomCode(),
                        "toWarehouseCode" => " ",
                        "vendorPn" => $d1->getItemCode(),
                    ];
                }


            }else{
                throw new \Exception('receiving data'.$entryNumber.' not found');
            }

            $final_data=[
                'datas'=>$data
            ];

            $responseFromMidea = $this->sendGItoMidea($final_data,'870IN');
            $responseDecoded = json_decode($responseFromMidea, true);
            $msgbody = json_decode($responseDecoded['data']?? null, true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;

            if($msg == 'Success' && $code == "0"){
            
                    $Response = array(
                        'seqno' => $datas['entry_number'],
                        'success' => true,
                        'midea_response' => $responseDecoded ?? null,
                        'message' => 'Receiving Request ' . $datas['entry_number'] . ' data sent successfully',
                        'data' => 'Entry Number :' .$datas['entry_number'],
                    );
                    
                    $MideaReceivingLog= new MideaReceivingLog();
                    $MideaReceivingLog->setUserAgent($userAgent);
                    $MideaReceivingLog->setRoute($currentRoute);
                    $MideaReceivingLog->setRequestTime($time);
                    $MideaReceivingLog->setHeader(json_encode($headers));
                    $MideaReceivingLog->setRequestData(json_encode($datas));
                    $MideaReceivingLog->setResponseData(json_encode($Response));
                    $MideaReceivingLog->setSentData(json_encode($final_data));
                    $MideaReceivingLog->setCreatedAt(new DateTime());
        
                    
                    $emforlog->persist($MideaReceivingLog);
                    $emforlog->flush();
                    if($emforlog->getConnection()->isTransactionActive()){
                        $emforlog->getConnection()->commit();
                    }
        
                    return $this->json($Response, Response::HTTP_CREATED);
            }else{
                throw new \Exception("Bad response from Midea API ".json_encode($responseDecoded));
            }


        } catch (\Exception $e) {
            $emfordata->getConnection()->rollBack();
            $emforlog->getConnection()->rollBack();

            $Response = array(
                'seqno' => $datas['entry_number'],
                'success' => false,
                'message' => $e->getMessage(),
                'data' => 'Entry Number :' .$datas['entry_number'],
            );
           

            $MideaReceivingLog= new MideaReceivingLog();
            $MideaReceivingLog->setUserAgent($userAgent);
            $MideaReceivingLog->setRoute($currentRoute);
            $MideaReceivingLog->setRequestTime($time);
            $MideaReceivingLog->setHeader(json_encode($headers));
            $MideaReceivingLog->setRequestData(json_encode($data));
            $MideaReceivingLog->setResponseData($e->getMessage());
            $MideaReceivingLog->setSentData(json_encode($final_data)?? null);
            $MideaReceivingLog->setCreatedAt(new DateTime());
            
            
            $emforlog->persist($MideaReceivingLog);
            $emforlog->flush();
            if($emforlog->getConnection()->isTransactionActive()){
                $emforlog->getConnection()->commit();
            }

            return $this->json($Response, Response::HTTP_BAD_REQUEST);
        }

            
    }

    public function sendGItoMidea($data,$type){
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
                'transactionType: '.$type,
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

    private function guid() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    private function jsonSort($obj) {
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
}
