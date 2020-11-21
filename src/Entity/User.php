<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
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
     */
    private $email;

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
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\OneToOne(targetEntity=Car::class, mappedBy="owner", cascade={"persist", "remove"})
     */
    private $car;

    /**
     * @ORM\OneToMany(targetEntity=Journey::class, mappedBy="Owner", orphanRemoval=true)
     */
    private $journeys_owner;

    public function __construct()
    {
        $this->journeys = new ArrayCollection();
        $this->journeys_owner = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(Car $car): self
    {
        $this->car = $car;

        // set the owning side of the relation if necessary
        if ($car->getOwner() !== $this) {
            $car->setOwner($this);
        }

        return $this;
    }

    /**
     * @return Collection|Journey[]
     */
    public function getJourneysOwner(): Collection
    {
        return $this->journeys_owner;
    }

    public function addJourneysOwner(Journey $journeysOwner): self
    {
        if (!$this->journeys_owner->contains($journeysOwner)) {
            $this->journeys_owner[] = $journeysOwner;
            $journeysOwner->setOwner($this);
        }

        return $this;
    }

    public function removeJourneysOwner(Journey $journeysOwner): self
    {
        if ($this->journeys_owner->removeElement($journeysOwner)) {
            // set the owning side to null (unless already changed)
            if ($journeysOwner->getOwner() === $this) {
                $journeysOwner->setOwner(null);
            }
        }

        return $this;
    }
}
