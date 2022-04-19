<?php

/**
 * @author <akartis-dev>
 */

namespace App\Entity\Products\Categories;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[ORM\Entity]
class ProductsCategoriesTranslation implements TranslationInterface
{
    use TranslationTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string")]
    private ?string $name;

    #[ORM\Column(type: "string")]
    private ?string $metaDescription;

    #[ORM\Column(type: "string")]
    private ?string $metaKeyword;

    #[ORM\Column(type: "string")]
    private ?string $slug;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ProductsCategoriesTranslation
     */
    public function setName(?string $name): ProductsCategoriesTranslation
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    /**
     * @param string|null $metaDescription
     * @return ProductsCategoriesTranslation
     */
    public function setMetaDescription(?string $metaDescription): ProductsCategoriesTranslation
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMetaKeyword(): ?string
    {
        return $this->metaKeyword;
    }

    /**
     * @param string|null $metaKeyword
     * @return ProductsCategoriesTranslation
     */
    public function setMetaKeyword(?string $metaKeyword): ProductsCategoriesTranslation
    {
        $this->metaKeyword = $metaKeyword;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     * @return ProductsCategoriesTranslation
     */
    public function setSlug(?string $slug): ProductsCategoriesTranslation
    {
        $this->slug = $slug;
        return $this;
    }
}
