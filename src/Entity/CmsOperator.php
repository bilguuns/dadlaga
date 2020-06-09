<?php

namespace App\Entity;

use App\Repository\CmsOperatorRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CmsOperatorRepository::class)
 */
class CmsOperator
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
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $permission;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $username;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_logged;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $phonenumber;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="integer")
     */
    private $editor;

    /**
     * @ORM\Column(type="integer")
     */
    private $real_ip;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(string $permission): self
    {
        $this->permission = $permission;

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

    public function getLastLogged(): ?\DateTimeInterface
    {
        return $this->last_logged;
    }

    public function setLastLogged(\DateTimeInterface $last_logged): self
    {
        $this->last_logged = $last_logged;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getRealIp(): ?int
    {
        return $this->real_ip;
    }

    public function setRealIp(int $real_ip): self
    {
        $this->real_ip = $real_ip;

        return $this;
    }
}
