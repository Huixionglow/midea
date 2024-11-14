<?php

namespace App\Repository;

use App\Entity\MideaInboundLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MideaInboundLog>
 *
 * @method MideaInboundLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method MideaInboundLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method MideaInboundLog[]    findAll()
 * @method MideaInboundLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MideaInboundLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MideaInboundLog::class);
    }

//    /**
//     * @return MideaInboundLog[] Returns an array of MideaInboundLog objects
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

//    public function findOneBySomeField($value): ?MideaInboundLog
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
