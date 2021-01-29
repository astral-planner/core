<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CharacterClassRepository::class)
 */
class CharacterClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $code;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=CharacterClassCharacter::class, mappedBy="characterClass")
     */
    private $characterClassCharacters;

    public function __construct()
    {
        $this->characterClassCharacters = new ArrayCollection();
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|CharacterClassCharacter[]
     */
    public function getCharacterClassCharacters(): Collection
    {
        return $this->characterClassCharacters;
    }

    public function addCharacterClassCharacter(CharacterClassCharacter $characterClassCharacter): self
    {
        if (!$this->characterClassCharacters->contains($characterClassCharacter)) {
            $this->characterClassCharacters[] = $characterClassCharacter;
            $characterClassCharacter->addCharacterClass($this);
        }

        return $this;
    }

    public function removeCharacterClassCharacter(CharacterClassCharacter $characterClassCharacter): self
    {
        if ($this->characterClassCharacters->removeElement($characterClassCharacter)) {
            $characterClassCharacter->removeCharacterClass($this);
        }

        return $this;
    }
}
