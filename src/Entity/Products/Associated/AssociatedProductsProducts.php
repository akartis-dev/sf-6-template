<?php

namespace App\Entity\Products\Associated;

use App\Entity\Products\Products;
use App\Repository\Products\Associated\AssociatedProductsProductsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AssociatedProductsProductsRepository::class)]
class AssociatedProductsProducts
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'associatedProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private Products $product;

    #[ORM\ManyToOne(targetEntity: AssociatedProducts::class, inversedBy: 'associatedProductsProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private AssociatedProducts $associatedProduct;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive = true;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAssociatedProduct(): ?AssociatedProducts
    {
        return $this->associatedProduct;
    }

    public function setAssociatedProduct(?AssociatedProducts $associatedProduct): self
    {
        $this->associatedProduct = $associatedProduct;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
