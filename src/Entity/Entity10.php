<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="entity10")
 * @ORM\Entity(repositoryClass="App\Repository\Entity10Repository")
 
 */
class Entity10 
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
    * @ORM\OneToOne(mappedBy="entity10", targetEntity="App\Entity\testUniqueAndNullable")
    */private $testUniqueAndNullable;


    /**
     * Constructor
     */
    public function __construct()
    {
        
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
        $newEntity10 = null === $testUniqueAndNullable ? null : $this;
        if ($testUniqueAndNullable->getEntity10() !== $newEntity10) {
            $testUniqueAndNullable->setEntity10($newEntity10);
        }

        return $this;
    }
}