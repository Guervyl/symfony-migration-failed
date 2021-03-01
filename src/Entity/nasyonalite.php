<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="nasyonalite")
 * @ORM\Entity(repositoryClass="App\Repository\nasyonaliteRepository")
 
 */
class nasyonalite 
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
*@ORM\Column(name="non", type="string", length=255 )

	* @Assert\NotBlank(message="Antre nasyonalite a.", )
*/
private $non;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\ManyToMany(mappedBy="nasyonalite", targetEntity="App\Entity\Moun")
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

    public function getNon(): ?string
    {
        return $this->non;
    }

    public function setNon(string $non): self
    {
        $this->non = $non;

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
            $moun->addNasyonalite($this);
        }

        return $this;
    }

    public function removeMoun(Moun $moun): self
    {
        if ($this->moun->contains($moun)) {
            $this->moun->removeElement($moun);
            $moun->removeNasyonalite($this);
        }

        return $this;
    }
}