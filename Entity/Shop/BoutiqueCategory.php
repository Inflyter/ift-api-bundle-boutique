<?php


namespace Inflyter\BoutiqueBundle\Entity\Shop;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Core\Category;

/**
 * Adds field to the Core\Category entity
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks
 */

class BoutiqueCategory extends Category
{

    /**
     * @ORM\OneToOne(targetEntity=Boutique::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private ?Boutique $boutique;

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
