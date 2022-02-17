<?php

namespace Inflyter\BoutiqueBundle\Entity\Shop;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity()
 */
#[ApiResource(mercure: true)]

class BoutiqueSection
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ApiProperty(identifier: true)]
    private int $id;

    /**
     * @ORM\ManyToOne(targetEntity=Boutique::class, inversedBy="boutiqueSections")
     * @ORM\JoinColumn(nullable=false)
     */
    private Boutique $boutique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $showOnHomeScreen;

    /**
     * @ORM\Column(type="boolean")
     */
    private ?bool $showInMenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $imageUrl;

    /**
     * @ORM\OneToMany(targetEntity=BoutiqueElement::class, mappedBy="boutiqueSection")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private PersistentCollection $boutiqueElements;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $headerLogoUrl;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private ?bool $isEmbedded;

    public function __construct()
    {
        $this->boutiqueElements = new PersistentCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBoutique(): ?Boutique
    {
        return $this->boutique;
    }

    public function setBoutique(Boutique $boutique): self
    {
        $this->boutique = $boutique;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getShowOnHomeScreen(): ?bool
    {
        return $this->showOnHomeScreen;
    }

    public function setShowOnHomeScreen(bool $showOnHomeScreen): self
    {
        $this->showOnHomeScreen = $showOnHomeScreen;

        return $this;
    }

    public function getShowInMenu(): ?bool
    {
        return $this->showInMenu;
    }

    public function setShowInMenu(bool $showInMenu): self
    {
        $this->showInMenu = $showInMenu;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getBoutiqueElements(): Collection
    {
        return $this->boutiqueElements;
    }

    public function addBoutiqueElement(BoutiqueElement $boutiqueElement): self
    {
        if (!$this->boutiqueElements->contains($boutiqueElement)) {
            $this->boutiqueElements[] = $boutiqueElement;
            $boutiqueElement->setBoutiqueSection($this);
        }

        return $this;
    }

    public function removeBoutiqueElement(BoutiqueElement $boutiqueElement): self
    {
        if ($this->boutiqueElements->removeElement($boutiqueElement)) {
            // set the owning side to null (unless already changed)
            if ($boutiqueElement->getBoutiqueSection() === $this) {
                $boutiqueElement->setBoutiqueSection(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getHeaderLogoUrl(): ?string
    {
        return $this->headerLogoUrl;
    }

    public function setHeaderLogoUrl(?string $headerLogoUrl): self
    {
        $this->headerLogoUrl = $headerLogoUrl;

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

}
