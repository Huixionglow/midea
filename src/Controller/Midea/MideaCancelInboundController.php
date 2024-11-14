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
use App\Entity\MideaCancelInboundLog;
use App\Entity\oracle\WMS_TN\Wmrec;
use App\Entity\oracle\WMS_TN\Wmrecd1;
use App\Entity\oracle\WMS_TN\Wmstk;
use App\Entity\oracle\WMS_TN\MasterDocument;
use App\Entity\oracle\WMS_TN\MasterUom;
use App\Entity\oracle\WMS_TN\Wmprofile;



class MideaCancelInboundController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/cancel_inbound', name: 'cancel_inbound_staging', methods: ['POST'])]
    public function inbound_create(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {

        $emfordata = $doctrine->getManager('oracle');
        $emforlog = $doctrine->getManager('mysql_entry');

        $emfordata->getConnection()->beginTransaction();
        $emforlog->getConnection()->beginTransaction();

        $data = json_decode($request->getContent(), true);

        $headers = $request->headers->all();
        $userAgent = $request->headers->get('User-Agent');
        $currentRoute = $request->get('_route');
        $currentTimestamp = new DateTime();
        $time = $currentTimestamp->format('Y-m-d H:i:s');

        $entrynumber = null;

        try {

            $companyCode = "TNLS";
            $branchCode = "SA";
            $whseCode = "W3";
            $custCode = "MIDEA";
            $cancelDeliveryNumber = $data['datas'][0]['edi943crHeaders']['documentCode'];

            $conditionREC = [
                'companyCode' => $companyCode,
                'branchCode' => $branchCode,
                'whseCode' => $whseCode,
                'custCode' => $custCode,
                'doc1' => $cancelDeliveryNumber,
                'phase' => 1,
                'confirm' => 'N'
            ];

            $existingREC = $emfordata->getRepository(Wmrec::class)->findOneBy($conditionREC);

            if ($existingREC) {
                $existingREC->setVoided('Y');
                $existingREC->setVoidDate(new \DateTime(date('Y-m-d H:i:s')));
                $existingREC->setphase(5);
                $entrynumber = $existingREC->getEntryNum();

                $conditionRECD1 = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'entryNum' => $entrynumber
                ];

                $existingRECD1 = $emfordata->getRepository(Wmrecd1::class)->findBy($conditionRECD1);

                foreach ($existingRECD1 as $recd1) {
                    $recd1->setphase(4);
                    $emfordata->persist($recd1);
                }
                $emfordata->persist($existingREC);
                $emfordata->flush();
            } else {
                throw new \Exception("Delivery Number not found.");
            }

            if ($emfordata->getConnection()->isTransactionActive()) {
                $emfordata->getConnection()->commit();
            }


            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = ($data['datas'][0]['ediSummary']['documentId']);
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi943crHeaders']['businessUnitId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi943crHeaders']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'CANCEL ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi943crHeaders']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] =  $data['datas'][0]['edi943crHeaders']['originalDocumentID'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] =  $entrynumber ?? "";
            $data_997[0]['edi997Headers']['originalDocumentType'] = '943CR';
            $data_997[0]['edi997Headers']['documentCode'] =  $data['datas'][0]['edi943crHeaders']['documentCode'];
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
                    'seqno' => $entrynumber ?? "",
                    'success' => true,
                    'message' => 'Inbound Request ' . $data['datas'][0]['edi943crHeaders']['documentCode'] . ' data cancel successfully',
                    'midea_response' => $responseDecoded,
                    'data' => 'Delivery Number :' . $data['datas'][0]['edi943crHeaders']['documentCode'],
                );

                $MideaCancelInboundLog = new MideaCancelInboundLog();
                $MideaCancelInboundLog->setUserAgent($userAgent);
                $MideaCancelInboundLog->setRoute($currentRoute);
                $MideaCancelInboundLog->setRequestTime($time);
                $MideaCancelInboundLog->setHeader(json_encode($headers));
                $MideaCancelInboundLog->setRequestData(json_encode($data));
                $MideaCancelInboundLog->setResponseData(json_encode($Response));
                $MideaCancelInboundLog->setSentData(json_encode($final_997_data));
                $MideaCancelInboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaCancelInboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }
            } else {

                $Response = array(
                    'seqno' => $entrynumber ?? "",
                    'success' => false,
                    'message' => 'Inbound Request ' . $data['datas'][0]['edi943crHeaders']['documentCode'] . ' data cancel successfully',
                    'midea_response' => $responseDecoded,
                    'data' => 'Delivery Number :' . $data['datas'][0]['edi943crHeaders']['documentCode'],
                );

                $MideaCancelInboundLog = new MideaCancelInboundLog();
                $MideaCancelInboundLog->setUserAgent($userAgent);
                $MideaCancelInboundLog->setRoute($currentRoute);
                $MideaCancelInboundLog->setRequestTime($time);
                $MideaCancelInboundLog->setHeader(json_encode($headers));
                $MideaCancelInboundLog->setRequestData(json_encode($data));
                $MideaCancelInboundLog->setResponseData(json_encode($Response));
                $MideaCancelInboundLog->setSentData(json_encode($final_997_data));
                $MideaCancelInboundLog->setCreatedAt(new DateTime());


                $emforlog->persist($MideaCancelInboundLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }
            }

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
        } catch (\Exception $e) {
            $emfordata->getConnection()->rollBack();
            $emforlog->getConnection()->rollBack();

            $data_997 = [];

            $data_997[0]['ediSummary']['sender'] = 'TiongNam';
            $data_997[0]['ediSummary']['receiver'] = 'MIDEA';
            $data_997[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
            $data_997[0]['ediSummary']['transactionTimeZone'] = 'UTC';
            $data_997[0]['ediSummary']['transactionType'] = '997';
            $data_997[0]['ediSummary']['documentId'] = ($data['datas'][0]['ediSummary']['documentId']);
            $data_997[0]['edi997Headers']['orgId'] = $data['datas'][0]['edi943crHeaders']['businessUnitId'];
            $data_997[0]['edi997Headers']['organizationId'] = $data['datas'][0]['edi943crHeaders']['organizationId'];
            $data_997[0]['edi997Headers']['businessType'] = 'B2C';
            $data_997[0]['edi997Headers']['businessScenario'] = 'CANCEL ORDER';
            $data_997[0]['edi997Headers']['businessTimezone'] = 'UTC';
            $data_997[0]['edi997Headers']['documentType'] = $data['datas'][0]['edi943crHeaders']['documentType'];
            $data_997[0]['edi997Headers']['originalDocumentId'] =  $data['datas'][0]['edi943crHeaders']['originalDocumentID'];
            $data_997[0]['edi997Headers']['partnerOrderNumber'] =  $entrynumber ?? "";
            $data_997[0]['edi997Headers']['originalDocumentType'] = '943CR';
            $data_997[0]['edi997Headers']['documentCode'] =  $data['datas'][0]['edi943crHeaders']['documentCode'];
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

            $Response = array(
                'seqno' => $data['datas'][0]['edi943crHeaders']['documentCode'],
                'success' => false,
                'message' => $e->getMessage() . ' response from Midea API ' . $responseFromMidea_997,
                'data' => 'Delivery Number :' . $data['datas'][0]['edi943crHeaders']['documentCode'],
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



            $MideaCancelInboundLog = new MideaCancelInboundLog();
            $MideaCancelInboundLog->setUserAgent($userAgent);
            $MideaCancelInboundLog->setRoute($currentRoute);
            $MideaCancelInboundLog->setRequestTime($time);
            $MideaCancelInboundLog->setHeader(json_encode($headers));
            $MideaCancelInboundLog->setRequestData(json_encode($data));
            $MideaCancelInboundLog->setResponseData($e->getMessage());
            $MideaCancelInboundLog->setCreatedAt(new DateTime());
            $MideaCancelInboundLog->setSentData(json_encode($final_997_data));


            $emforlog->persist($MideaCancelInboundLog);
            $emforlog->flush();
            if ($emforlog->getConnection()->isTransactionActive()) {
                $emforlog->getConnection()->commit();
            }
        }
        exit;
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
