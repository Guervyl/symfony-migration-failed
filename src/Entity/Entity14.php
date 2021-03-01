<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="entity14")
 * @ORM\Entity(repositoryClass="App\Repository\Entity14Repository")
 
 */
class Entity14 
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
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\ManyToMany(mappedBy="entity14", targetEntity="App\Entity\Entity12")
    */private $entity12;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entity12 = new ArrayCollection();
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

    /**
     * @return Collection|Entity12[]
     */
    public function getEntity12(): Collection
    {
        return $this->entity12;
    }

    public function addEntity12(Entity12 $entity12): self
    {
        if (!$this->entity12->contains($entity12)) {
            $this->entity12[] = $entity12;
            $entity12->addEntity14($this);
        }

        return $this;
    }

    public function removeEntity12(Entity12 $entity12): self
    {
        if ($this->entity12->contains($entity12)) {
            $this->entity12->removeElement($entity12);
            $entity12->removeEntity14($this);
        }

        return $this;
    }
}