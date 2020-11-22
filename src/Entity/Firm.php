<?php

namespace App\Entity;

use App\Repository\FirmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FirmRepository::class)
 */
class Firm
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
    private $name;

    /**
     * @ORM\Column(type="bigint")
     */
    private $siren;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculationCity;

    /**
     * @ORM\Column(type="datetime")
     */
    private $immatriculationDate;

    /**
     * @ORM\Column(type="bigint")
     */
    private $capital;

    /**
     * @ORM\ManyToOne(targetEntity=LegalForm::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $legalForm;

    /**
     * @ORM\ManyToMany(targetEntity=Address::class, cascade={"persist"})
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Snapshot::class, mappedBy="firm", cascade={"persist", "remove"})
     */
    private $snapshots;

    public function __construct()
    {
        $this->address = new ArrayCollection();
        $this->snapshots = new ArrayCollection();
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

    public function getSiren(): ?string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): self
    {
        $this->siren = $siren;

        return $this;
    }

    public function getImmatriculationCity(): ?string
    {
        return $this->immatriculationCity;
    }

    public function setImmatriculationCity(string $immatriculationCity): self
    {
        $this->immatriculationCity = $immatriculationCity;

        return $this;
    }

    public function getImmatriculationDate(): ?\DateTimeInterface
    {
        return $this->immatriculationDate;
    }

    public function setImmatriculationDate(\DateTimeInterface $immatriculationDate): self
    {
        $this->immatriculationDate = $immatriculationDate;

        return $this;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getLegalForm(): ?LegalForm
    {
        return $this->legalForm;
    }

    public function setLegalForm(?LegalForm $legalForm): self
    {
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * @return Collection|Address[]
     */
    public function getAddress(): Collection
    {
        return $this->address;
    }

    public function addAddress(Address $address): self
    {
        if (!$this->address->contains($address)) {
            $this->address[] = $address;
        }

        return $this;
    }

    public function removeAddress(Address $address): self
    {
        $this->address->removeElement($address);

        return $this;
    }

    /**
     * @return Collection|Snapshot[]
     */
    public function getSnapshots(): Collection
    {
        return $this->snapshots;
    }

    public function addSnapshot(Snapshot $snapshot): self
    {
        if (!$this->snapshots->contains($snapshot)) {
            $this->snapshots[] = $snapshot;
            $snapshot->setFirm($this);
        }

        return $this;
    }

    public function removeSnapshot(Snapshot $snapshot): self
    {
        if ($this->snapshots->removeElement($snapshot)) {
            // set the owning side to null (unless already changed)
            if ($snapshot->getFirm() === $this) {
                $snapshot->setFirm(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }


}
