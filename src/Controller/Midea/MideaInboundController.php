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
use App\Entity\MideaInboundData;
use App\Entity\MideaInboundLog;
use App\Entity\oracle\WMS_TN\Wmrec;
use App\Entity\oracle\WMS_TN\Wmrecd1;
use App\Entity\oracle\WMS_TN\Wmstk;
use App\Entity\oracle\WMS_TN\MasterDocument;
use App\Entity\oracle\WMS_TN\MasterUom;
use App\Entity\oracle\WMS_TN\Wmprofile;



class MideaInboundController extends AbstractController
{
    
    #[Route('/jbwmsapi/midea/staging/inbound', name: 'inbound_staging', methods: ['POST'])]
    public function inbound_create(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
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

            foreach ($data['datas'][0]['edi943Lines'] as $LineItem) {
                $companyCode = "TNLS";
                $branchCode = "SA";
                $whseCode = "W3";
                $custCode = "MIDEA";

                $delivery_number = $data['datas'][0]['edi943Headers']['documentNumber'];

                $conditionsREC = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'doc1' => $delivery_number,
                    'voided' => 'N',
                    'phase' => [1, 2, 3, 4],
                ];


                $existingREC = $emfordata
                    ->getRepository(Wmrec::class)
                    ->findOneBy($conditionsREC);

                if (!$existingREC) {
                    $key = "$companyCode|$branchCode|$whseCode|$custCode|$delivery_number";
                    if (!isset($uniqueKey[$key])) {

                        $Wmrec = new Wmrec();
                        $Wmrec->setCompanyCode($companyCode);
                        $Wmrec->setBranchCode($branchCode);
                        $Wmrec->setWhseCode($whseCode);
                        $Wmrec->setCustCode($custCode);
                        $Wmrec->setMovetype('REC');
                        $Wmrec->setPhase('1');
                        $Wmrec->setPriority('Normal');
                        $Wmrec->setEtaDate(new DateTime());

                        if ($entryNumber = $this->getEntryNumber1($emforlogdata, 'MY51', 'W3', $custCode, "REC")) {
                            $Wmrec->setEntryNum($entryNumber);
                        } else {
                            throw new \Exception('Entry Number not found');
                        }

                        $Wmrec->setDoc1($delivery_number);
                        $Wmrec->setOrganizationId($data['datas'][0]['edi943Headers']['organizationId']);
                        $Wmrec->setOriId($data['datas'][0]['edi943Headers']['orgId']);
                        $Wmrec->setCity($data['datas'][0]['edi943Headers']['city']);
                        $Wmrec->setCountry($data['datas'][0]['edi943Headers']['country']);
                        $Wmrec->setSupplierName($data['datas'][0]['edi943Headers']['addressName']);
                        $Wmrec->setAdd1($data['datas'][0]['edi943Headers']['address1']);
                        $Wmrec->setAdd2($data['datas'][0]['edi943Headers']['address2']);
                        $Wmrec->setPostalCode($data['datas'][0]['edi943Headers']['postalCode']);
                        $Wmrec->setState($data['datas'][0]['edi943Headers']['state']);
                        $Wmrec->setDoc2($data['datas'][0]['edi943Headers']['shipmentIdentification']);
                        $Wmrec->setCustPo($data['datas'][0]['edi943Headers']['attribute2']);
                        $Wmrec->setDoc3($data['datas'][0]['ediSummary']['documentId']);
                        $Wmrec->setUserCreatedDatetime(new DateTime());
                        $Wmrec->setDocumentType($data['datas'][0]['edi943Headers']['documentType']);
                        $Wmrec->setUserUpdateDatetime(new DateTime());
                        $Wmrec->setUserCreatedId($custCode);
                        $Wmrec->setUserUpdateId($custCode);
                        $Wmrec->setEntryDate(new DateTime());
                        $Wmrec->setRecMethod('I');
                        $Wmrec->setClose('N');
                        $Wmrec->setIsRecApi('Y');

                        ####### Added by rsgan 20241025 #######
                        $wmrecSeqid = time() . rand(1000, 9999);
                        if ($wmrecSeqid) {
                            $Wmrec->setSeqid($wmrecSeqid);
                        } else {
                            throw new \Exception("WMREC_SEQID seqid not found.");
                        }
                        ####### Added by rsgan 20241025 END #######

                        $uniqueKey[$key] = true;
                    }
                    $emfordata->persist($Wmrec);
                    $emfordata->flush();
                } else {
                    if ($existingREC->getConfirm() == 'Y') {
                        throw new \Exception('REC already confirmed');
                    } else {
                        $entryNumber = $existingREC->getEntryNum();
                    }
                }

                if (!isset($entryNumber)) {
                    throw new \Exception('Entry Number not found');
                }

                $conditionsSTK = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'itemCode' => ($LineItem['vendorPartNumber']),
                ];

                $existingSTK = $emfordata
                    ->getRepository(Wmstk::class)
                    ->findOneBy($conditionsSTK);
                if ($existingSTK) {
                    $uom = $existingSTK->getUomCode();
                } else {
                    throw new \Exception('ITEM not found');
                }

                $existingUOM = $emfordata
                    ->getRepository(MasterUom::class)
                    ->findOneBy($conditionsSTK);
                if ($existingUOM) {
                    $NOM = $existingUOM->getNom();
                } else {
                    $NOM = '1';
                }

                $existingD1 = $emfordata->getRepository(Wmrecd1::class)->findOneBy([
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'entryNum' => $entryNumber,
                    'itemCode' => $LineItem['vendorPartNumber'],
                    'lineNum' => $LineItem['lineNumber'],
                    'phase' => "1",
                ]);

                if ($existingD1) {
                    throw new \Exception('Duplicate D1 found.');
                }

                $Wmrecd1 = new Wmrecd1();

                $Wmrecd1->setCompanyCode($companyCode);
                $Wmrecd1->setBranchCode($branchCode);
                $Wmrecd1->setWhseCode($whseCode);
                $Wmrecd1->setCustCode($custCode);
                $Wmrecd1->setEntryNum($entryNumber);

                $Wmrecd1->setLineNum($LineItem['lineNumber']);
                if (null !== $LineItem['orderQtyUom']) {
                    $Wmrecd1->setUomCode($LineItem['orderQtyUom']);
                } else {
                    $Wmrecd1->setUomCode($uom);
                }
                //$Wmrecd1->setKey1($LineItem['toWarehouseCode']);
                $Wmrecd1->setGradeCode($LineItem['toWarehouseCode']);
                $Wmrecd1->setItemCode($LineItem['vendorPartNumber']);

                $Wmrecd1->setQty($LineItem['orderQuantity']);
                $Wmrecd1->setImportQty($LineItem['orderQuantity']);
                $Wmrecd1->setTotalQty($LineItem['orderQuantity']);
                $Wmrecd1->setPutawayBal($LineItem['orderQuantity']);

                $Wmrecd1->setBatchNum($LineItem['productBatchNumber']);
                $Wmrecd1->setUserCreatedDatetime(new DateTime());
                $Wmrecd1->setUserUpdateDatetime(new DateTime());
                $Wmrecd1->setUserCreatedId($custCode);
                $Wmrecd1->setUserUpdateId($custCode);
                $Wmrecd1->setkey2(new DateTime());
                $Wmrecd1->setLooseQty(0);
                $Wmrecd1->setPutawayQty(0);
                $Wmrecd1->setUomConv('1');
                $Wmrecd1->setPhase('1');
                $Wmrecd1->setUomConv($NOM);
                $Wmrecd1->setUserCreatedId($custCode);
                if ($existingSTK) {
                    $Wmrecd1->setWmstkSeqid($existingSTK->getSeqId());
                } else {
                    throw new \Exception("WMSTK not found.");
                }
                $seqid = time() . rand(1000, 9999);
                if ($seqid) {
                    $Wmrecd1->setSeqId($seqid);
                } else {
                    throw new \Exception('Seq Id not found');
                }

                $emfordata->persist($Wmrecd1);
                $emfordata->flush();

                $MideaInboundData = new MideaInboundData();
                $MideaInboundData->fromArray($data['datas'][0]['ediSummary']);
                $MideaInboundData->fromArray($data['datas'][0]['edi943Headers']);
                $MideaInboundData->fromArray($LineItem);
                $MideaInboundData->setIsAPI('Y');

                $emforlogdata->persist($MideaInboundData);
                $emforlogdata->flush();

                if ($emfordata->getConnection()->isTransactionActive()) {
                    $emfordata->getConnection()->commit();
                }
            }

            $Response = array(
                'seqno' => $entryNumber,
                'success' => true,
                'message' => 'Inbound Request ' . $data['datas'][0]['edi943Headers']['documentNumber'] . ' data created successfully',
                'midea_response' => $responseDecoded ?? null,
                'data' => 'Delivery Number :' . $data['datas'][0]['edi943Headers']['documentNumber'],
            );

            // Create the response object
            $response = new Response(
                json_encode($Response), // Convert array to JSON
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

            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = $data['datas'][0]['edi943Headers']['attribute2'];
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi943Headers']['orgId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi943Headers']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'SELLER ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi943Headers']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] = $data['datas'][0]['edi943Headers']['documentNumber'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] = $entryNumber;
            $data_997[0]['edi997Headers']['originalDocumentType'] = '943';
            $data_997[0]['edi997Headers']['documentCode'] = $data['datas'][0]['edi943Headers']['documentNumber'];
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

                $Response = array(
                    'seqno' => $entryNumber,
                    'success' => true,
                    'message' => 'Inbound Request ' . $data['datas'][0]['edi943Headers']['documentNumber'] . ' data created successfully',
                    'midea_response' => $responseDecoded ?? null,
                    'data' => 'Delivery Number :' . $data['datas'][0]['edi943Headers']['documentNumber'],
                );


                $MideaInboundLog = new MideaInboundLog();
                $MideaInboundLog->setUserAgent($userAgent);
                $MideaInboundLog->setRoute($currentRoute);
                $MideaInboundLog->setRequestTime($time);
                $MideaInboundLog->setHeader(json_encode($headers));
                $MideaInboundLog->setRequestData(json_encode($data));
                $MideaInboundLog->setResponseData(json_encode($Response));
                $MideaInboundLog->setSentData(json_encode($final_997_data));
                $MideaInboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaInboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }
            } else {

                $Response = array(
                    'seqno' => $entryNumber,
                    'success' => false,
                    'message' => 'Inbound Request ' . $data['datas'][0]['edi943Headers']['documentNumber'] . ' data created successfully',
                    'midea_response' => $responseDecoded ?? null,
                    'data' => 'Delivery Number :' . $data['datas'][0]['edi943Headers']['documentNumber'],
                );


                $MideaInboundLog = new MideaInboundLog();
                $MideaInboundLog->setUserAgent($userAgent);
                $MideaInboundLog->setRoute($currentRoute);
                $MideaInboundLog->setRequestTime($time);
                $MideaInboundLog->setHeader(json_encode($headers));
                $MideaInboundLog->setRequestData(json_encode($data));
                $MideaInboundLog->setResponseData(json_encode($Response));
                $MideaInboundLog->setSentData(json_encode($final_997_data));
                $MideaInboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaInboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }
            }

        } catch (\Exception $e) {
            if ($emfordata->getConnection()->isTransactionActive()) {
                $emfordata->getConnection()->rollback();
            }

            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = $data['datas'][0]['edi943Headers']['attribute2'];
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi943Headers']['orgId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi943Headers']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'SELLER ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi943Headers']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] = $data['datas'][0]['edi943Headers']['documentNumber'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] = "";
            $data_997[0]['edi997Headers']['originalDocumentType'] = '943';
            $data_997[0]['edi997Headers']['documentCode'] = $data['datas'][0]['edi943Headers']['documentNumber'];
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

            $success = false;
            if ($e->getMessage()== "Duplicate D1 found.") {
                $success = true;
            }

            $Response = array(
                'seqno' => $data['datas'][0]['edi943Headers']['documentNumber'],
                'success' => $success,
                'message' => $e->getMessage() . ' response from Midea API ' . $responseFromMidea_997,
                'data' => 'Delivery Number :' . $data['datas'][0]['edi943Headers']['documentNumber'],
            );

            // Create the response object
            $response = new Response(
                json_encode($Response), // Convert array to JSON
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

            $MideaInboundLog = new MideaInboundLog();
            $MideaInboundLog->setUserAgent($userAgent);
            $MideaInboundLog->setRoute($currentRoute);
            $MideaInboundLog->setRequestTime($time);
            $MideaInboundLog->setHeader(json_encode($headers));
            $MideaInboundLog->setRequestData(json_encode($data));
            $MideaInboundLog->setResponseData($e->getMessage());
            $MideaInboundLog->setCreatedAt(new DateTime());
            $MideaInboundLog->setSentData(json_encode($final_997_data) ?? null);


            $emforlog->persist($MideaInboundLog);
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
