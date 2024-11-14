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
use App\Entity\MideaOutboundData;
use App\Entity\MideaOutboundLog;
use App\Entity\oracle\WMS_TN\Wmpick;
use App\Entity\oracle\WMS_TN\Wmpickd1;
use App\Entity\oracle\WMS_TN\Wmstk;
use App\Entity\oracle\WMS_TN\MasterDocument;
use App\Entity\oracle\WMS_TN\MasterUom;



class MideaOutboundController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/outbound', name: 'outbound_staging', methods: ['POST'])]
    public function outbound_create(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $emfordata = $doctrine->getManager('oracle');
        $emforlog = $doctrine->getManager('entry_number');
        $emforlogdata = $doctrine->getManager('mysql_entry');


        $emfordata->getConnection()->beginTransaction();
        $emforlog->getConnection()->beginTransaction();
        $emforlogdata->getConnection()->beginTransaction();

        $data = json_decode($request->getContent(), true);

        $headers = $request->headers->all();
        $userAgent = $request->headers->get('User-Agent');
        $currentRoute = $request->get('_route');
        $currentTimestamp = new DateTime();
        $time = $currentTimestamp->format('Y-m-d H:i:s');
        $uniqueKey = [];

        try {

            foreach ($data['datas'][0]['edi940Lines'] as $LineItem) {
                $companyCode = "TNLS";
                $branchCode = "SA";
                $whseCode = "W3";
                $custCode = "MIDEA";

                $delivery_number = $data['datas'][0]['edi940Headers']['shipmentIdentification'];

                $conditionsPICK = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'doc1' => $delivery_number,
                    'voided' => 'N',
                    'phase' => [1, 2, 3, 4],
                ];


                $existingPICK = $emfordata
                    ->getRepository(Wmpick::class)
                    ->findOneBy($conditionsPICK);


                if (!$existingPICK) {
                    $key = "$companyCode|$branchCode|$whseCode|$custCode|$delivery_number";
                    if (!isset($uniqueKey[$key])) {

                        $Wmpick = new Wmpick();
                        $Wmpick->setCompanyCode($companyCode);
                        $Wmpick->setBranchCode($branchCode);
                        $Wmpick->setWhseCode($whseCode);
                        $Wmpick->setCustCode($custCode);
                        if ($entryNumber = $this->getEntryNumber1($emforlogdata, 'MY51', 'W3', $custCode, "ISS")) {
                            $Wmpick->setEntryNum($entryNumber);
                        } else {
                            throw new \Exception('Entry Number not found');
                        }

                        $Wmpick->setMovetype('ISS');
                        $Wmpick->setPhase('1');
                        $Wmpick->setPriority('Normal');
                        $Wmpick->setEtaDate(new DateTime());
                        $Wmpick->setOrdMethod("I");
                        $Wmpick->setUserCreatedDatetime(new DateTime());
                        $Wmpick->setUserUpdateDatetime(new DateTime());
                        $Wmpick->setUserCreatedId($custCode);
                        $Wmpick->setUserUpdateId($custCode);
                        $Wmpick->setEntryDate(new DateTime());
                        $Wmpick->setDoc1($delivery_number);
                        $Wmpick->setDocType($data['datas'][0]['edi940Headers']['documentType']);
                        $Wmpick->setCustPo($data['datas'][0]['edi940Headers']['customerPo']);
                        $Wmpick->setAcctCode($data['datas'][0]['edi940Headers']['vendorNumber'] ?? null);
                        $Wmpick->setOrderNum($data['datas'][0]['edi940Headers']['orderNumber']);
                        $Wmpick->setDelivInstruction($data['datas'][0]['edi940Headers']['instructions']);

                        $Wmpick->setDelivRemark($data['datas'][0]['edi940Headers']['scheduleShipDate'] ?? null);
                        $Wmpick->setEtaDate(new DateTime($data['datas'][0]['edi940Headers']['scheduleShipDate']) ?? null);

                        $Wmpick->setDeliveryName($data['datas'][0]['edi940Headers']['addressName']);
                        $Wmpick->setDelivAdd1($data['datas'][0]['edi940Headers']['address1']);
                        $Wmpick->setDelivAdd2($data['datas'][0]['edi940Headers']['address2']);
                        $Wmpick->setDelivAdd3($data['datas'][0]['edi940Headers']['address3']);
                        $Wmpick->setDelivAdd4($data['datas'][0]['edi940Headers']['address4']);
                        $Wmpick->setDelivCity($data['datas'][0]['edi940Headers']['city']);
                        $Wmpick->setDelivState($data['datas'][0]['edi940Headers']['state']);
                        $Wmpick->setDelivPostalCode($data['datas'][0]['edi940Headers']['postalCode']);
                        $Wmpick->setDelivCountry($data['datas'][0]['edi940Headers']['country']);
                        $Wmpick->setDelivContact($data['datas'][0]['edi940Headers']['contactName']);
                        $Wmpick->setDelivTel($data['datas'][0]['edi940Headers']['contactPhone']);

                        $Wmpick->setattribute1(str_replace(['["', '"]'], '', $data['datas'][0]['edi940Headers']['attribute1']));
                        $Wmpick->setattribute2($data['datas'][0]['edi940Headers']['attribute2']);
                        $Wmpick->setattribute3($data['datas'][0]['edi940Headers']['attribute3']);
                        $Wmpick->setattribute4($data['datas'][0]['edi940Headers']['attribute4']);
                        $Wmpick->setattribute5($data['datas'][0]['edi940Headers']['attribute5']);
                        $Wmpick->setOrganizationId($data['datas'][0]['edi940Headers']['organizationId']);
                        $Wmpick->setOriId($data['datas'][0]['edi940Headers']['businessUnitId']);
                        $Wmpick->setVoided('N');

                        $Wmpick->setIsIssApi("Y");
						
						####### Added by rsgan 20241025 #######
						$pickseqid = time() . rand(1000, 9999);
						if ($pickseqid) {
							$Wmpick->setSeqid($pickseqid);
						} else {
							throw new \Exception("WMPICK_SEQID seqid not found.");
						}
						####### Added by rsgan 20241025 END #######
				
                        $uniqueKey[$key] = true;
                    }
                    $emfordata->persist($Wmpick);
                    $emfordata->flush();
                } else {
                    if ($existingPICK->getConfirm() == 'Y') {
                        throw new \Exception('PICK already confirmed');
                    } else {
                        $entryNumber = $existingPICK->getEntryNum();
                    }
                }

                if (!isset($entryNumber)) {
                    throw new \Exception('Entry Number not found');
                }

                $existingD1 = $emfordata->getRepository(Wmpickd1::class)->findOneBy([
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'entryNum' => $entryNumber,
                    'itemCode' => $LineItem['vendorPartNumber'],
                    'lineNum' => $LineItem['lineNum'],
                    'phase' => "1",
                ]);

                if ($existingD1) {
                    throw new \Exception('Duplicate D1 found.');
                }

                $Wmpickd1 = new Wmpickd1();
                $Wmpickd1->setCompanyCode($companyCode);
                $Wmpickd1->setBranchCode($branchCode);
                $Wmpickd1->setWhseCode($whseCode);
                $Wmpickd1->setCustCode($custCode);
                $Wmpickd1->setEntryNum($entryNumber);
                $Wmpickd1->setUserCreatedDatetime(new DateTime());
                $Wmpickd1->setUserUpdateDatetime(new DateTime());
                $Wmpickd1->setUserCreatedId($custCode);
                $Wmpickd1->setUserUpdateId($custCode);
                $Wmpickd1->setPickQty(0);
                $Wmpickd1->setPhase('1');
                $Wmpickd1->setLooseQty(0);
                $Wmpickd1->setLineNum($LineItem['lineNum']);
                $Wmpickd1->setReference($LineItem['distributionOrder']);
                $Wmpickd1->setItemCode($LineItem['vendorPartNumber']);
                $Wmpickd1->setQty($LineItem['orderQuantity']);
                $Wmpickd1->setImportQty($LineItem['orderQuantity']);
                $Wmpickd1->setTotalQty($LineItem['orderQuantity']);
                $Wmpickd1->setbalQty($LineItem['orderQuantity']);
                $Wmpickd1->setUomCode($LineItem['orderQtyUom']);
                $Wmpickd1->setBatchNum($LineItem['productBatchNumber']);
                $Wmpickd1->setGradeCode($LineItem['fromWarehouseCode']);
                $Wmpickd1->setPickInstruction($LineItem['productSizeDescription'] . ' ' . $LineItem['productColorDescription']);
                //$Wmpickd1->setLogisticNumber($LineItem['logisticNumber'] ?? null);

                $conditionsSTK = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'itemCode' => $LineItem['vendorPartNumber'],
                ];

                $existingSTK = $emfordata->getRepository(Wmstk::class)->findOneBy($conditionsSTK);

                if ($existingSTK) {
                    $Wmpickd1->setWmstkSeqid($existingSTK->getSeqId());
                } else {

                    throw new \Exception("Item " . $LineItem['vendorPartNumber'] . " not found in MM.");
                }

                $conditionsUOM = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'itemCode' => $LineItem['vendorPartNumber'],
                ];

                $existingUOM = $emfordata->getRepository(MasterUom::class)->findOneBy($conditionsUOM);

                if ($existingUOM) {
                    $Wmpickd1->setUomConv($existingUOM->getNom());
                } else {
                    throw new \Exception("UOM not found.");
                }

                $pickd1seqid = time() . rand(1000, 9999);
                if ($pickd1seqid) {
                    $Wmpickd1->setSeqId($pickd1seqid);
                } else {
                    throw new \Exception("WMPICKD1_SEQID seqid not found.");
                }

                $emfordata->persist($Wmpickd1);
                $emfordata->flush();

                $MideaOutboundData = new MideaOutboundData();
                $MideaOutboundData->fromArray($data['datas'][0]['ediSummary']);
                $MideaOutboundData->fromArray($data['datas'][0]['edi940Headers']);
                $MideaOutboundData->fromArray($LineItem);
                $MideaOutboundData->setIsAPI('Y');

                $emforlogdata->persist($MideaOutboundData);
                $emforlogdata->flush();

                if ($emfordata->getConnection()->isTransactionActive()) {
                    $emfordata->getConnection()->commit();
                }
            }

            $responseData = [
                'seqno' => $entryNumber ?? $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                'success' => true,
                'message' => 'Outbound Request ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'] . ' data created successfully',
                'midea_response' => null,
                'data' => 'Delivery Number: ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'],
            ];

            // Create the response object
            $response = new Response(
                json_encode($responseData), // Convert array to JSON
                Response::HTTP_OK,          // Set the HTTP status code
                ['Content-Type' => 'application/json'] // Set the content type to JSON
            );
            
            // Send the response
            $response->send();

            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();  // Tells PHP to finish the request and flush it to the client
            } else {
                // Fallback for non-FastCGI environments
                ignore_user_abort(true);  // Let the script continue even if the client disconnects
                ob_start();  // Start buffering output
                echo '';  // Ensure that the output is flushed to the client
                $size = ob_get_length();  // Get the output buffer size

                ob_end_flush();  // Flush the buffer
                flush();  // Make sure the data is sent to the client
            }

            sleep(5);

            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = ($data['datas'][0]['edi940Headers']['customerPo']);
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi940Headers']['businessUnitId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi940Headers']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'SELLER ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi940Headers']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] =  $data['datas'][0]['edi940Headers']['shipmentIdentification'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] =  $entryNumber;
            $data_997[0]['edi997Headers']['originalDocumentType'] = '940';
            $data_997[0]['edi997Headers']['documentCode'] =  $data['datas'][0]['edi940Headers']['shipmentIdentification'];
            $data_997[0]['edi997Headers']['cancelReason'] = "";
            $data_997[0]['edi997Headers']['ackDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['edi997Headers']['ackStatus'] = 'Y';

            $final_997_data = [
                'datas' => $data_997
            ];

            $responseFromMidea_997 = $this->sendGItoMidea($final_997_data, '997');
            $responseDecoded = json_decode($responseFromMidea_997, true);
            $msgbody = json_decode($responseDecoded['data'] ?? null, true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;


            if ($msg == 'Success' && $code == "0") {

                $responseData = [
                    'seqno' => $entryNumber ?? $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                    'success' => true,
                    'message' => 'Outbound Request ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'] . ' data created successfully',
                    'midea_response' => $responseDecoded,
                    'data' => 'Delivery Number: ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                ];

                $MideaOutboundLog = new MideaOutboundLog();
                $MideaOutboundLog->setUserAgent($userAgent);
                $MideaOutboundLog->setRoute($currentRoute);
                $MideaOutboundLog->setRequestTime($time);
                $MideaOutboundLog->setHeader(json_encode($headers));
                $MideaOutboundLog->setRequestData(json_encode($data));
                $MideaOutboundLog->setResponseData(json_encode($responseData));
                $MideaOutboundLog->setSentData(json_encode($final_997_data));
                $MideaOutboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaOutboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }

            } else {

                $responseData = [
                    'seqno' => $entryNumber ?? $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                    'success' => false,
                    'message' => 'Outbound Request ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'] . ' data created successfully',
                    'midea_response' => $responseDecoded,
                    'data' => 'Delivery Number: ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                ];

                $MideaOutboundLog = new MideaOutboundLog();
                $MideaOutboundLog->setUserAgent($userAgent);
                $MideaOutboundLog->setRoute($currentRoute);
                $MideaOutboundLog->setRequestTime($time);
                $MideaOutboundLog->setHeader(json_encode($headers));
                $MideaOutboundLog->setRequestData(json_encode($data));
                $MideaOutboundLog->setResponseData(json_encode($responseData));
                $MideaOutboundLog->setSentData(json_encode($final_997_data));
                $MideaOutboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaOutboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }

            }
            
            
            
        } catch (\Exception $e) {
            if ($emfordata->getConnection()->isTransactionActive()) {
                $emfordata->getConnection()->rollback();
            }
            $success = false;
            if ($e->getMessage()== "Duplicate D1 found.") {
                $success = true;
            }
            $responseData = [
                'seqno' => $entryNumber ?? $data['datas'][0]['edi940Headers']['shipmentIdentification'],
                'success' =>  $success,
                'message' => $e->getMessage(),
                'midea_response' => $responseDecoded ?? null,
                'data' => 'Delivery Number: ' . $data['datas'][0]['edi940Headers']['shipmentIdentification'],
            ];
            
            // Create the response object
            $response = new Response(
                json_encode($responseData), // Convert array to JSON
                Response::HTTP_BAD_REQUEST,          // Set the HTTP status code
                ['Content-Type' => 'application/json'] // Set the content type to JSON
            );
            
            // Send the response
            $response->send();

            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();  // Tells PHP to finish the request and flush it to the client
            } else {
                // Fallback for non-FastCGI environments
                ignore_user_abort(true);  // Let the script continue even if the client disconnects
                ob_start();  // Start buffering output
                echo '';  // Ensure that the output is flushed to the client
                $size = ob_get_length();  // Get the output buffer size

                ob_end_flush();  // Flush the buffer
                flush();  // Make sure the data is sent to the client
            }

            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = ($data['datas'][0]['edi940Headers']['customerPo']);
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi940Headers']['businessUnitId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi940Headers']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'SELLER ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi940Headers']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] =  $data['datas'][0]['edi940Headers']['shipmentIdentification'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] =  "";
            $data_997[0]['edi997Headers']['originalDocumentType'] = '940';
            $data_997[0]['edi997Headers']['documentCode'] =  $data['datas'][0]['edi940Headers']['shipmentIdentification'];
            $data_997[0]['edi997Headers']['cancelReason'] = $e->getMessage();
            $data_997[0]['edi997Headers']['ackDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['edi997Headers']['ackStatus'] = 'N';

            $final_997_data = [
                'datas' => $data_997
            ];

            $responseFromMidea_997 = $this->sendGItoMidea($final_997_data, '997');
            $responseDecoded = json_decode($responseFromMidea_997, true);
            $msgbody = json_decode($responseDecoded['data'] ?? null, true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;
            
            $MideaOutboundLog = new MideaOutboundLog();
            $MideaOutboundLog->setUserAgent($userAgent);
            $MideaOutboundLog->setRoute($currentRoute);
            $MideaOutboundLog->setRequestTime($time);
            $MideaOutboundLog->setHeader(json_encode($headers));
            $MideaOutboundLog->setRequestData(json_encode($data));
            $MideaOutboundLog->setResponseData($e->getMessage());
            $MideaOutboundLog->setSentData(json_encode($final_997_data)?? null);
            $MideaOutboundLog->setCreatedAt(new DateTime());


            $emforlog->persist($MideaOutboundLog);
            $emforlog->flush();
            if ($emforlog->getConnection()->isTransactionActive()) {
                $emforlog->getConnection()->commit();
            }
            
        }
        exit;
    }


    public function getEntryNumber1($entityManager, $plantcode, $whseCode, $custCode, $transType)
    {
        $conn = $entityManager->getConnection();
        $sql = "CALL wms_api_platform.UpdateAndGetFullId(?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->executeQuery([$plantcode, $whseCode, $custCode, $transType]);

        // Fetch the result as an associative array
        $fetchedResult = $result->fetchAssociative();
        if ($fetchedResult === false) {
            throw new \Exception("Entry Number not found.");
        }
        return $fetchedResult['full_id'];
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
}
