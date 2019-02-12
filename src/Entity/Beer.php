<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BeerRepository")
 */
class Beer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $brewery;

    /**
     * @ORM\Column(type="float")
     */
    private $degree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ibu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBrewery(): ?string
    {
        return $this->brewery;
    }

    public function setBrewery(string $brewery): self
    {
        $this->brewery = $brewery;

        return $this;
    }

    public function getDegree(): ?float
    {
        return $this->degree;
    }

    public function setDegree(float $degree): self
    {
        $this->degree = $degree;

        return $this;
    }

    public function getIbu(): ?int
    {
        return $this->ibu;
    }

    public function setIbu(?int $ibu): self
    {
        $this->ibu = $ibu;

        return $this;
    }
}
