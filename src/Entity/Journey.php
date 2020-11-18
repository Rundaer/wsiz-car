<?php

namespace App\Entity;

use App\Repository\JourneyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JourneyRepository")
 */
class Journey
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
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departureTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrivalTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $personLimit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $startLocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $finishLocation;

    /**
     * @ORM\Column(type="float")
     */
    private $contribution;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="journeys")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departureTime;
    }

    public function setDepartureTime(\DateTimeInterface $departureTime): self
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrivalTime;
    }

    public function setArrivalTime(\DateTimeInterface $arrivalTime): self
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    public function getPersonLimit(): ?int
    {
        return $this->personLimit;
    }

    public function setPersonLimit(int $personLimit): self
    {
        $this->personLimit = $personLimit;

        return $this;
    }

    public function getStartLocation(): ?string
    {
        return $this->startLocation;
    }

    public function setStartLocation(string $startLocation): self
    {
        $this->startLocation = $startLocation;

        return $this;
    }

    public function getFinishLocation(): ?string
    {
        return $this->finishLocation;
    }

    public function setFinishLocation(string $finishLocation): self
    {
        $this->finishLocation = $finishLocation;

        return $this;
    }

    public function getContribution(): ?float
    {
        return $this->contribution;
    }

    public function setContribution(float $contribution): self
    {
        $this->contribution = $contribution;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
