<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * Entity2
 *
 * @ORM\Table(name="moun")
 * @ORM\Entity(repositoryClass="App\Repository\MounRepository")
 */
class Moun
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
     * @ORM\Column(name="non", type="string", length=50 )
     * @Assert\NotBlank(message="Ou dwe ajoute non moun nan", )
     * @Assert\Length(max="50", maxMessage="Ou ka ajoute jiska {{ limit }} karaktè.", )
     */
    private $non;
    /**
     * @ORM\Column(name="siyati", type="string", length=50 )
     * @Assert\NotBlank(message="Ajoute siyati moun nan.", )
     */
    private $siyati;
    /**
     * @ORM\Column(name="laj", type="integer", )
     * @Assert\GreaterThanOrEqual(value="12", message="Moun nan dwe gen omwen {{ limit }} an.", )
     * @Assert\NotBlank(message="Ou dwe mete laj la.", )
     */
    private $laj;
    /**
     * @ORM\Column(name="ote", type="decimal", precision=5 ,scale=2 )
     * @Assert\NotBlank(message="Antre otè moun nan.", )
     * @Assert\GreaterThanOrEqual(value="5", message="Ote moun nan dwe omwen {{ compared_value }}.", )
     */
    private $ote;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="manman", targetEntity="App\Entity\Moun")
     */
    private $enfant;
    /**
     * @var App\Entity\Moun
     *
     * @ORM\ManyToOne(inversedBy="enfant", cascade={"persist"}, targetEntity="App\Entity\Moun")
     */
    private $manman;
    /**
     * @var App\Entity\Akseswa
     *
     * @ORM\OneToOne(mappedBy="moun", targetEntity="App\Entity\Akseswa")
     */
    private $akseswa;
    /**
     * @var App\Entity\User
     *
     * @ORM\ManyToOne(inversedBy="moun", targetEntity="App\Entity\User")
     */
    private $user;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="moun", targetEntity="App\Entity\Kay")
     */
    private $kay;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\ManyToMany(inversedBy="moun", targetEntity="App\Entity\nasyonalite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nasyonalite;
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(mappedBy="moun", cascade={"remove", "persist"}, targetEntity="App\Entity\imaj")
     */
    private $imaj;
    /**
     * @var App\Entity\sexe
     *
     * @ORM\ManyToOne(inversedBy="moun", cascade={"persist"}, targetEntity="App\Entity\sexe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sexe;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enfant = new ArrayCollection();
        $this->kay = new ArrayCollection();
        $this->nasyonalite = new ArrayCollection();
        $this->imaj = new ArrayCollection();
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

    public function getSiyati(): ?string
    {
        return $this->siyati;
    }

    public function setSiyati(string $siyati): self
    {
        $this->siyati = $siyati;

        return $this;
    }

    public function getLaj(): ?int
    {
        return $this->laj;
    }

    public function setLaj(int $laj): self
    {
        $this->laj = $laj;

        return $this;
    }

    public function getOte(): ?string
    {
        return $this->ote;
    }

    public function setOte(string $ote): self
    {
        $this->ote = $ote;

        return $this;
    }

    /**
     * @return Collection|Moun[]
     */
    public function getEnfant(): Collection
    {
        return $this->enfant;
    }

    public function addEnfant(Moun $enfant): self
    {
        if (!$this->enfant->contains($enfant)) {
            $this->enfant[] = $enfant;
            $enfant->setManman($this);
        }

        return $this;
    }

    public function removeEnfant(Moun $enfant): self
    {
        if ($this->enfant->contains($enfant)) {
            $this->enfant->removeElement($enfant);
            // set the owning side to null (unless already changed)
            if ($enfant->getManman() === $this) {
                $enfant->setManman(null);
            }
        }

        return $this;
    }

    public function getManman(): ?self
    {
        return $this->manman;
    }

    public function setManman(?self $manman): self
    {
        $this->manman = $manman;

        return $this;
    }

    public function getAkseswa(): ?Akseswa
    {
        return $this->akseswa;
    }

    public function setAkseswa(?Akseswa $akseswa): self
    {
        $this->akseswa = $akseswa;

        // set (or unset) the owning side of the relation if necessary
        $newMoun = null === $akseswa ? null : $this;
        if ($akseswa->getMoun() !== $newMoun) {
            $akseswa->setMoun($newMoun);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Kay[]
     */
    public function getKay(): Collection
    {
        return $this->kay;
    }

    public function addKay(Kay $kay): self
    {
        if (!$this->kay->contains($kay)) {
            $this->kay[] = $kay;
            $kay->setMoun($this);
        }

        return $this;
    }

    public function removeKay(Kay $kay): self
    {
        if ($this->kay->contains($kay)) {
            $this->kay->removeElement($kay);
            // set the owning side to null (unless already changed)
            if ($kay->getMoun() === $this) {
                $kay->setMoun(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|nasyonalite[]
     */
    public function getNasyonalite(): Collection
    {
        return $this->nasyonalite;
    }

    public function addNasyonalite(nasyonalite $nasyonalite): self
    {
        if (!$this->nasyonalite->contains($nasyonalite)) {
            $this->nasyonalite[] = $nasyonalite;
        }

        return $this;
    }

    public function removeNasyonalite(nasyonalite $nasyonalite): self
    {
        if ($this->nasyonalite->contains($nasyonalite)) {
            $this->nasyonalite->removeElement($nasyonalite);
        }

        return $this;
    }

    /**
     * @return Collection|imaj[]
     */
    public function getImaj(): Collection
    {
        return $this->imaj;
    }

    public function addImaj(imaj $imaj): self
    {
        if (!$this->imaj->contains($imaj)) {
            $this->imaj[] = $imaj;
            $imaj->setMoun($this);
        }

        return $this;
    }

    public function removeImaj(imaj $imaj): self
    {
        if ($this->imaj->contains($imaj)) {
            $this->imaj->removeElement($imaj);
            // set the owning side to null (unless already changed)
            if ($imaj->getMoun() === $this) {
                $imaj->setMoun(null);
            }
        }

        return $this;
    }

    public function getSexe(): ?sexe
    {
        return $this->sexe;
    }

    public function setSexe(?sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}