<?php


namespace App\Inflyter\BoutiqueBundle\Entity\Shop;

use App\Inflyter\BoutiqueBundle\Model\Shop\CategoryInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dummy implementation for the bundle - should be replaced by real entity
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */

class Category implements CategoryInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\OneToOne(targetEntity=Boutique::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private ?Boutique $boutique;

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

        // set the owning side of the relation if necessary
        if ($boutique->getCategory() !== $this) {
            $boutique->setCategory($this);
        }

        return $this;
    }
}
