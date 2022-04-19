<?php

namespace App\Entity\Products\Categories;

use App\Annotations\AppTranslationField;
use App\Entity\Products\Products;
use App\Repository\Products\Categories\ProductsCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: ProductsCategoriesRepository::class)]
class ProductsCategories implements TranslatableInterface
{
    use TranslatableTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive = true;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'parent')]
    #[ORM\JoinColumn(name: "parent_id", referencedColumnName: "id")]
    private $parent;

    #[AppTranslationField]
    private ?string $name;

    #[AppTranslationField]
    private ?string $metaDescription;

    #[AppTranslationField]
    private ?string $metaKeyword;

    #[AppTranslationField]
    private ?string $slug;

    #[ORM\ManyToMany(targetEntity: Products::class, inversedBy: 'productsCategories')]
    private ArrayCollection|PersistentCollection $products;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->parent = new ArrayCollection();
        $this->products = new ArrayCollection();
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function addParent(self $parent): self
    {
        if (!$this->parent->contains($parent)) {
            $this->parent[] = $parent;
            $parent->setParent($this);
        }

        return $this;
    }

    public function removeParent(self $parent): self
    {
        if ($this->parent->removeElement($parent)) {
            // set the owning side to null (unless already changed)
            if ($parent->getParent() === $this) {
                $parent->setParent(null);
            }
        }

        return $this;
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
     * @return ProductsCategories
     */
    public function setName(?string $name): ProductsCategories
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
     * @return ProductsCategories
     */
    public function setMetaDescription(?string $metaDescription): ProductsCategories
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
     * @return ProductsCategories
     */
    public function setMetaKeyword(?string $metaKeyword): ProductsCategories
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
     * @return ProductsCategories
     */
    public function setSlug(?string $slug): ProductsCategories
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        $this->products->removeElement($product);

        return $this;
    }
}
