<?php

namespace App\Entity\Products;

use App\Annotations\AppTranslationField;
use App\Entity\Products\Associated\AssociatedProductsProducts;
use App\Entity\Products\Attribut\AttributTerms;
use App\Entity\Products\Attribut\AttributTitle;
use App\Entity\Products\Attribut\ProductsAttributsTerms;
use App\Entity\Products\Categories\ProductsCategories;
use App\Repository\Products\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products implements TranslatableInterface
{
    use TranslatableTrait;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[AppTranslationField]
    private ?string $name;

    #[AppTranslationField]
    private ?string $description;

    #[AppTranslationField]
    private ?string $metaDescription;

    #[AppTranslationField]
    private ?string $metaKeyword;

    #[AppTranslationField]
    private ?string $slug;

    #[ORM\Column(type: 'boolean')]
    private bool $isActive = true;

    #[ORM\Column(type: 'string', length: 255)]
    private string $pharmacode;

    #[ORM\Column(type: 'string', length: 255)]
    private string $gtin;

    #[ORM\Column(type: 'integer')]
    private string $price;

    #[ORM\Column(type: 'boolean')]
    private bool $prevent_image_update = false;

    #[ORM\Column(type: 'boolean')]
    private bool $has360;

    #[ORM\Column(type: 'boolean')]
    private bool $hasBackImage;

    #[ORM\Column(type: 'boolean')]
    private bool $hasInfoPatient;

    #[ORM\Column(type: 'boolean')]
    private bool $hasInfoPro;

    #[ORM\ManyToOne(targetEntity: ProductBrand::class, inversedBy: 'products')]
    private ?ProductBrand $brand;

    #[ORM\ManyToMany(targetEntity: ProductsCategories::class, mappedBy: 'products')]
    private ArrayCollection|PersistentCollection $productsCategories;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: AssociatedProductsProducts::class)]
    private ArrayCollection|PersistentCollection $associatedProducts;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: AttributTitle::class)]
    private ArrayCollection|PersistentCollection $customAttributTitles;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: AttributTerms::class)]
    private $attributTerms;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductsAttributsTerms::class)]
    private $productsAttributsTerms;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->productsCategories = new ArrayCollection();
        $this->associatedProducts = new ArrayCollection();
        $this->customAttributTitles = new ArrayCollection();
        $this->attributTerms = new ArrayCollection();
        $this->productsAttributsTerms = new ArrayCollection();
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Products
     */
    public function setName(?string $name): Products
    {
        $this->name = $name;
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
     * @return Products
     */
    public function setDescription(?string $description): Products
    {
        $this->description = $description;
        return $this;
    }

    public function getPharmacode(): ?string
    {
        return $this->pharmacode;
    }

    public function setPharmacode(string $pharmacode): self
    {
        $this->pharmacode = $pharmacode;

        return $this;
    }

    public function getGtin(): ?string
    {
        return $this->gtin;
    }

    public function setGtin(string $gtin): self
    {
        $this->gtin = $gtin;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPreventImageUpdate(): ?bool
    {
        return $this->prevent_image_update;
    }

    public function setPreventImageUpdate(bool $prevent_image_update): self
    {
        $this->prevent_image_update = $prevent_image_update;

        return $this;
    }

    public function getHas360(): ?bool
    {
        return $this->has360;
    }

    public function setHas360(bool $has360): self
    {
        $this->has360 = $has360;

        return $this;
    }

    public function getHasBackImage(): ?bool
    {
        return $this->hasBackImage;
    }

    public function setHasBackImage(bool $hasBackImage): self
    {
        $this->hasBackImage = $hasBackImage;

        return $this;
    }

    public function getHasInfoPatient(): ?bool
    {
        return $this->hasInfoPatient;
    }

    public function setHasInfoPatient(bool $hasInfoPatient): self
    {
        $this->hasInfoPatient = $hasInfoPatient;

        return $this;
    }

    public function getHasInfoPro(): ?bool
    {
        return $this->hasInfoPro;
    }

    public function setHasInfoPro(bool $hasInfoPro): self
    {
        $this->hasInfoPro = $hasInfoPro;

        return $this;
    }

    public function getBrand(): ?ProductBrand
    {
        return $this->brand;
    }

    public function setBrand(?ProductBrand $brand): self
    {
        $this->brand = $brand;

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
     * @return Products
     */
    public function setMetaDescription(?string $metaDescription): Products
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
     * @return Products
     */
    public function setMetaKeyword(?string $metaKeyword): Products
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
     * @return Products
     */
    public function setSlug(?string $slug): Products
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return Collection<int, ProductsCategories>
     */
    public function getProductsCategories(): Collection
    {
        return $this->productsCategories;
    }

    public function addProductsCategory(ProductsCategories $productsCategory): self
    {
        if (!$this->productsCategories->contains($productsCategory)) {
            $this->productsCategories[] = $productsCategory;
            $productsCategory->addProduct($this);
        }

        return $this;
    }

    public function removeProductsCategory(ProductsCategories $productsCategory): self
    {
        if ($this->productsCategories->removeElement($productsCategory)) {
            $productsCategory->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, AssociatedProductsProducts>
     */
    public function getAssociatedProducts(): Collection
    {
        return $this->associatedProducts;
    }

    public function addAssociatedProduct(AssociatedProductsProducts $associatedProduct): self
    {
        if (!$this->associatedProducts->contains($associatedProduct)) {
            $this->associatedProducts[] = $associatedProduct;
            $associatedProduct->setProduct($this);
        }

        return $this;
    }

    public function removeAssociatedProduct(AssociatedProductsProducts $associatedProduct): self
    {
        if ($this->associatedProducts->removeElement($associatedProduct)) {
            // set the owning side to null (unless already changed)
            if ($associatedProduct->getProduct() === $this) {
                $associatedProduct->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AttributTitle>
     */
    public function getCustomAttributTitles(): Collection
    {
        return $this->customAttributTitles;
    }

    public function addCustomAttributTitle(AttributTitle $customAttributTitle): self
    {
        if (!$this->customAttributTitles->contains($customAttributTitle)) {
            $this->customAttributTitles[] = $customAttributTitle;
            $customAttributTitle->setProduct($this);
        }

        return $this;
    }

    public function removeCustomAttributTitle(AttributTitle $customAttributTitle): self
    {
        if ($this->customAttributTitles->removeElement($customAttributTitle)) {
            // set the owning side to null (unless already changed)
            if ($customAttributTitle->getProduct() === $this) {
                $customAttributTitle->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AttributTerms>
     */
    public function getAttributTerms(): Collection
    {
        return $this->attributTerms;
    }

    public function addAttributTerm(AttributTerms $attributTerm): self
    {
        if (!$this->attributTerms->contains($attributTerm)) {
            $this->attributTerms[] = $attributTerm;
            $attributTerm->setProduct($this);
        }

        return $this;
    }

    public function removeAttributTerm(AttributTerms $attributTerm): self
    {
        if ($this->attributTerms->removeElement($attributTerm)) {
            // set the owning side to null (unless already changed)
            if ($attributTerm->getProduct() === $this) {
                $attributTerm->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProductsAttributsTerms>
     */
    public function getProductsAttributsTerms(): Collection
    {
        return $this->productsAttributsTerms;
    }

    public function addProductsAttributsTerm(ProductsAttributsTerms $productsAttributsTerm): self
    {
        if (!$this->productsAttributsTerms->contains($productsAttributsTerm)) {
            $this->productsAttributsTerms[] = $productsAttributsTerm;
            $productsAttributsTerm->setProduct($this);
        }

        return $this;
    }

    public function removeProductsAttributsTerm(ProductsAttributsTerms $productsAttributsTerm): self
    {
        if ($this->productsAttributsTerms->removeElement($productsAttributsTerm)) {
            // set the owning side to null (unless already changed)
            if ($productsAttributsTerm->getProduct() === $this) {
                $productsAttributsTerm->setProduct(null);
            }
        }

        return $this;
    }
}
