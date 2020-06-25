<?php

namespace App\Entity;

use App\Repository\GoGoWorkTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoGoWorkTypeRepository::class)
 */
class GoGoWorkType
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
     * @ORM\Column(type="decimal", precision=13, scale=2)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=GoGoWork::class, mappedBy="Type")
     */
    private $goGoWorks;


    public function __construct()
    {
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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
            $goGoWork->setType($this);
        }

        return $this;
    }

    public function removeGoGoWork(GoGoWork $goGoWork): self
    {
        if ($this->goGoWorks->contains($goGoWork)) {
            $this->goGoWorks->removeElement($goGoWork);
            // set the owning side to null (unless already changed)
            if ($goGoWork->getType() === $this) {
                $goGoWork->setType(null);
            }
        }

        return $this;
    }

}
