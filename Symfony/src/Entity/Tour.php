<?php

namespace App\Entity;

use App\Repository\TourRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Patients;


#[ORM\Entity(repositoryClass: TourRepository::class)]
class Tour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Patients::class)]
    private $patient;    

    #[ORM\Column(type: 'time')]
    private $appointmentTime;

    #[ORM\Column(type: 'boolean')]
    private $isCompleted = false;

    #[ORM\Column(type: 'string', length: 255)]
    private $timeOfDay;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $isUrgent;



    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }
    public function getPatient(): ?Patients
    {
        return $this->patient;
    }

    public function setPatient(?Patients $patient): self
    {
        $this->patient = $patient;
        return $this;
    }

    public function getAppointmentTime(): ?\DateTimeInterface
    {
        return $this->appointmentTime;
    }

    public function setAppointmentTime(\DateTimeInterface $appointmentTime): self
    {
        $this->appointmentTime = $appointmentTime;
        return $this;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->isCompleted;
    }

    public function setIsCompleted(bool $isCompleted): self
    {
        $this->isCompleted = $isCompleted;
        return $this;
    }

    public function getTimeOfDay(): ?string
    {
        return $this->timeOfDay;
    }

    public function setTimeOfDay(string $timeOfDay): self
    {
        $this->timeOfDay = $timeOfDay;
        return $this;
    }

    public function getIsUrgent(): ?string
    {
        return $this->isUrgent;
    }
    
    public function setIsUrgent(?string $isUrgent): self
    {
        $this->isUrgent = $isUrgent;
        return $this;
    }

}
