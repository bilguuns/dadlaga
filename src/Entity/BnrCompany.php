<?php

namespace App\Entity;

use App\Repository\BnrCompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $por;

    /**
     * @ORM\OneToMany(targetEntity=BnrBanner::class, mappedBy="company")
     */
    private $bnrBanners;

    public function __construct()
    {
        $this->bnrBanners = new ArrayCollection();
    }

//    /**
//     * @ORM\ManyToOne(targetEntity=BnrBanner::class, inversedBy="company")
//     */
//    private $Banner;

//    /**
//     * @ORM\OneToMany(targetEntity=BnrBanner::class, mappedBy="company", orphanRemoval=true)
//     */
//    private $bnrBanners;

//    public function __construct()
//    {
//        $this->bnrBanners = new ArrayCollection();
//    }

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


    public function getPor(): ?int
    {
        return $this->por;
    }

    public function setPor(int $por): self
    {
        $this->por = $por;

        return $this;
    }

//    public function getBanner(): ?BnrBanner
//    {
//        return $this->Banner;
//    }
//
//    public function setBanner(?BnrBanner $Banner): self
//    {
//        $this->Banner = $Banner;
//
//        return $this;
//    }

//    /**
//     * @return Collection|BnrBanner[]
//     */
//    public function getBnrBanners(): Collection
//    {
//        return $this->bnrBanners;
//    }
//
//    public function addBnrBanner(BnrBanner $bnrBanner): self
//    {
//        if (!$this->bnrBanners->contains($bnrBanner)) {
//            $this->bnrBanners[] = $bnrBanner;
//            $bnrBanner->setCompany($this);
//        }
//
//        return $this;
//    }
//
//    public function removeBnrBanner(BnrBanner $bnrBanner): self
//    {
//        if ($this->bnrBanners->contains($bnrBanner)) {
//            $this->bnrBanners->removeElement($bnrBanner);
//            // set the owning side to null (unless already changed)
//            if ($bnrBanner->getCompany() === $this) {
//                $bnrBanner->setCompany(null);
//            }
//        }
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
}}
