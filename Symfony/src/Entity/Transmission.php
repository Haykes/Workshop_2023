<?php

namespace App\Entity;

use App\Repository\TransmissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransmissionRepository::class)]
class Transmission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'transmissions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $receiver = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $note = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $audio_note = null;

    #[ORM\OneToMany(mappedBy: 'image', targetEntity: TransmissionImage::class)]
    private Collection $transmissionImages;

    public function __construct()
    {
        $this->transmissionImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): static
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getAudioNote(): ?string
    {
        return $this->audio_note;
    }

    public function setAudioNote(?string $audio_note): static
    {
        $this->audio_note = $audio_note;

        return $this;
    }

    /**
     * @return Collection<int, TransmissionImage>
     */
    public function getTransmissionImages(): Collection
    {
        return $this->transmissionImages;
    }

    public function addTransmissionImage(TransmissionImage $transmissionImage): static
    {
        if (!$this->transmissionImages->contains($transmissionImage)) {
            $this->transmissionImages->add($transmissionImage);
            $transmissionImage->setImage($this);
        }

        return $this;
    }

    public function removeTransmissionImage(TransmissionImage $transmissionImage): static
    {
        if ($this->transmissionImages->removeElement($transmissionImage)) {
            // set the owning side to null (unless already changed)
            if ($transmissionImage->getImage() === $this) {
                $transmissionImage->setImage(null);
            }
        }

        return $this;
    }
}
