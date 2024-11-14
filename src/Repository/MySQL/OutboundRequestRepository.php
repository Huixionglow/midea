<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\OutgoingRequestLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OutgoingRequestLog>
 *
 * @method OutgoingRequestLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method OutgoingRequestLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method OutgoingRequestLog[]    findAll()
 * @method OutgoingRequestLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutboundRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OutgoingRequestLog::class);
    }

    public function save(OutgoingRequestLog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OutgoingRequestLog $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OutgoingRequestLog[] Returns an array of OutboundRequest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OutboundRequest
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
