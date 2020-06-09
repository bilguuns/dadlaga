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
     * @ORM\Column(type="integer")
     */
    private $arrearge;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="integer")
     */
    private $payment;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $sale;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $total;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contact_name;

    /**
     * @ORM\OneToOne(targetEntity=GoGoWorkType::class, cascade={"persist", "remove"})
     */
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=BnrCompany::class, cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity=CmsOperator::class, cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=CmsOperator::class, cascade={"persist", "remove"})
     */
    private $responded_by;

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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    public function getContactName(): ?string
    {
        return $this->contact_name;
    }

    public function setContactName(string $contact_name): self
    {
        $this->contact_name = $contact_name;

        return $this;
    }

    public function getType(): ?GoGoWorkType
    {
        return $this->type;
    }

    public function setType(?GoGoWorkType $type): self
    {
        $this->type = $type;

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
}
