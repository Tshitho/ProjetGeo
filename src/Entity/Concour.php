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
}
