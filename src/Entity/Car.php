<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Model;

    /**
     * @ORM\Column(type="integer")
     */
    private $seats;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="car", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->Color;
    }

    public function setColor(string $Color): self
    {
        $this->Color = $Color;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): self
    {
        $this->Model = $Model;

        return $this;
    }

    public function getSeats(): ?int
    {
        return $this->seats;
    }

    public function setSeats(int $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
    
}
