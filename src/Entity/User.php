<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity("email")
 
	* @UniqueEntity(fields="username", )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     
	* @Assert\NotBlank(message="hello", )
*/
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    
    /**
*@ORM\Column(name="email", type="string", length=60 ,unique=true )

	* @Assert\NotBlank(message="hello", )
*/
private $email;
/**
    * @var \Doctrine\Common\Collections\ArrayCollection
    *
    * @ORM\OneToMany(mappedBy="user", targetEntity="App\Entity\Moun")
    */private $moun;

public function __construct()
{
    $this->moun = new ArrayCollection();
}


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Moun[]
     */
    public function getMoun(): Collection
    {
        return $this->moun;
    }

    public function addMoun(Moun $moun): self
    {
        if (!$this->moun->contains($moun)) {
            $this->moun[] = $moun;
            $moun->setUser($this);
        }

        return $this;
    }

    public function removeMoun(Moun $moun): self
    {
        if ($this->moun->contains($moun)) {
            $this->moun->removeElement($moun);
            // set the owning side to null (unless already changed)
            if ($moun->getUser() === $this) {
                $moun->setUser(null);
            }
        }

        return $this;
    }
}
