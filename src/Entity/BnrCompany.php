<?php

namespace App\Entity;

use App\Repository\BnrCompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BnrCompanyRepository::class)
 */
class BnrCompany
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pass;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $percent;

    /**
     * @ORM\Column(type="integer")
     */
    private $paid;

    /**
     * @ORM\Column(type="integer")
     */
    private $banner_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $por;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPercent(): ?int
    {
        return $this->percent;
    }

    public function setPercent(int $percent): self
    {
        $this->percent = $percent;

        return $this;
    }

    public function getPaid(): ?int
    {
        return $this->paid;
    }

    public function setPaid(int $paid): self
    {
        $this->paid = $paid;

        return $this;
    }

    public function getBannerId(): ?int
    {
        return $this->banner_id;
    }

    public function setBannerId(int $banner_id): self
    {
        $this->banner_id = $banner_id;

        return $this;
    }

    public function getPor(): ?int
    {
        return $this->por;
    }

    public function setPor(int $por): self
    {
        $this->por = $por;

        return $this;
    }
}
