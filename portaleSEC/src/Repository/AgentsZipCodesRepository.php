<?php

namespace App\Repository;

use App\Entity\AgentsZipCodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AgentsZipCodes>
 *
 * @method AgentsZipCodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgentsZipCodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgentsZipCodes[]    findAll()
 * @method AgentsZipCodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentsZipCodesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AgentsZipCodes::class);
    }

//    /**
//     * @return AgentsZipCodes[] Returns an array of AgentsZipCodes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AgentsZipCodes
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
