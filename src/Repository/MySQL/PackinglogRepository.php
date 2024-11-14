<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\Packinglog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Packinglog>
 *
 * @method Packinglog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Packinglog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Packinglog[]    findAll()
 * @method Packinglog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackinglogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Packinglog::class);
    }
}
