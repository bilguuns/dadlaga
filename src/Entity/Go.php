<?php

namespace App\Entity;

use App\Repository\GoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoRepository::class)
 */
class Go
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $time;

    /**
     * @ORM\Column(type="dateinterval")
     */
    private $fg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getFg(): ?\DateInterval
    {
        return $this->fg;
    }

    public function setFg(\DateInterval $fg): self
    {
        $this->fg = $fg;

        return $this;
    }
}
