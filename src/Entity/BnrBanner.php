<?php

namespace App\Entity;

use App\Repository\BnrBannerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BnrBannerRepository::class)
 */
class BnrBanner
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
    private $url;

    /**
     * @ORM\Column(type="datetime")
     */
    private $start_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $end_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $inserted_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $clicked_count;

    /**
     * @ORM\Column(type="integer")
     */
    private $order_num;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $hrefUrl;

    /**
     * @ORM\Column(type="integer")
     */
    private $playtime;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $approved_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $show_mode;

    /**
     * @ORM\Column(type="integer")
     */
    private $arrearage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comment;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $condition0;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contact_email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contact_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $contact_phone;

    /**
     * @ORM\Column(type="integer")
     */
    private $paid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pay_mode;

    /**
     * @ORM\Column(type="integer")
     */
    private $sale;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @ORM\Column(type="integer")
     */
    private $payment;

    /**
     * @ORM\Column(type="blob")
     */
    private $dialog;

    /**
     * @ORM\Column(type="integer")
     */
    private $DlgWidth;

    /**
     * @ORM\Column(type="integer")
     */
    private $DlgHeight;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $canvasUrl;

    /**
     * @ORM\Column(type="integer")
     */
    private $is_new;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $video_url;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $defaultImg;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $displayTime;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $swiffyBody;

    /**
     * @ORM\Column(type="integer")
     */
    private $selfTab;

    /**
     * @ORM\OneToOne(targetEntity=BnrPosition::class, cascade={"persist", "remove"})
     */
    private $position;

    /**
     * @ORM\OneToOne(targetEntity=CmsOperator::class, cascade={"persist", "remove"})
     */
    private $inserted_by;

    /**
     * @ORM\OneToOne(targetEntity=CmsOperator::class, cascade={"persist", "remove"})
     */
    private $approved_by;

    /**
     * @ORM\OneToOne(targetEntity=CmsOperator::class, cascade={"persist", "remove"})
     */
    private $responded_by;

    /**
     * @ORM\ManyToOne(targetEntity=BnrCompany::class, inversedBy="bnrBanners")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

//    /**
//     * @ORM\ManyToOne(targetEntity=BnrCompany::class, inversedBy="bnrBanners")
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $company;

//    /**
//     * @ORM\OneToMany(targetEntity=BnrCompany::class, mappedBy="Banner")
//     */
//    private $company;
//
//    public function __construct()
//    {
//        $this->company = new ArrayCollection();
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

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

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getInsertedDate(): ?\DateTimeInterface
    {
        return $this->inserted_date;
    }

    public function setInsertedDate(\DateTimeInterface $inserted_date): self
    {
        $this->inserted_date = $inserted_date;

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

    public function getOrderNum(): ?int
    {
        return $this->order_num;
    }

    public function setOrderNum(int $order_num): self
    {
        $this->order_num = $order_num;

        return $this;
    }

    public function getHrefUrl(): ?string
    {
        return $this->hrefUrl;
    }

    public function setHrefUrl(string $hrefUrl): self
    {
        $this->hrefUrl = $hrefUrl;

        return $this;
    }

    public function getPlaytime(): ?string
    {
        return $this->playtime;
    }

    public function setPlaytime(string $playtime): self
    {
        $this->playtime = $playtime;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getApprovedAt(): ?\DateTimeInterface
    {
        return $this->approved_at;
    }

    public function setApprovedAt(\DateTimeInterface $approved_at): self
    {
        $this->approved_at = $approved_at;

        return $this;
    }

    public function getShowMode(): ?int
    {
        return $this->show_mode;
    }

    public function setShowMode(int $show_mode): self
    {
        $this->show_mode = $show_mode;

        return $this;
    }

    public function getArrearage(): ?int
    {
        return $this->arrearage;
    }

    public function setArrearage(int $arrearage): self
    {
        $this->arrearage = $arrearage;

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

    public function getCondition0(): ?string
    {
        return $this->condition0;
    }

    public function setCondition0(string $condition0): self
    {
        $this->condition0 = $condition0;

        return $this;
    }

    public function getContactEmail(): ?string
    {
        return $this->contact_email;
    }

    public function setContactEmail(string $contact_email): self
    {
        $this->contact_email = $contact_email;

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

    public function getContactPhone(): ?string
    {
        return $this->contact_phone;
    }

    public function setContactPhone(string $contact_phone): self
    {
        $this->contact_phone = $contact_phone;

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

    public function getPayMode(): ?string
    {
        return $this->pay_mode;
    }

    public function setPayMode(string $pay_mode): self
    {
        $this->pay_mode = $pay_mode;

        return $this;
    }

    public function getSale(): ?int
    {
        return $this->sale;
    }

    public function setSale(int $sale): self
    {
        $this->sale = $sale;

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

    public function getDay(): ?int
    {
        return $this->day;
    }

    public function setDay(int $day): self
    {
        $this->day = $day;

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

    public function getDialog()
    {
        return $this->dialog;
    }

    public function setDialog($dialog): self
    {
        $this->dialog = $dialog;

        return $this;
    }

    public function getDlgWidth(): ?int
    {
        return $this->DlgWidth;
    }

    public function setDlgWidth(int $DlgWidth): self
    {
        $this->DlgWidth = $DlgWidth;

        return $this;
    }

    public function getDlgHeight(): ?int
    {
        return $this->DlgHeight;
    }

    public function setDlgHeight(int $DlgHeight): self
    {
        $this->DlgHeight = $DlgHeight;

        return $this;
    }

    public function getCanvasUrl(): ?string
    {
        return $this->canvasUrl;
    }

    public function setCanvasUrl(string $canvasUrl): self
    {
        $this->canvasUrl = $canvasUrl;

        return $this;
    }

    public function getIsNew(): ?int
    {
        return $this->is_new;
    }

    public function setIsNew(int $is_new): self
    {
        $this->is_new = $is_new;

        return $this;
    }

    public function getVideoUrl(): ?string
    {
        return $this->video_url;
    }

    public function setVideoUrl(string $video_url): self
    {
        $this->video_url = $video_url;

        return $this;
    }

    public function getDefaultImg(): ?string
    {
        return $this->defaultImg;
    }

    public function setDefaultImg(string $defaultImg): self
    {
        $this->defaultImg = $defaultImg;

        return $this;
    }

    public function getDisplayTime(): ?string
    {
        return $this->displayTime;
    }

    public function setDisplayTime(string $displayTime): self
    {
        $this->displayTime = $displayTime;

        return $this;
    }

    public function getSwiffyBody(): ?string
    {
        return $this->swiffyBody;
    }

    public function setSwiffyBody(string $swiffyBody): self
    {
        $this->swiffyBody = $swiffyBody;

        return $this;
    }

    public function getSelfTab(): ?int
    {
        return $this->selfTab;
    }

    public function setSelfTab(int $selfTab): self
    {
        $this->selfTab = $selfTab;

        return $this;
    }


    public function getPosition(): ?BnrPosition
    {
        return $this->position;
    }

    public function setPosition(?BnrPosition $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getInsertedBy(): ?CmsOperator
    {
        return $this->inserted_by;
    }

    public function setInsertedBy(?CmsOperator $inserted_by): self
    {
        $this->inserted_by = $inserted_by;

        return $this;
    }

    public function getApprovedBy(): ?CmsOperator
    {
        return $this->approved_by;
    }

    public function setApprovedBy(?CmsOperator $approved_by): self
    {
        $this->approved_by = $approved_by;

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

//    public function addCompany(BnrCompany $company): self
//    {
//        if (!$this->company->contains($company)) {
//            $this->company[] = $company;
//            $company->setBanner($this);
//        }
//
//        return $this;
//    }
//
//    public function removeCompany(BnrCompany $company): self
//    {
//        if ($this->company->contains($company)) {
//            $this->company->removeElement($company);
//            // set the owning side to null (unless already changed)
//            if ($company->getBanner() === $this) {
//                $company->setBanner(null);
//            }
//        }
//
//        return $this;
//    }


//public function getCompany(): ?BnrCompany
//{
//    return $this->company;
//}
//
//public function setCompany(?BnrCompany $company): self
//{
//    $this->company = $company;
//
//    return $this;
//}}


public function getCompany(): ?BnrCompany
{
    return $this->company;
}

public function setCompany(?BnrCompany $company): self
{
    $this->company = $company;

    return $this;
}}