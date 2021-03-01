<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="entity11")
 * @ORM\Entity(repositoryClass="App\Repository\Entity11Repository")
 
 */
class Entity11 
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
    * @var App\Entity\testUniqueAndNullable
    *
    * @ORM\OneToOne(mappedBy="entity11", targetEntity="App\Entity\testUniqueAndNullable")
    */private $testUniqueAndNullable;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\ManyToMany(inversedBy="entity11", targetEntity="App\Entity\Entity15")
    */private $entity15;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entity15 = new ArrayCollection();
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

    public function getTestUniqueAndNullable(): ?testUniqueAndNullable
    {
        return $this->testUniqueAndNullable;
    }

    public function setTestUniqueAndNullable(?testUniqueAndNullable $testUniqueAndNullable): self
    {
        $this->testUniqueAndNullable = $testUniqueAndNullable;

        // set (or unset) the owning side of the relation if necessary
        $newEntity11 = null === $testUniqueAndNullable ? null : $this;
        if ($testUniqueAndNullable->getEntity11() !== $newEntity11) {
            $testUniqueAndNullable->setEntity11($newEntity11);
        }

        return $this;
    }

    /**
     * @return Collection|Entity15[]
     */
    public function getEntity15(): Collection
    {
        return $this->entity15;
    }

    public function addEntity15(Entity15 $entity15): self
    {
        if (!$this->entity15->contains($entity15)) {
            $this->entity15[] = $entity15;
        }

        return $this;
    }

    public function removeEntity15(Entity15 $entity15): self
    {
        if ($this->entity15->contains($entity15)) {
            $this->entity15->removeElement($entity15);
        }

        return $this;
    }
}