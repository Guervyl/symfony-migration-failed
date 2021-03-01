<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="kay")
 * @ORM\Entity(repositoryClass="App\Repository\KayRepository")
 
 */
class Kay 
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
*@ORM\Column(name="direksyon", type="string", length=50 )
*/
private $direksyon;
/**
*@ORM\Column(name="kod", type="string", length=10 ,unique=true )
*/
private $kod;
/**
    * @var App\Entity\Moun
    *
    * @ORM\ManyToOne(inversedBy="kay", cascade={"remove", "persist"}, targetEntity="App\Entity\Moun")
    */private $moun;


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

    public function getDireksyon(): ?string
    {
        return $this->direksyon;
    }

    public function setDireksyon(string $direksyon): self
    {
        $this->direksyon = $direksyon;

        return $this;
    }

    public function getKod(): ?string
    {
        return $this->kod;
    }

    public function setKod(string $kod): self
    {
        $this->kod = $kod;

        return $this;
    }

    public function getMoun(): ?Moun
    {
        return $this->moun;
    }

    public function setMoun(?Moun $moun): self
    {
        $this->moun = $moun;

        return $this;
    }
}