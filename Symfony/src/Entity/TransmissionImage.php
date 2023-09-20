<?php

namespace App\Entity;

use App\Repository\TransmissionImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransmissionImageRepository::class)]
class TransmissionImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'transmissionImages')]
    private ?Transmission $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?Transmission
    {
        return $this->image;
    }

    public function setImage(?Transmission $image): static
    {
        $this->image = $image;

        return $this;
    }
}
