<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="entity15")
 * @ORM\Entity(repositoryClass="App\Repository\Entity15Repository")
 
 */
class Entity15 
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
    * @ORM\ManyToMany(mappedBy="entity15", cascade={"remove", "persist"}, targetEntity="App\Entity\Entity11")
    */private $entity11;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entity11 = new ArrayCollection();
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
     * @return Collection|Entity11[]
     */
    public function getEntity11(): Collection
    {
        return $this->entity11;
    }

    public function addEntity11(Entity11 $entity11): self
    {
        if (!$this->entity11->contains($entity11)) {
            $this->entity11[] = $entity11;
            $entity11->addEntity15($this);
        }

        return $this;
    }

    public function removeEntity11(Entity11 $entity11): self
    {
        if ($this->entity11->contains($entity11)) {
            $this->entity11->removeElement($entity11);
            $entity11->removeEntity15($this);
        }

        return $this;
    }
}