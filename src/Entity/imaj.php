<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Entity2
 *
 * @ORM\Table(name="imaj")
 * @ORM\Entity(repositoryClass="App\Repository\imajRepository")
 * @UniqueEntity(fields="source", )
 */
class imaj
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
     * @ORM\Column(name="source", type="string", length=255 ,unique=true )
     * @Assert\NotBlank(message="Ou dwe upload yon imaje", )
     * @Assert\Image(mimeTypesMessage="Fichye a dwe jpeg", mimeTypes="image/jpeg", )
     */
    private $source;

    /**
     * @var Moun
     * @ORM\ManyToOne(inversedBy="imaj", targetEntity="App\Entity\Moun")
     */
    private $moun;


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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }
}