<?php

namespace App\Entity\Products\Attribut;

use App\Entity\Products\Products;
use App\Repository\Products\Attribut\AttributTitleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AttributTitleRepository::class)]
class AttributTitle
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'boolean')]
    private bool $isCustom = false;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'customAttributTitles')]
    private ?Products $product;

    #[ORM\ManyToOne(targetEntity: AttributTerms::class, inversedBy: 'attributTitles')]
    private ?AttributTerms $terms;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsCustom(): ?bool
    {
        return $this->isCustom;
    }

    public function setIsCustom(bool $isCustom): self
    {
        $this->isCustom = $isCustom;

        return $this;
    }

    public function getProduct(): ?Products
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getTerms(): ?AttributTerms
    {
        return $this->terms;
    }

    public function setTerms(?AttributTerms $terms): self
    {
        $this->terms = $terms;

        return $this;
    }
}
