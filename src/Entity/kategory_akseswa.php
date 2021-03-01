<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="kategory_akseswa")
 * @ORM\Entity(repositoryClass="App\Repository\kategory_akseswaRepository")
 
 */
class kategory_akseswa 
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
*@ORM\Column(name="non", type="string", length=50 )

	* @Assert\NotBlank(message="Antre kategory a.", )
*/
private $non;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\OneToMany(mappedBy="kategory_akseswa", targetEntity="App\Entity\Akseswa")
    */private $akseswa;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->akseswa = new ArrayCollection();
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
     * @return Collection|Akseswa[]
     */
    public function getAkseswa(): Collection
    {
        return $this->akseswa;
    }

    public function addAkseswa(Akseswa $akseswa): self
    {
        if (!$this->akseswa->contains($akseswa)) {
            $this->akseswa[] = $akseswa;
            $akseswa->setKategoryAkseswa($this);
        }

        return $this;
    }

    public function removeAkseswa(Akseswa $akseswa): self
    {
        if ($this->akseswa->contains($akseswa)) {
            $this->akseswa->removeElement($akseswa);
            // set the owning side to null (unless already changed)
            if ($akseswa->getKategoryAkseswa() === $this) {
                $akseswa->setKategoryAkseswa(null);
            }
        }

        return $this;
    }
}