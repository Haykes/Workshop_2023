<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type="integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity=User::class, inversedBy="sentMessages")]
    #[ORM\JoinColumn(nullable=false)]
    private $sender;

    #[ORM\ManyToOne(targetEntity=User::class, inversedBy="receivedMessages")]
    #[ORM\JoinColumn(nullable=false)]
    private $receiver;

    #[ORM\Column(type="text")]
    private $content;


    public function getSender(): ?User
    {
        return $this->sender;
    }

    public function setSender(?User $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    public function getReceiver(): ?User
    {
        return $this->receiver;
    }

    public function setReceiver(?User $receiver): self
    {
        $this->receiver = $receiver;
        return $this;
    }
    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
}