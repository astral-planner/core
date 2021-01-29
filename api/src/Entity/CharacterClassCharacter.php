<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterClassCharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassCharacterRepository::class)
 */
#[ApiResource(mercure: true)]
class CharacterClassCharacter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="characterClassCharacter")
     */
    private $character;

    /**
     * @ORM\ManyToMany(targetEntity=CharacterClass::class, inversedBy="characterClassCharacters")
     */
    private $characterClass;

    public function __construct()
    {
        $this->character = new ArrayCollection();
        $this->characterClass = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

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
     * @return Collection|Character[]
     */
    public function getCharacter(): Collection
    {
        return $this->character;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->character->contains($character)) {
            $this->character[] = $character;
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        $this->character->removeElement($character);

        return $this;
    }

    /**
     * @return Collection|CharacterClass[]
     */
    public function getCharacterClass(): Collection
    {
        return $this->characterClass;
    }

    public function addCharacterClass(CharacterClass $characterClass): self
    {
        if (!$this->characterClass->contains($characterClass)) {
            $this->characterClass[] = $characterClass;
        }

        return $this;
    }

    public function removeCharacterClass(CharacterClass $characterClass): self
    {
        $this->characterClass->removeElement($characterClass);

        return $this;
    }
}
