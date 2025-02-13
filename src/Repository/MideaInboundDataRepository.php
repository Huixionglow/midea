<?php

namespace App\Repository;

use App\Entity\MideaInboundData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MideaInboundData>
 *
 * @method MideaInboundData|null find($id, $lockMode = null, $lockVersion = null)
 * @method MideaInboundData|null findOneBy(array $criteria, array $orderBy = null)
 * @method MideaInboundData[]    findAll()
 * @method MideaInboundData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MideaInboundDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MideaInboundData::class);
    }

//    /**
//     * @return MideaInboundData[] Returns an array of MideaInboundData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MideaInboundData
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
