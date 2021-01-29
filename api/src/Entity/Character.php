<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 */
#[ApiResource(mercure: true)]
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $server;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $characterIngameId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMain;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Guild::class, inversedBy="characters")
     */
    private $guild;

    /**
     * @ORM\ManyToMany(targetEntity=CharacterClassCharacter::class, mappedBy="character")
     */
    private $characterClassCharacter;

    public function __construct()
    {
        $this->characterClassCharacter = new ArrayCollection();
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

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(string $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCharacterIngameId(): ?string
    {
        return $this->characterIngameId;
    }

    public function setCharacterIngameId(?string $characterIngameId): self
    {
        $this->characterIngameId = $characterIngameId;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsMain(): ?bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): self
    {
        $this->isMain = $isMain;

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

    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    public function setGuild(?Guild $guild): self
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * @return Collection|CharacterClassCharacter[]
     */
    public function getCharacterClassCharacter(): Collection
    {
        return $this->characterClassCharacter;
    }

    public function addCharacterClassCharacter(CharacterClassCharacter $characterClassCharacter): self
    {
        if (!$this->characterClassCharacter->contains($characterClassCharacter)) {
            $this->characterClassCharacter[] = $characterClassCharacter;
            $characterClassCharacter->addCharacter($this);
        }

        return $this;
    }

    public function removeCharacterClassCharacter(CharacterClassCharacter $characterClassCharacter): self
    {
        if ($this->characterClassCharacter->removeElement($characterClassCharacter)) {
            $characterClassCharacter->removeCharacter($this);
        }

        return $this;
    }
}
