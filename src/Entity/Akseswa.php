<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 * 
 * @ORM\Table(name="akseswa")
 * @ORM\Entity(repositoryClass="App\Repository\AkseswaRepository")
 
 */
class Akseswa 
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
*@ORM\Column(name="non", type="string", length=30 )

	* @Assert\NotBlank(message="Antre non akseswa a.", )
*/
private $non;
/**
*@ORM\Column(name="kantite", type="integer", )

	* @Assert\NotBlank(message="Antre kantite akseswa a.", )
	* @Assert\Type(type="integer", )
*/
private $kantite;
/**
    * @var App\Entity\Moun
    *
    * @ORM\OneToOne(inversedBy="akseswa", targetEntity="App\Entity\Moun")
    */private $moun;
/**
    * @var App\Entity\kategory_akseswa
    *
    * @ORM\ManyToOne(inversedBy="akseswa", targetEntity="App\Entity\kategory_akseswa")
    * @ORM\JoinColumn(nullable=false)
    */private $kategory_akseswa;


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

    public function getKantite(): ?int
    {
        return $this->kantite;
    }

    public function setKantite(int $kantite): self
    {
        $this->kantite = $kantite;

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

    public function getKategoryAkseswa(): ?kategory_akseswa
    {
        return $this->kategory_akseswa;
    }

    public function setKategoryAkseswa(?kategory_akseswa $kategory_akseswa): self
    {
        $this->kategory_akseswa = $kategory_akseswa;

        return $this;
    }
}