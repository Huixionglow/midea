<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\OutboundRequestData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OutboundRequestData>
 *
 * @method OutboundRequestData|null find($id, $lockMode = null, $lockVersion = null)
 * @method OutboundRequestData|null findOneBy(array $criteria, array $orderBy = null)
 * @method OutboundRequestData[]    findAll()
 * @method OutboundRequestData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutboundRequestDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OutboundRequestData::class);
    }

    public function save(OutboundRequestData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OutboundRequestData $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OutboundRequestData[] Returns an array of OutboundRequestData objects
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

//    public function findOneBySomeField($value): ?OutboundRequestData
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
