<?php

namespace App\Entity;

use App\Repository\ConcourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcourRepository::class)
 */
class Concour
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
    private $uplaod;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $uydatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->uydatedAt = new \DateTimeImmutable();
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUplaod(): ?string
    {
        return $this->uplaod;
    }

    public function setUplaod(string $uplaod): self
    {
        $this->uplaod = $uplaod;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUydatedAt(): ?\DateTimeImmutable
    {
        return $this->uydatedAt;
    }

    public function setUydatedAt(\DateTimeImmutable $uydatedAt): self
    {
        $this->uydatedAt = $uydatedAt;

        return $this;
    }
}
