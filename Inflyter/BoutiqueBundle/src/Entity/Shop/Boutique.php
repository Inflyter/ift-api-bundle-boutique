<?php

namespace App\Inflyter\BoutiqueBundle\Entity\Shop;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Inflyter\BoutiqueBundle\Model\Shop\CategoryInterface;
use App\Inflyter\BoutiqueBundle\Repository\Shop\BoutiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=BoutiqueRepository::class)
 */
#[ApiResource(
    denormalizationContext: ['groups' => ['write']],
    mercure: true,
    normalizationContext: ['groups' => ['read']],
)]
class Boutique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(["read", "write" ])]
    #[ApiProperty(identifier: true)]
    private int $id;

    /**
     * https://symfony.com/doc/current/doctrine/resolve_target_entity.html
     * @ORM\OneToOne(targetEntity="App\Model\Shop\CategoryInterface", inversedBy="boutique", fetch="LAZY", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    #[Groups(["read"])]
    private ?CategoryInterface $category = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(["read", "write"])]
    private ?string $name;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    #[Groups(["read", "write"])]
    private ?string $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(["read", "write"])]
    private ?string $headerLogoUrl;

    /**
     * @ORM\OneToMany(targetEntity=BoutiqueSection::class, mappedBy="boutique", orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    #[Groups(["read", "write"])]
    private Collection $boutiqueSections;

    public function __construct()
    {
        $this->boutiqueSections = new ArrayCollection();
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): ?CategoryInterface
    {
        return $this->category;
    }

    public function setCategory(?CategoryInterface $category): self
    {
        $this->category = $category;

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

    public function getHeaderLogoUrl(): ?string
    {
        return $this->headerLogoUrl;
    }

    public function setHeaderLogoUrl(string $headerLogoUrl): self
    {
        $this->headerLogoUrl = $headerLogoUrl;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getBoutiqueSections(): Collection
    {
        return $this->boutiqueSections;
    }

    public function addBoutiqueSection(BoutiqueSection $boutiqueSection): self
    {
        if (!$this->boutiqueSections->contains($boutiqueSection)) {
            $this->boutiqueSections[] = $boutiqueSection;
            $boutiqueSection->setBoutique($this);
        }

        return $this;
    }

    public function removeBoutiqueSection(BoutiqueSection $boutiqueSection): self
    {
        if ($this->boutiqueSections->removeElement($boutiqueSection)) {
            // set the owning side to null (unless already changed)
            if ($boutiqueSection->getBoutique() === $this) {
                $boutiqueSection->setBoutique(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
