<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datetime = null;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patients $patient = null;

    #[ORM\ManyToMany(targetEntity: Constant::class, inversedBy: 'reviews')]
    private Collection $constant;

    public function __construct()
    {
        $this->constant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): static
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getPatient(): ?Patients
    {
        return $this->patient;
    }

    public function setPatient(?Patients $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * @return Collection<int, Constant>
     */
    public function getConstant(): Collection
    {
        return $this->constant;
    }

    public function addConstant(Constant $constant): static
    {
        if (!$this->constant->contains($constant)) {
            $this->constant->add($constant);
        }

        return $this;
    }

    public function removeConstant(Constant $constant): static
    {
        $this->constant->removeElement($constant);

        return $this;
    }
}
