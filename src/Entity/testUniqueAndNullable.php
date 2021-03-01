<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="testUniqueAndNullable")
 * @ORM\Entity(repositoryClass="App\Repository\testUniqueAndNullableRepository")
 
 */
class testUniqueAndNullable 
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
*@ORM\Column(name="column2", type="time", nullable=true )
*/
private $column2;
/**
*@ORM\Column(name="column3", type="boolean", unique=true )
*/
private $column3;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\OneToMany(mappedBy="source", targetEntity="App\Entity\testUniqueAndNullable")
    */private $target;
/**
    * @var App\Entity\Entity13
    *
    * @ORM\ManyToOne(inversedBy="testUniqueAndNullable", targetEntity="App\Entity\Entity13")
    */private $entity13;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->target = new ArrayCollection();
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

    public function getColumn2(): ?\DateTimeInterface
    {
        return $this->column2;
    }

    public function setColumn2(?\DateTimeInterface $column2): self
    {
        $this->column2 = $column2;

        return $this;
    }

    public function getColumn3(): ?bool
    {
        return $this->column3;
    }

    public function setColumn3(bool $column3): self
    {
        $this->column3 = $column3;

        return $this;
    }

    /**
     * @return Collection|testUniqueAndNullable[]
     */
    public function getTarget(): Collection
    {
        return $this->target;
    }

    public function addTarget(testUniqueAndNullable $target): self
    {
        if (!$this->target->contains($target)) {
            $this->target[] = $target;
            $target->setSource($this);
        }

        return $this;
    }

    public function removeTarget(testUniqueAndNullable $target): self
    {
        if ($this->target->contains($target)) {
            $this->target->removeElement($target);
            // set the owning side to null (unless already changed)
            if ($target->getSource() === $this) {
                $target->setSource(null);
            }
        }

        return $this;
    }

    public function getEntity13(): ?Entity13
    {
        return $this->entity13;
    }

    public function setEntity13(?Entity13 $entity13): self
    {
        $this->entity13 = $entity13;

        return $this;
    }
}