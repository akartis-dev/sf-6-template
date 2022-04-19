<?php

namespace App\Entity\Products\Associated;

use App\Repository\Products\Associated\AssociatedProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: AssociatedProductsRepository::class)]
class AssociatedProducts implements TranslatableInterface
{
    use TranslatableTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive = true;

    #[ORM\OneToMany(mappedBy: 'associatedProduct', targetEntity: AssociatedProductsProducts::class)]
    private ArrayCollection|PersistentCollection $associatedProductsProducts;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->associatedProductsProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, AssociatedProductsProducts>
     */
    public function getAssociatedProductsProducts(): Collection
    {
        return $this->associatedProductsProducts;
    }

    public function addAssociatedProductsProduct(AssociatedProductsProducts $associatedProductsProduct): self
    {
        if (!$this->associatedProductsProducts->contains($associatedProductsProduct)) {
            $this->associatedProductsProducts[] = $associatedProductsProduct;
            $associatedProductsProduct->setAssociatedProduct($this);
        }

        return $this;
    }

    public function removeAssociatedProductsProduct(AssociatedProductsProducts $associatedProductsProduct): self
    {
        if ($this->associatedProductsProducts->removeElement($associatedProductsProduct)) {
            // set the owning side to null (unless already changed)
            if ($associatedProductsProduct->getAssociatedProduct() === $this) {
                $associatedProductsProduct->setAssociatedProduct(null);
            }
        }

        return $this;
    }
}
