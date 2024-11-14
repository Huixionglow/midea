<?php

namespace App\Repository\MySQL;

use App\Entity\MySQL\Inventoryreconciliationlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Inventoryreconciliationlog>
 *
 * @method Inventoryreconciliationlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inventoryreconciliationlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inventoryreconciliationlog[]    findAll()
 * @method Inventoryreconciliationlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InventoryreconciliationlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inventoryreconciliationlog::class);
    }
}
