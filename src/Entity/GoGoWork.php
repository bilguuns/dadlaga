<?php

namespace App\Entity;

use App\Repository\GoGoWorkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoGoWorkRepository::class)
 */
class GoGoWork
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=2)
     */
    private $arrearge;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $clicked_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=2)
     */
    private $payment;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=2)
     */
    private $sale;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="decimal",nullable=true)
     */
    private $total;
    /**
     * @ORM\Column(type="decimal", precision=13, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $comment;
    /**
     * @ORM\ManyToOne(targetEntity=BnrCompany::class, inversedBy="goGoWorks")
     */
    private $company;

    /**
     * @ORM\ManyToOne(targetEntity=CmsOperator::class, inversedBy="goGoWorks")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=CmsOperator::class, inversedBy="goGoWorks")
     */
    private $responded_by;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $contactName;

    /**
     * @ORM\ManyToOne(targetEntity=GoGoWorkType::class, inversedBy="goGoWorks")
     */
    private $Type;

    /**
     * @ORM\Column(type="decimal", precision=13, scale=2, nullable=true)
     */
    private $NOAT;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrearge(): ?int
    {
        return $this->arrearge;
    }

    public function setArrearge(int $arrearge): self
    {
        $this->arrearge = $arrearge;

        return $this;
    }

    public function getClickedCount(): ?int
    {
        return $this->clicked_count;
    }

    public function setClickedCount(int $clicked_count): self
    {
        $this->clicked_count = $clicked_count;

        return $this;
    }

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): self
    {
        $this->day = $day;

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

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
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

    public function getPayment(): ?int
    {
        return $this->payment;
    }

    public function setPayment(int $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getSale(): ?string
    {
        return $this->sale;
    }

    public function setSale(string $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCompany(): ?BnrCompany
    {
        return $this->company;
    }

    public function setCompany(?BnrCompany $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getUser(): ?CmsOperator
    {
        return $this->user;
    }

    public function setUser(?CmsOperator $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getRespondedBy(): ?CmsOperator
    {
        return $this->responded_by;
    }

    public function setRespondedBy(?CmsOperator $responded_by): self
    {
        $this->responded_by = $responded_by;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(string $contactName): self
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getType(): ?GoGoWorkType
    {
        return $this->Type;
    }

    public function setType(?GoGoWorkType $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getNOAT(): ?int
    {
        return $this->NOAT;
    }

    public function setNOAT(?int $NOAT): self
    {
        $this->NOAT = $NOAT;

        return $this;
    }

}
