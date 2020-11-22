<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wayType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $wayName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $zipCode;

    /**
     * @ORM\ManyToOne(targetEntity=Firm::class, inversedBy="addresses")
     */
    private $firm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getWayType(): ?string
    {
        return $this->wayType;
    }

    public function setWayType(string $wayType): self
    {
        $this->wayType = $wayType;

        return $this;
    }

    public function getWayName(): ?string
    {
        return $this->wayName;
    }

    public function setWayName(string $wayName): self
    {
        $this->wayName = $wayName;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

//    public function __toString()
//    {
//        // TODO: Implement __toString() method.
//        return ''.$this->getNumber();
//    }

public function getFirm(): ?Firm
{
    return $this->firm;
}

public function setFirm(?Firm $firm): self
{
    $this->firm = $firm;

    return $this;
}


}
