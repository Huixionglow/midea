<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\IncomingRequestLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IncomingRequestLog>
 *
 * @method InboundRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method InboundRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method InboundRequest[]    findAll()
 * @method InboundRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InboundRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IncomingRequestLog::class);
    }

    public function save(IncomingRequestLog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IncomingRequestLog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IncomingRequestLog[] Returns an array of IncomingRequestLog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IncomingRequestLog
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
