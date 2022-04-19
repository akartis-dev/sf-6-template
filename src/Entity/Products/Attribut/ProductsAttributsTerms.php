<?php

namespace App\Entity\Products\Attribut;

use App\Entity\Products\Products;
use App\Repository\Products\Attribut\ProductsAttributsTermsRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ProductsAttributsTermsRepository::class)]
class ProductsAttributsTerms
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: AttributTerms::class, inversedBy: 'productsList')]
    #[ORM\JoinColumn(nullable: false)]
    private AttributTerms $attributTerms;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'productsAttributsTerms')]
    #[ORM\JoinColumn(nullable: false)]
    private Products $product;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $orders;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $price;

    public function __construct()
    {
        $this->updatedAt = new \DateTime();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttributTerms(): ?AttributTerms
    {
        return $this->attributTerms;
    }

    public function setAttributTerms(?AttributTerms $attributTerms): self
    {
        $this->attributTerms = $attributTerms;

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

    public function getOrders(): ?int
    {
        return $this->orders;
    }

    public function setOrders(?int $orders): self
    {
        $this->orders = $orders;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }
}
