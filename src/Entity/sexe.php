<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="sexe")
 * @ORM\Entity(repositoryClass="App\Repository\sexeRepository")
 
 */
class sexe 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
*@ORM\Column(name="sexe", type="string", length=255 )

	* @Assert\NotBlank(message="Ou dwe ajoute yon sexe.", )
*/
private $sexe;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\OneToMany(mappedBy="sexe", targetEntity="App\Entity\Moun")
    */private $moun;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->moun = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * @return Collection|Moun[]
     */
    public function getMoun(): Collection
    {
        return $this->moun;
    }

    public function addMoun(Moun $moun): self
    {
        if (!$this->moun->contains($moun)) {
            $this->moun[] = $moun;
            $moun->setSexe($this);
        }

        return $this;
    }

    public function removeMoun(Moun $moun): self
    {
        if ($this->moun->contains($moun)) {
            $this->moun->removeElement($moun);
            // set the owning side to null (unless already changed)
            if ($moun->getSexe() === $this) {
                $moun->setSexe(null);
            }
        }

        return $this;
    }
}