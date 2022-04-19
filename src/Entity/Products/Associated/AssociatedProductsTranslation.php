<?php

/**
 * @author <akartis-dev>
 */

namespace App\Entity\Products\Associated;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

#[ORM\Entity]
class AssociatedProductsTranslation implements TranslationInterface
{
    use TranslationTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string")]
    private ?string $name;

    #[ORM\Column(type: "text")]
    private ?string $description;

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
     * @return AssociatedProductsTranslation
     */
    public function setName(?string $name): AssociatedProductsTranslation
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
     * @return AssociatedProductsTranslation
     */
    public function setMetaDescription(?string $metaDescription): AssociatedProductsTranslation
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
     * @return AssociatedProductsTranslation
     */
    public function setMetaKeyword(?string $metaKeyword): AssociatedProductsTranslation
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
     * @return AssociatedProductsTranslation
     */
    public function setSlug(?string $slug): AssociatedProductsTranslation
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return AssociatedProductsTranslation
     */
    public function setDescription(?string $description): AssociatedProductsTranslation
    {
        $this->description = $description;
        return $this;
    }
}
