<?php

namespace Inflyter\BoutiqueBundle\Entity\Shop;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
#[ApiResource(mercure: true)]

class BoutiqueElementAssets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ApiProperty(identifier: true)]
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $identifier;

    /**
     * @ORM\ManyToOne(targetEntity=BoutiqueElement::class, inversedBy="boutiqueElementAssets")
     */
    private BoutiqueElement $boutiqueElement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $headline;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private ?string $text;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $imageUrl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoutiqueElement(): ?BoutiqueElement
    {
        return $this->boutiqueElement;
    }

    public function setBoutiqueElement(BoutiqueElement $boutiqueElement): self
    {
        $this->boutiqueElement = $boutiqueElement;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

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

    public function __toString(): string
    {
        return $this->id."_".$this->identifier;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

}
