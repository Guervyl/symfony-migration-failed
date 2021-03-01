<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="entity12")
 * @ORM\Entity(repositoryClass="App\Repository\Entity12Repository")
 
 */
class Entity12 
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
    * @ORM\OneToMany(mappedBy="entity12", cascade={"remove"}, targetEntity="App\Entity\testUniqueAndNullable")
    */private $testUniqueAndNullable;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->testUniqueAndNullable = new ArrayCollection();
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
     * @return Collection|testUniqueAndNullable[]
     */
    public function getTestUniqueAndNullable(): Collection
    {
        return $this->testUniqueAndNullable;
    }

    public function addTestUniqueAndNullable(testUniqueAndNullable $testUniqueAndNullable): self
    {
        if (!$this->testUniqueAndNullable->contains($testUniqueAndNullable)) {
            $this->testUniqueAndNullable[] = $testUniqueAndNullable;
            $testUniqueAndNullable->setEntity12($this);
        }

        return $this;
    }

    public function removeTestUniqueAndNullable(testUniqueAndNullable $testUniqueAndNullable): self
    {
        if ($this->testUniqueAndNullable->contains($testUniqueAndNullable)) {
            $this->testUniqueAndNullable->removeElement($testUniqueAndNullable);
            // set the owning side to null (unless already changed)
            if ($testUniqueAndNullable->getEntity12() === $this) {
                $testUniqueAndNullable->setEntity12(null);
            }
        }

        return $this;
    }
}