<?php

namespace App\Entity;

use App\Repository\BnrCompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=BnrCompanyRepository::class)
 * @UniqueEntity(fields="name", message="Нэр давхцаж байна.")
 * @UniqueEntity(fields="register", message="Регистер давхцаж  байна.")
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
     * @ORM\Column(type="string", length=50,unique=true)
     */
    private $name;

//    /**
//     * @ORM\Column(type="string", length=100)
//     */
//    private $username;
//
//    /**
//     * @ORM\Column(type="string", length=100)
//     */
//    private $pass;
//
//    /**
//     * @ORM\Column(type="string", length=100)
//     */
//    private $email;
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $percent;
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $paid;
//
//
//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $por;

    /**
     * @ORM\OneToMany(targetEntity=BnrBanner::class, mappedBy="company")
     */
    private $bnrBanners;

    /**
     * @ORM\OneToMany(targetEntity=GoGoWork::class, mappedBy="company")
     */
    private $goGoWorks;

    /**
     * @ORM\Column(type="string", length=50,unique=true)
     */
    private $register;

    public function __construct()
    {
        $this->bnrBanners = new ArrayCollection();
        $this->goGoWorks = new ArrayCollection();
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

//    public function getUsername(): ?string
//    {
//        return $this->username;
//    }
//
//    public function setUsername(string $username): self
//    {
//        $this->username = $username;
//
//        return $this;
//    }
//
//    public function getPass(): ?string
//    {
//        return $this->pass;
//    }
//
//    public function setPass(string $pass): self
//    {
//        $this->pass = $pass;
//
//        return $this;
//    }
//
//    public function getEmail(): ?string
//    {
//        return $this->email;
//    }
//
//    public function setEmail(string $email): self
//    {
//        $this->email = $email;
//
//        return $this;
//    }
//
//    public function getPercent(): ?int
//    {
//        return $this->percent;
//    }
//
//    public function setPercent(int $percent): self
//    {
//        $this->percent = $percent;
//
//        return $this;
//    }
//
//    public function getPaid(): ?int
//    {
//        return $this->paid;
//    }
//
//    public function setPaid(int $paid): self
//    {
//        $this->paid = $paid;
//
//        return $this;
//    }
//
//
//    public function getPor(): ?int
//    {
//        return $this->por;
//    }
//
//    public function setPor(int $por): self
//    {
//        $this->por = $por;
//
//        return $this;
//    }


/**
 * @return Collection|BnrBanner[]
 */
public function getBnrBanners(): Collection
{
    return $this->bnrBanners;
}

public function addBnrBanner(BnrBanner $bnrBanner): self
{
    if (!$this->bnrBanners->contains($bnrBanner)) {
        $this->bnrBanners[] = $bnrBanner;
        $bnrBanner->setCompany($this);
    }

    return $this;
}

public function removeBnrBanner(BnrBanner $bnrBanner): self
{
    if ($this->bnrBanners->contains($bnrBanner)) {
        $this->bnrBanners->removeElement($bnrBanner);
        // set the owning side to null (unless already changed)
        if ($bnrBanner->getCompany() === $this) {
            $bnrBanner->setCompany(null);
        }
    }

    return $this;
}

/**
 * @return Collection|GoGoWork[]
 */
public function getGoGoWorks(): Collection
{
    return $this->goGoWorks;
}

public function addGoGoWork(GoGoWork $goGoWork): self
{
    if (!$this->goGoWorks->contains($goGoWork)) {
        $this->goGoWorks[] = $goGoWork;
        $goGoWork->setCompany($this);
    }

    return $this;
}

public function removeGoGoWork(GoGoWork $goGoWork): self
{
    if ($this->goGoWorks->contains($goGoWork)) {
        $this->goGoWorks->removeElement($goGoWork);
        // set the owning side to null (unless already changed)
        if ($goGoWork->getCompany() === $this) {
            $goGoWork->setCompany(null);
        }
    }

    return $this;
}

public function getRegister(): ?string
{
    return $this->register;
}

public function setRegister(string $register): self
{
    $this->register = $register;

    return $this;
}}
