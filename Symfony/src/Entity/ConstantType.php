<?php

namespace App\Entity;

use App\Repository\ConstantTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConstantTypeRepository::class)]
class ConstantType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'constant_type', targetEntity: Constant::class)]
    private Collection $constants;

    public function __construct()
    {
        $this->constants = new ArrayCollection();
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
     * @return Collection<int, Constant>
     */
    public function getConstants(): Collection
    {
        return $this->constants;
    }

    public function addConstant(Constant $constant): static
    {
        if (!$this->constants->contains($constant)) {
            $this->constants->add($constant);
            $constant->setConstantType($this);
        }

        return $this;
    }

    public function removeConstant(Constant $constant): static
    {
        if ($this->constants->removeElement($constant)) {
            // set the owning side to null (unless already changed)
            if ($constant->getConstantType() === $this) {
                $constant->setConstantType(null);
            }
        }

        return $this;
    }
}
