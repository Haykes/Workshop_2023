<?php

namespace App\Entity;

use App\Repository\TreatmentTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TreatmentTypeRepository::class)]
class TreatmentType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'treatment_type', targetEntity: Treatment::class)]
    private Collection $patient;

    #[ORM\OneToMany(mappedBy: 'treatment_type', targetEntity: Treatment::class)]
    private Collection $treatments;

    public function __construct()
    {
        $this->patient = new ArrayCollection();
        $this->treatments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Treatment>
     */
    public function getPatient(): Collection
    {
        return $this->patient;
    }

    public function addPatient(Treatment $patient): static
    {
        if (!$this->patient->contains($patient)) {
            $this->patient->add($patient);
            $patient->setTreatmentType($this);
        }

        return $this;
    }

    public function removePatient(Treatment $patient): static
    {
        if ($this->patient->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getTreatmentType() === $this) {
                $patient->setTreatmentType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Treatment>
     */
    public function getTreatments(): Collection
    {
        return $this->treatments;
    }

    public function addTreatment(Treatment $treatment): static
    {
        if (!$this->treatments->contains($treatment)) {
            $this->treatments->add($treatment);
            $treatment->setTreatmentType($this);
        }

        return $this;
    }

    public function removeTreatment(Treatment $treatment): static
    {
        if ($this->treatments->removeElement($treatment)) {
            // set the owning side to null (unless already changed)
            if ($treatment->getTreatmentType() === $this) {
                $treatment->setTreatmentType(null);
            }
        }

        return $this;
    }
}
