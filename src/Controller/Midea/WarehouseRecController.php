<?php

namespace App\Controller\Midea;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\oracle\WMS_TN\Wmrec;
class WarehouseRecController extends AbstractController
{
    #[Route('/jbwmsapi/midea/staging/whrec', name: 'whrec', methods: ['POST'])]
    public function returnRec(Request $request, EntityManagerInterface $entityManager, ManagerRegistry $doctrine): Response
    {
        $emfordata = $doctrine->getManager('oracle');
        
        $emfordata->getConnection()->beginTransaction();
        $data = [];
        try{

            $conditionForREC= [
                'companyCode' => "TNLS",
                'branchCode' => "SA",
                'whseCode' => "W3",
                'custCode' => "MIDEA",
                'IsRecApi' => "Y",
            ];

            $recs = $emfordata->getRepository(Wmrec::class)->findBy($conditionForREC);

            if($recs){
            
               foreach ($recs as $rec){

                    $data[] = array(
                        'companyCode' => $rec->getCompanyCode(),
                        'branchCode' => $rec->getBranchCode(),
                        'whseCode' => $rec->getWhseCode(),
                        'custCode' => $rec->getCustCode(),
                        'entryNum' => $rec->getEntryNum(),
                        'entryDate' => $rec->getEntryDate(),
                        'deliveryNumber' => $rec->getDoc1(),
                        'IsRecApi' => $rec->getIsRecApi());
               }  
            }
           
            return $this->json([
                'code' => '0',
                'data' => $data
            ], 200);

        }catch(\Exception $e){
            $emfordata->getConnection()->rollBack();
            return $this->json([
                'status' => 'error',
                'msg' => $e->getMessage()
            ], 500);
        }
    }

    
}
