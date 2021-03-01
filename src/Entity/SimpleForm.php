<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="simpleForm")
 * @ORM\Entity(repositoryClass="App\Repository\SimpleFormRepository")
 * 
 * @ORM\EntityListeners({"App\EventListener\SimpleFormUploadListener"})
 */
class SimpleForm 
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
*/
private $non;
/**
*@ORM\Column(name="prenom", type="string", length=255 )
*/
private $prenom;
/**
*@ORM\Column(name="img", type="string", length=255 )
*/
private $img;
/**
*@ORM\Column(name="age", type="integer", )
*/
private $age;
/**
*@ORM\Column(name="drinks", type="boolean", )
*/
private $drinks;


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

    public function getNon(): ?string
    {
        return $this->non;
    }

    public function setNon(string $non): self
    {
        $this->non = $non;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getDrinks(): ?bool
    {
        return $this->drinks;
    }

    public function setDrinks(bool $drinks): self
    {
        $this->drinks = $drinks;

        return $this;
    }
}