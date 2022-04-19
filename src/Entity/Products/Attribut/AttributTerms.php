<?php

namespace App\Entity\Products\Attribut;

use App\Entity\Products\Products;
use App\Repository\Products\Attribut\AttributTermsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AttributTermsRepository::class)]
class AttributTerms
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'boolean')]
    private bool $isCustom = false;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'attributTerms')]
    private Products $product;

    #[ORM\OneToMany(mappedBy: 'terms', targetEntity: AttributTitle::class)]
    private ArrayCollection|PersistentCollection $attributTitles;

    #[ORM\OneToMany(mappedBy: 'attributTerms', targetEntity: ProductsAttributsTerms::class)]
    private ArrayCollection|PersistentCollection $productsList;

    public function __construct()
    {
        $this->attributTitles = new ArrayCollection();
        $this->productsList = new ArrayCollection();
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

    /**
     * @return Collection<int, AttributTitle>
     */
    public function getAttributTitles(): Collection
    {
        return $this->attributTitles;
    }

    public function addAttributTitle(AttributTitle $attributTitle): self
    {
        if (!$this->attributTitles->contains($attributTitle)) {
            $this->attributTitles[] = $attributTitle;
            $attributTitle->setTerms($this);
        }

        return $this;
    }

    public function removeAttributTitle(AttributTitle $attributTitle): self
    {
        if ($this->attributTitles->removeElement($attributTitle)) {
            // set the owning side to null (unless already changed)
            if ($attributTitle->getTerms() === $this) {
                $attributTitle->setTerms(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductsAttributsTerms>
     */
    public function getProductsList(): Collection
    {
        return $this->productsList;
    }

    public function addProductsList(ProductsAttributsTerms $productsList): self
    {
        if (!$this->productsList->contains($productsList)) {
            $this->productsList[] = $productsList;
            $productsList->setAttributTerms($this);
        }

        return $this;
    }

    public function removeProductsList(ProductsAttributsTerms $productsList): self
    {
        if ($this->productsList->removeElement($productsList)) {
            // set the owning side to null (unless already changed)
            if ($productsList->getAttributTerms() === $this) {
                $productsList->setAttributTerms(null);
            }
        }

        return $this;
    }
}
