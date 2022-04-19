<?php

namespace App\Repository\Products\Associated;

use App\Entity\Products\Associated\AssociatedProductsProducts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AssociatedProductsProducts|null find($id, $lockMode = null, $lockVersion = null)
 * @method AssociatedProductsProducts|null findOneBy(array $criteria, array $orderBy = null)
 * @method AssociatedProductsProducts[]    findAll()
 * @method AssociatedProductsProducts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociatedProductsProductsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AssociatedProductsProducts::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AssociatedProductsProducts $entity, bool $flush = true): void
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
    public function remove(AssociatedProductsProducts $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AssociatedProductsProducts[] Returns an array of AssociatedProductsProducts objects
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
    public function findOneBySomeField($value): ?AssociatedProductsProducts
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
