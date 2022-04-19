<?php

namespace App\Repository\Products\Associated;

use App\Entity\Products\Associated\AssociatedProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AssociatedProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssociatedProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssociatedProducts[]    findAll()
 * @method AssociatedProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociatedProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssociatedProducts::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AssociatedProducts $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(AssociatedProducts $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AssociatedProducts[] Returns an array of AssociatedProducts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AssociatedProducts
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
