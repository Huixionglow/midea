<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\TEALIVEPO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TEALIVEPO>
 *
 * @method TEALIVEPO|null find($id, $lockMode = null, $lockVersion = null)
 * @method TEALIVEPO|null findOneBy(array $criteria, array $orderBy = null)
 * @method TEALIVEPO[]    findAll()
 * @method TEALIVEPO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TEALIVEPORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TEALIVEPO::class);
    }

//    /**
//     * @return TEALIVEPO[] Returns an array of TEALIVEPO objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TEALIVEPO
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
