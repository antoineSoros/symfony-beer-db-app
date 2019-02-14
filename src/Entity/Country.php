<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
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
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Brewery", mappedBy="country")
     */
    private $breweries;

    public function __construct()
    {
        $this->breweries = new ArrayCollection();
    }

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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Brewery[]
     */
    public function getBreweries(): Collection
    {
        return $this->breweries;
    }

    public function addBrewery(Brewery $brewery): self
    {
        if (!$this->breweries->contains($brewery)) {
            $this->breweries[] = $brewery;
            $brewery->setCountry($this);
        }

        return $this;
    }

    public function removeBrewery(Brewery $brewery): self
    {
        if ($this->breweries->contains($brewery)) {
            $this->breweries->removeElement($brewery);
            // set the owning side to null (unless already changed)
            if ($brewery->getCountry() === $this) {
                $brewery->setCountry(null);
            }
        }

        return $this;
    }
    
   function __toString() {
       return $this->name;
   } 
}
