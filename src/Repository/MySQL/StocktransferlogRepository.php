<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\Stocktransferlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Stocktransferlog>
 *
 * @method Stocktransferlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stocktransferlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stocktransferlog[]    findAll()
 * @method Stocktransferlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StocktransferlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stocktransferlog::class);
    }
}
