<?php

namespace App\Entity;

use App\Repository\BnrPositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BnrPositionRepository::class)
 */
class BnrPosition
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
     * @ORM\Column(type="integer")
     */
    private $width;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $htmlID;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $defaultBanner;

    /**
     * @ORM\Column(type="integer")
     */
    private $service_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $ctitle;


    public function __construct()
    {
        $this->bnrBanners= new ArrayCollection();
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

    public function getWidth(): ?int
    {
        return $this->width;
    }

    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getHtmlID(): ?string
    {
        return $this->htmlID;
    }

    public function setHtmlID(string $htmlID): self
    {
        $this->htmlID = $htmlID;

        return $this;
    }

    public function getDefaultBanner(): ?string
    {
        return $this->defaultBanner;
    }

    public function setDefaultBanner(string $defaultBanner): self
    {
        $this->defaultBanner = $defaultBanner;

        return $this;
    }

    public function getServiceId(): ?int
    {
        return $this->service_id;
    }

    public function setServiceId(int $service_id): self
    {
        $this->service_id = $service_id;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCtitle(): ?string
    {
        return $this->ctitle;
    }

    public function setCtitle(string $ctitle): self
    {
        $this->ctitle = $ctitle;

        return $this;
    }

}
