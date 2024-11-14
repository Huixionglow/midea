<?php

namespace App\Controller\Midea;



use App\Entity\oracle\WMS_TN\MasterUom;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\oracle\WMS_TN\Wmpick;
use App\Entity\oracle\WMS_TN\Wmpickd1;

use App\Entity\oracle\WMS_TN\Wmstk;
use App\Entity\MideaPickingLog;


class MideaPickingController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/picking', name: 'picking', methods: ['POST'])]
    public function createPicking(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
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

            $data = [];
            $entryNumber = $datas['entry_number'];
            $companyCode = $datas['company_code'];
            $branchCode = $datas['branch_code'];
            $whseCode = $datas['whse_code'];
            $custCode = $datas['cust_code'];

            $PICKconditions = [
                'entryNum' => $entryNumber,
                'companyCode' => $companyCode,
                'branchCode' => $branchCode,
                'whseCode' => $whseCode,
                'custCode' => $custCode,
            ];


            $WMPICK = $emfordata->getRepository(Wmpick::class)->findOneBy($PICKconditions);

            if ($WMPICK) {
                $data = [];

                $data[0]['ediSummary']['creationDatetime'] = (new DateTime())->format("Y-m-d H:i:s");
                $data[0]['ediSummary']['documentId'] = $WMPICK->getCustPo();
                $data[0]['ediSummary']['documentNumber'] = $WMPICK->getDoc1();
                $data[0]['ediSummary']['sender'] = 'TiongNam';
                $data[0]['ediSummary']['receiver'] = 'MIDEA';
                $data[0]['ediSummary']['transactionTimeZone'] = 'UTC';
                $data[0]['ediSummary']['transactionType'] = '870IN';

                $data[0]['edi870Headers']['businessTimezone'] = 'UTC';
                $data[0]['edi870Headers']['businessType'] = 'B2C';
                $data[0]['edi870Headers']['documentId'] = $WMPICK->getCustPo();
                $data[0]['edi870Headers']['documentType'] = 'DO';
                $data[0]['edi870Headers']['milOrderNo'] = $WMPICK->getDoc1();
                $data[0]['edi870Headers']['orderNumber'] = $WMPICK->getDoc1();
                $data[0]['edi870Headers']['orderStatus'] = '2';
                $data[0]['edi870Headers']['orgId'] = $WMPICK->getOriId();
                $data[0]['edi870Headers']['organizationId'] = $WMPICK->getOrganizationId();
                $data[0]['edi870Headers']['shipmentIdentification'] = $WMPICK->getDoc1();
                $data[0]['edi870Headers']['transactionDateTime'] = (new DateTime())->format("Y-m-d H:i:s");

                $WMPICKD1 = $emfordata->getRepository(WMpickd1::class)->findBy(['entryNum' => $entryNumber]);

                usort($WMPICKD1, function($a, $b) {
                    return $a->getLineNum() <=> $b->getLineNum();
                });

                foreach ($WMPICKD1 as $d1) {
                    $data[0]['edi870Lines'][] = [
                        "distributionOrder" => $d1->getReference(),
                        "fromWarehouseCode" => $d1->getGradeCode(),
                        "lineNumber" => $d1->getLineNum(),
                        "logisticNumber" => $d1->getLogisticNumber() ?? "",
                        "logisticProductCode" => "",
                        "productBatchNumber" => $d1->getBatchNum(),
                        "shippedQty" => $d1->getPickQty(),
                        "shipQtyUom" => $d1->getUomCode(),
                        "toWarehouseCode" => "",
                        "vendorPn" => $d1->getItemCode(),
                    ];
                }
            } else {
                throw new \Exception('picking data' . $entryNumber . ' not found');
            }

            $final_data = [
                'datas' => $data
            ];

            $responseFromMidea = $this->sendGItoMidea($final_data, '870IN');
            $responseDecoded = json_decode($responseFromMidea, true);
            $msgbody = json_decode($responseDecoded['data'] ?? null, true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;


            if ($msg == 'Success' && $code == "0") {

                $Response = array(
                    'seqno' => $datas['entry_number'],
                    'success' => true,
                    'message' => 'Picking Request ' . $datas['entry_number'] . ' data sent successfully',
                    'data' => 'Entry Number :' . $datas['entry_number'],
                );

                $MideaPickingLog = new MideaPickingLog();
                $MideaPickingLog->setUserAgent($userAgent);
                $MideaPickingLog->setRoute($currentRoute);
                $MideaPickingLog->setRequestTime($time);
                $MideaPickingLog->setHeader(json_encode($headers));
                $MideaPickingLog->setRequestData(json_encode($data));
                $MideaPickingLog->setResponseData(json_encode($responseDecoded));
                $MideaPickingLog->setCreatedAt(new DateTime());
                $MideaPickingLog->setSentData(json_encode($final_data) ?? null);

                $emforlog->persist($MideaPickingLog);
                $emforlog->flush();
                if ($emforlog->getConnection()->isTransactionActive()) {
                    $emforlog->getConnection()->commit();
                }
                return $this->json($Response, Response::HTTP_OK);
            } else {
                throw new \Exception('Bad response from Midea' . $responseFromMidea);
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


            $MideaPickingLog = new MideaPickingLog();
            $MideaPickingLog->setUserAgent($userAgent);
            $MideaPickingLog->setRoute($currentRoute);
            $MideaPickingLog->setRequestTime($time);
            $MideaPickingLog->setHeader(json_encode($headers));
            $MideaPickingLog->setRequestData(json_encode($data));
            $MideaPickingLog->setResponseData($e->getMessage());
            $MideaPickingLog->setCreatedAt(new DateTime());
            $MideaPickingLog->setSentData(json_encode($final_data) ?? null);

            $emforlog->persist($MideaPickingLog);
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
}
