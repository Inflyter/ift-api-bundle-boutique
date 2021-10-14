<?php

namespace App\Inflyter\BoutiqueBundle\Entity\Shop;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Inflyter\BoutiqueBundle\Repository\Shop\BoutiqueElementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=BoutiqueElementRepository::class)
 */
#[ApiResource(mercure: true)]

class BoutiqueElement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=BoutiqueSection::class, inversedBy="boutiqueElements")
     */
    private BoutiqueSection $boutiqueSection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $elementType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $headline;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private ?string $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $imageUrl;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $productTag;

    private ?array $productsUrl = null;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $marginTop;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $marginBottom;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $position;

    /**
     * @ORM\OneToMany(targetEntity=BoutiqueElementAssets::class, mappedBy="boutiqueElement")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private ArrayCollection $boutiqueElementAssets;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $elementSize;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $elementActionType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $productOffsetInUi;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $productLimitInUi;

    /**
     * @ORM\OneToOne(targetEntity=BoutiqueSection::class, cascade={"persist", "remove"})
     */
    private ?BoutiqueSection $embeddedBoutiqueSection;

    /**
     * @ORM\OneToOne(targetEntity=BoutiqueElement::class, cascade={"persist", "remove"})
     */
    private ?BoutiqueElement $embeddedBoutiqueElement;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private ?bool $isEmbedded;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $productButtonTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $buttonFontColorCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $buttonBackgroundColorCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $buttonBorderColorCode;

    public function __construct()
    {
        $this->boutiqueElementAssets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoutiqueSection(): ?BoutiqueSection
    {
        return $this->boutiqueSection;
    }

    public function setBoutiqueSection(BoutiqueSection $boutiqueSection): self
    {
        $this->boutiqueSection = $boutiqueSection;

        return $this;
    }

    public function getElementType(): ?string
    {
        return $this->elementType;
    }

    public function setElementType(string $elementType): self
    {
        $this->elementType = $elementType;

        return $this;
    }

    public function getHeadline(): ?string
    {
        return $this->headline;
    }

    public function setHeadline(?string $headline): self
    {
        $this->headline = $headline;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getProductTag(): ?string
    {
        return $this->productTag;
    }

    public function setProductTag(?string $productTag): self
    {
        $this->productTag = $productTag;

        return $this;
    }

    /*
    * @JMS\VirtualProperty
     *
     */
    public function getProductsUrl(): ?array
    {
        return $this->productsUrl;
    }

    public function setProductsUrl(?array $productsUrl): self
    {
        $this->productsUrl = $productsUrl;

        return $this;
    }

    public function getMarginTop(): ?string
    {
        return $this->marginTop;
    }

    public function setMarginTop(?string $marginTop): self
    {
        $this->marginTop = $marginTop;

        return $this;
    }

    public function getMarginBottom(): ?string
    {
        return $this->marginBottom;
    }

    public function setMarginBottom(?string $marginBottom): self
    {
        $this->marginBottom = $marginBottom;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function __toString(): string
    {
        return $this->id."_".$this->elementType;
    }

    /**
     * @return Collection
     */
    public function getBoutiqueElementAssets(): Collection
    {
        return $this->boutiqueElementAssets;
    }

    public function addBoutiqueElementAsset(BoutiqueElementAssets $boutiqueElementAsset): self
    {
        if (!$this->boutiqueElementAssets->contains($boutiqueElementAsset)) {
            $this->boutiqueElementAssets[] = $boutiqueElementAsset;
            $boutiqueElementAsset->setBoutiqueElement($this);
        }

        return $this;
    }

    public function removeBoutiqueElementAsset(BoutiqueElementAssets $boutiqueElementAsset): self
    {
        if ($this->boutiqueElementAssets->removeElement($boutiqueElementAsset)) {
            // set the owning side to null (unless already changed)
            if ($boutiqueElementAsset->getBoutiqueElement() === $this) {
                $boutiqueElementAsset->setBoutiqueElement(null);
            }
        }

        return $this;
    }

    public function getElementSize(): ?string
    {
        return $this->elementSize;
    }

    public function setElementSize(?string $elementSize): self
    {
        $this->elementSize = $elementSize;

        return $this;
    }

    public function getElementActionType(): ?string
    {
        return $this->elementActionType;
    }

    public function setElementActionType(?string $elementActionType): self
    {
        $this->elementActionType = $elementActionType;

        return $this;
    }

    public function getProductOffsetInUi(): ?int
    {
        return $this->productOffsetInUi;
    }

    public function setProductOffsetInUi(?int $productOffsetInUi): self
    {
        $this->productOffsetInUi = $productOffsetInUi;

        return $this;
    }

    public function getProductLimitInUi(): ?int
    {
        return $this->productLimitInUi;
    }

    public function setProductLimitInUi(?int $productLimitInUi): self
    {
        $this->productLimitInUi = $productLimitInUi;

        return $this;
    }

    public function getEmbeddedBoutiqueSection(): ?BoutiqueSection
    {
        return $this->embeddedBoutiqueSection;
    }

    public function setEmbeddedBoutiqueSection(?BoutiqueSection $embeddedBoutiqueSection): self
    {
        $this->embeddedBoutiqueSection = $embeddedBoutiqueSection;

        return $this;
    }

    public function getEmbeddedBoutiqueElement(): ?self
    {
        return $this->embeddedBoutiqueElement;
    }

    public function setEmbeddedBoutiqueElement(?self $embeddedBoutiqueElement): self
    {
        $this->embeddedBoutiqueElement = $embeddedBoutiqueElement;

        return $this;
    }

    public function getIsEmbedded(): ?bool
    {
        return $this->isEmbedded;
    }

    public function setIsEmbedded(bool $isEmbedded): self
    {
        $this->isEmbedded = $isEmbedded;

        return $this;
    }

    public function getProductButtonTitle(): ?string
    {
        return $this->productButtonTitle;
    }

    public function setProductButtonTitle(?string $productButtonTitle): self
    {
        $this->productButtonTitle = $productButtonTitle;

        return $this;
    }

    public function getButtonFontColorCode(): ?string
    {
        return $this->buttonFontColorCode;
    }

    public function setButtonFontColorCode(?string $buttonFontColorCode): self
    {
        $this->buttonFontColorCode = $buttonFontColorCode;

        return $this;
    }

    public function getButtonBackgroundColorCode(): ?string
    {
        return $this->buttonBackgroundColorCode;
    }

    public function setButtonBackgroundColorCode(?string $buttonBackgroundColorCode): self
    {
        $this->buttonBackgroundColorCode = $buttonBackgroundColorCode;

        return $this;
    }

    public function getButtonBorderColorCode(): ?string
    {
        return $this->buttonBorderColorCode;
    }

    public function setButtonBorderColorCode(?string $buttonBorderColorCode): self
    {
        $this->buttonBorderColorCode = $buttonBorderColorCode;

        return $this;
    }

}
