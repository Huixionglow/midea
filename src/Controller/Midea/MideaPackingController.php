<?php

namespace App\Controller\Midea;


use App\Entity\oracle\WMS_TN\Wmiss;
use App\Entity\oracle\WMS_TN\MasterUom;
use DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\oracle\WMS_TN\Wmissd1;
use App\Entity\oracle\WMS_TN\Wmissd2;
use App\Entity\oracle\WMS_TN\Wmstk;
use App\Entity\MideaPackingLog;



class MideaPackingController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/packing', name: 'packing', methods: ['POST'])]
    public function createPacking(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
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

        try {

            $datas=[];
            $entryNumber = $data['entry_number'];
            $companyCode = $data['company_code'];
            $branchCode = $data['branch_code'];
            $whseCode = $data['whse_code'];
            $custCode = $data['cust_code'];

            $ISSconditions = [
                'entryNum' => $entryNumber,
                'companyCode' => $companyCode,
                'branchCode' => $branchCode,
                'whseCode' => $whseCode,
                'custCode' => $custCode,
            ];
    
            $wmiss = $emfordata->getRepository(Wmiss::class)->findOneBy($ISSconditions);
            if (!$wmiss) {
                throw new \Exception('Delivery number not found.');
            }

            $wmissd1 = $emfordata->getRepository(Wmissd1::class)->findBy($ISSconditions);

            $datas[0]['ediSummary']=[
                "sender"=>"TiongNam",
                "receiver"=>"Midea",
                "ceationDatetime"=> (new DateTime())->format('Y-m-d H:i:s'),
                "transactionTimezone"=>"UTC",
                "transactionType"=>"945",
                "documentId"=>$wmiss->getCustPo()  
            ];

            $datas[0]['edi945Headers']=[
                "businessUnitId"=>$wmiss->getOriId(),
                "organizationID"=>$wmiss->getOrganizationId(),
                "businessType"=>"B2C",
                "businessScenario"=>"SELLER ORDER",
                "businessTimezone"=>"UTC",
                "shipmentIdentification"=>$wmiss->getDoc1(),
                "documentType"=>$wmiss->getDocType(),
                "shipmentDate"=> (new DateTime())->format('Y-m-d H:i:s'),
                "estimatedDeliveryDate"=>"",
                "shipmentInfoStructure"=>"",
                "orderNumber"=>$wmiss->getOrderNum(),
                "podStatus"=>"Y",
                "podInfo"=>"",
                "carrierName"=>"",
                "carrierTransMethodCode"=>"M",
                "carrierAlphaCode"=>"",
                "cartonQty"=>0,
                "weight"=>0,
                "weightUom"=>"",
                "volume"=>"",
                "volumeUom"=>"",
                "packingCode"=>"",
                "billOfLading"=>"",
                "equipmentNumber"=>"",
                "carrierProNumber"=>"",
                "palletQty"=>"",
                "appointmentNumber"=>"",
                "paymentMethod"=>"",
                "replacementMode"=>"N",
                "inboundOrderNo"=>"",
                "attribute1"=>"",
                "attribute2"=>"",
                "attribute3"=>"",
                "attribute4"=>"",
                "attribute5"=>""
            ];
            
            // $datas[0]['ediAddress']=[
            //     [
            //         "addressTypeCode"=>"SF",
            //         "addressLocationNumber"=>"",
            //         "addressName"=>"",
            //         "address1"=>"",
            //         "address2"=>"",
            //         "city"=>"",
            //         "state"=>"",
            //         "postalCode"=>"",
            //         "country"=>""
            //     ],
            //     [
            //         "addressTypeCode"=>"ST",
            //         "addressLocationNumber"=>"",
            //         "addressName"=>"",
            //         "address1"=>"",
            //         "address2"=>"",
            //         "address3"=>"",
            //         "address4"=>"",
            //         "city"=>"",
            //         "state"=>"",
            //         "postalCode"=>"",
            //         "country"=>"",
            //         "contactName"=>"",
            //         "contactPhone"=>""
            //     ]
            // ];
            
            
            
            foreach ($wmissd1 as $d1) {

                $itemConditions = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'itemCode' => $d1->getItemCode(),
                ];
    
                $masterUom = $emfordata->getRepository(MasterUom::class)->findOneBy($itemConditions);
                if (!$masterUom) {
                    throw new \Exception('MasterUom not found.');
                }

                $datas[0]['edi945Lines'][]=[
                    "lineNum" => $d1->getLineNum(),
                    "distributionOrder" => $d1->getReference(),
                    "logisticProductCode" => "",
                    "vendorPartNumber" => $d1->getItemCode(),
                    "itemDescription" => "",
                    "shipQuantity" => $d1->getPickQty(), 
                    "rejectQty" => $d1->getBalQty(),
                    "shipQtyUOM" => $masterUom->getUomCode(), 
                    "consignmentNumber" => "",
                    "logisticNumber" => "",
                    "productBatchNumber" =>$d1->getBatchNum(), 
                    "articleNumber" => "",
                    "eanNumber" => "",
                    "fromWarehouseCode" => $d1->getGradeCode(),
                    "toWarehouseCode" => "",
                    "palletMarksNumber" => "",
                    "cartonMarksNumber" => "",
                    "cartonTrackingNumber" => "",
                    "lineAttribute1" => "",
                    "lineAttribute2" => "",
                    "lineAttribute3" => "",
                    "lineAttribute4" => "",
                    "lineAttribute5" => "",
                    "lineDetails945" => []
                ];
            }

            foreach ($datas[0]['edi945Lines'] as &$lineitem){
                $ISSD2conditions = [
                    'companyCode' => $companyCode,
                    'branchCode' => $branchCode,
                    'whseCode' => $whseCode,
                    'custCode' => $custCode,
                    'itemCode' => $d1->getItemCode(),
                    'entryNum' => $d1->getEntryNum(),
                    'wmissd1Seqid' => $d1->getSeqId(),
                    
                ];
    
                $wmissd2 = $emfordata->getRepository(Wmissd2::class)->findBy($ISSD2conditions);

                foreach ($wmissd2 as $d2) {
                    
                    $lineitem['productBatchNumber'] = $d2->getBatchNum();
                    $lineitem['lineDetails945'][]=[
                        "serialNumber" => $d2->getBatchNum(),
                    ];
                }

            }
            $final_data=[
                'datas'=>$datas
            ];

            $responseFromMidea = $this->sendGItoMidea($final_data,'945');
            $responseDecoded = json_decode($responseFromMidea, true);
            $msgbody = json_decode($responseDecoded['data'], true);
            $msg = $msgbody['msg'] ?? null;
            $code = $msgbody['code'] ?? null;
           
            if($msg == 'Success' && $code == "0"){
            $Response = array(
                'seqno' => $data['entry_number'],
                'success' => true,
                'midea_response' => $responseDecoded ?? null,
                'message' => 'Packing Request ' . $data['entry_number'] . ' data created successfully',
                'data' => 'Delivery Number :' . $data['entry_number'],
            );

            $MideaPackingLog = new MideaPackingLog();
            $MideaPackingLog->setUserAgent($userAgent);
            $MideaPackingLog->setRoute($currentRoute);
            $MideaPackingLog->setRequestTime($time);
            $MideaPackingLog->setHeader(json_encode($headers));
            $MideaPackingLog->setRequestData(json_encode($data));
            $MideaPackingLog->setResponseData(json_encode($Response));
            $MideaPackingLog->setSentData(json_encode($final_data));
            $MideaPackingLog->setCreatedAt(new DateTime());


            $emforlog->persist($MideaPackingLog);
            $emforlog->flush();
            if ($emforlog->getConnection()->isTransactionActive()) {
                $emforlog->getConnection()->commit();
            }

            return $this->json($Response, Response::HTTP_OK);
        }else{
            throw new \Exception('Error in sending data to Midea' . $responseFromMidea);
        }
        } catch (\Exception $e) {
            $emfordata->getConnection()->rollBack();
            $emforlog->getConnection()->rollBack();

            $Response = array(
                'seqno' => $data['entry_number'],
                'success' => false,
                'message' => $e->getMessage(),
                'data' => 'Delivery Number :' . $data['entry_number'],
            );


            $MideaPackingLog = new MideaPackingLog();
            $MideaPackingLog->setUserAgent($userAgent);
            $MideaPackingLog->setRoute($currentRoute);
            $MideaPackingLog->setRequestTime($time);
            $MideaPackingLog->setHeader(json_encode($headers));
            $MideaPackingLog->setRequestData(json_encode($data));
            $MideaPackingLog->setResponseData($e->getMessage());
            $MideaPackingLog->setCreatedAt(new DateTime());
            $MideaPackingLog->setSentData(json_encode($final_data) ?? null);


            $emforlog->persist($MideaPackingLog);
            $emforlog->flush();
            if ($emforlog->getConnection()->isTransactionActive()) {
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
