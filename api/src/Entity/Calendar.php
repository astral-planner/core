<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CalendarRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendarRepository::class)
 */

#[ApiResource(mercure: true)]
class Calendar
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enableWeeklyReset;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $dayWeeklyReset;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $startDayCalendar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgBackground;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getEnableWeeklyReset(): ?bool
    {
        return $this->enableWeeklyReset;
    }

    public function setEnableWeeklyReset(bool $enableWeeklyReset): self
    {
        $this->enableWeeklyReset = $enableWeeklyReset;

        return $this;
    }

    public function getDayWeeklyReset(): ?string
    {
        return $this->dayWeeklyReset;
    }

    public function setDayWeeklyReset(string $dayWeeklyReset): self
    {
        $this->dayWeeklyReset = $dayWeeklyReset;

        return $this;
    }

    public function getStartDayCalendar(): ?string
    {
        return $this->startDayCalendar;
    }

    public function setStartDayCalendar(string $startDayCalendar): self
    {
        $this->startDayCalendar = $startDayCalendar;

        return $this;
    }

    public function getImgBackground(): ?string
    {
        return $this->imgBackground;
    }

    public function setImgBackground(?string $imgBackground): self
    {
        $this->imgBackground = $imgBackground;

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
}
