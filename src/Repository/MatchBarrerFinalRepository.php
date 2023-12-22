<?php

namespace App\Repository;

use App\Entity\MatchBarrerFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MatchBarrerFinal>
 *
 * @method MatchBarrerFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatchBarrerFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatchBarrerFinal[]    findAll()
 * @method MatchBarrerFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchBarrerFinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatchBarrerFinal::class);
    }

    public function add(MatchBarrerFinal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MatchBarrerFinal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MatchBarrerFinal[] Returns an array of MatchBarrerFinal objects
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

//    public function findOneBySomeField($value): ?MatchBarrerFinal
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
