<?php

namespace App\Repository\Products\Attribut;

use App\Entity\Products\Attribut\AttributTerms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AttributTerms|null find($id, $lockMode = null, $lockVersion = null)
 * @method AttributTerms|null findOneBy(array $criteria, array $orderBy = null)
 * @method AttributTerms[]    findAll()
 * @method AttributTerms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributTermsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AttributTerms::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(AttributTerms $entity, bool $flush = true): void
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
    public function remove(AttributTerms $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return AttributTerms[] Returns an array of AttributTerms objects
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
    public function findOneBySomeField($value): ?AttributTerms
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
