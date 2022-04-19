<?php
/**
 * @author <akartis-dev>
 */

namespace App\ObjectManager;


use Doctrine\ORM\EntityManagerInterface;

class EntityObjectManager
{
    public function __construct(private EntityManagerInterface $em)
    {
    }

    /**
     * Save new entity
     * @param $entity
     */
    public function save($entity): void
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * Update entity
     * @param $entity
     */
    public function update(): void
    {
        $this->em->flush();
    }

    /**
     * Remove entity
     * @param $entity
     */
    public function remove($entity): void
    {
        $this->em->remove($entity);
    }

    /**
     * Get entity manager
     */
    public function getEm(): EntityManagerInterface
    {
        return $this->em;
    }

    public function translate($entity, string $locale)
    {

    }
}
