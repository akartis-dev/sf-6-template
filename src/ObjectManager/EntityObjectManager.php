<?php

/**
 * @author <akartis-dev>
 */

namespace App\ObjectManager;

use App\Annotations\AppTranslationField;
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

    /**
     * Translate a new entity
     *
     * @param $entity
     * @param string $locale
     * @return mixed
     * @throws \ReflectionException
     */
    public function translate($entity, string $locale): mixed
    {
        $translatedEntity = $entity->translate($locale);
        $class = new \ReflectionClass(get_class($entity));

        foreach ($class->getProperties() as $property) {
            $attributes = $property->getAttributes();

            foreach ($attributes as $attribute) {
                if ($attribute->getName() === AppTranslationField::class) {
                    $getter = sprintf("get%s", ucfirst($property->getName()));
                    $setter = sprintf("set%s", ucfirst($property->getName()));
                    $result = $translatedEntity->$getter();
                    $entity->$setter($result);
                }
            }
        }

        return $entity;
    }
}
