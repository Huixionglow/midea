<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmpickd2
 *
 * @ORM\Table(name="WMPICKD2", indexes={@ORM\Index(name="idx$$_7dea0001", columns={"PALLET_ID", "ITEM_CODE"})})
 * @ORM\Entity
 */
class Wmpickd2
{
    /**
     * @var string
     *
     * @ORM\Column(name="COMPANY_CODE", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $companyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="BRANCH_CODE", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $branchCode;

    /**
     * @var string
     *
     * @ORM\Column(name="WHSE_CODE", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $whseCode;

    /**
     * @var string
     *
     * @ORM\Column(name="CUST_CODE", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $custCode;

    /**
     * @var string
     *
     * @ORM\Column(name="ENTRY_NUM", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entryNum;

    /**
     * @var string
     *
     * @ORM\Column(name="ITEM_CODE", type="string", length=50, nullable=false)
     */
    private $itemCode;

    /**
     * @var string
     *
     * @ORM\Column(name="GRADE_CODE", type="string", length=20, nullable=false)
     */
    private $gradeCode;

    /**
     * @var string
     *
     * @ORM\Column(name="LOC_CODE", type="string", length=20, nullable=false)
     */
    private $locCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BATCH_NUM", type="string", length=100, nullable=true)
     */
    private $batchNum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="EXPIRY_DATE", type="date", nullable=true)
     */
    private $expiryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY1", type="string", length=50, nullable=true)
     */
    private $key1;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="KEY2", type="date", nullable=true)
     */
    private $key2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_FORM1", type="string", length=200, nullable=true)
     */
    private $customForm1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_FORM2", type="string", length=200, nullable=true)
     */
    private $customForm2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UOM_CODE", type="string", length=20, nullable=true)
     */
    private $uomCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UOM_CONV", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $uomConv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $qty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOOSE_QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $looseQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TOTAL_QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHASE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $phase;

    /**
     * @var string
     *
     * @ORM\Column(name="SEQID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $seqid;

    /**
     * @var string
     *
     * @ORM\Column(name="WMPICKD1_SEQID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $wmpickd1Seqid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="date", nullable=true, options={"default"="sysdate"})
     */
    private $userCreatedDatetime = 'sysdate';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATE_DATETIME", type="date", nullable=true, options={"default"="sysdate"})
     */
    private $userUpdateDatetime = 'sysdate';

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_CREATED_ID", type="string", length=20, nullable=true)
     */
    private $userCreatedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_UPDATE_ID", type="string", length=20, nullable=true)
     */
    private $userUpdateId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PALLET", type="decimal", precision=20, scale=4, nullable=true)
     */
    private $pallet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WEIGHT", type="decimal", precision=20, scale=4, nullable=true)
     */
    private $weight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PARTIAL_PALLET", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $partialPallet = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PALLET_ID", type="string", length=100, nullable=true)
     */
    private $palletId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PARTIAL_PALLET_ID", type="string", length=100, nullable=true)
     */
    private $partialPalletId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="QTY_AVAILABLE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $qtyAvailable;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="KEY3", type="date", nullable=true)
     */
    private $key3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY4", type="string", length=100, nullable=true)
     */
    private $key4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY5", type="string", length=50, nullable=true)
     */
    private $key5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY6", type="string", length=50, nullable=true)
     */
    private $key6;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY7", type="string", length=20, nullable=true)
     */
    private $key7;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="KEY8", type="date", nullable=true)
     */
    private $key8;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY9", type="string", length=20, nullable=true)
     */
    private $key9;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_FORM3", type="string", length=20, nullable=true)
     */
    private $customForm3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_FORM4", type="string", length=20, nullable=true)
     */
    private $customForm4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SCANNING_USER_ID", type="string", length=50, nullable=true)
     */
    private $scanningUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SCANNING_CREATED_DATETIME", type="date", nullable=true)
     */
    private $scanningCreatedDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SCANNING_PICK_QTY", type="decimal", precision=20, scale=5, nullable=true)
     */
    private $scanningPickQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WMSTKD_SEQID", type="string", length=50, nullable=true)
     */
    private $wmstkdSeqid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BILL_CARTON", type="decimal", precision=20, scale=6, nullable=true)
     */
    private $billCarton;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BILL_PALLET", type="decimal", precision=20, scale=6, nullable=true)
     */
    private $billPallet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTUAL_QTY", type="decimal", precision=20, scale=6, nullable=true)
     */
    private $actualQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STICKERING", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $stickering = 'N';

    public function getCompanyCode(): ?string
    {
        return $this->companyCode;
    }

    public function getBranchCode(): ?string
    {
        return $this->branchCode;
    }

    public function getWhseCode(): ?string
    {
        return $this->whseCode;
    }

    public function getCustCode(): ?string
    {
        return $this->custCode;
    }

    public function getEntryNum(): ?string
    {
        return $this->entryNum;
    }

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setItemCode(string $itemCode): static
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    public function getGradeCode(): ?string
    {
        return $this->gradeCode;
    }

    public function setGradeCode(string $gradeCode): static
    {
        $this->gradeCode = $gradeCode;

        return $this;
    }

    public function getLocCode(): ?string
    {
        return $this->locCode;
    }

    public function setLocCode(string $locCode): static
    {
        $this->locCode = $locCode;

        return $this;
    }

    public function getBatchNum(): ?string
    {
        return $this->batchNum;
    }

    public function setBatchNum(?string $batchNum): static
    {
        $this->batchNum = $batchNum;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?\DateTimeInterface $expiryDate): static
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getKey1(): ?string
    {
        return $this->key1;
    }

    public function setKey1(?string $key1): static
    {
        $this->key1 = $key1;

        return $this;
    }

    public function getKey2(): ?\DateTimeInterface
    {
        return $this->key2;
    }

    public function setKey2(?\DateTimeInterface $key2): static
    {
        $this->key2 = $key2;

        return $this;
    }

    public function getCustomForm1(): ?string
    {
        return $this->customForm1;
    }

    public function setCustomForm1(?string $customForm1): static
    {
        $this->customForm1 = $customForm1;

        return $this;
    }

    public function getCustomForm2(): ?string
    {
        return $this->customForm2;
    }

    public function setCustomForm2(?string $customForm2): static
    {
        $this->customForm2 = $customForm2;

        return $this;
    }

    public function getUomCode(): ?string
    {
        return $this->uomCode;
    }

    public function setUomCode(?string $uomCode): static
    {
        $this->uomCode = $uomCode;

        return $this;
    }

    public function getUomConv(): ?string
    {
        return $this->uomConv;
    }

    public function setUomConv(?string $uomConv): static
    {
        $this->uomConv = $uomConv;

        return $this;
    }

    public function getQty(): ?string
    {
        return $this->qty;
    }

    public function setQty(?string $qty): static
    {
        $this->qty = $qty;

        return $this;
    }

    public function getLooseQty(): ?string
    {
        return $this->looseQty;
    }

    public function setLooseQty(?string $looseQty): static
    {
        $this->looseQty = $looseQty;

        return $this;
    }

    public function getTotalQty(): ?string
    {
        return $this->totalQty;
    }

    public function setTotalQty(?string $totalQty): static
    {
        $this->totalQty = $totalQty;

        return $this;
    }

    public function getPhase(): ?string
    {
        return $this->phase;
    }

    public function setPhase(?string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }

    public function getSeqid(): ?string
    {
        return $this->seqid;
    }

    public function getWmpickd1Seqid(): ?string
    {
        return $this->wmpickd1Seqid;
    }

    public function getUserCreatedDatetime(): ?\DateTimeInterface
    {
        return $this->userCreatedDatetime;
    }

    public function setUserCreatedDatetime(?\DateTimeInterface $userCreatedDatetime): static
    {
        $this->userCreatedDatetime = $userCreatedDatetime;

        return $this;
    }

    public function getUserUpdateDatetime(): ?\DateTimeInterface
    {
        return $this->userUpdateDatetime;
    }

    public function setUserUpdateDatetime(?\DateTimeInterface $userUpdateDatetime): static
    {
        $this->userUpdateDatetime = $userUpdateDatetime;

        return $this;
    }

    public function getUserCreatedId(): ?string
    {
        return $this->userCreatedId;
    }

    public function setUserCreatedId(?string $userCreatedId): static
    {
        $this->userCreatedId = $userCreatedId;

        return $this;
    }

    public function getUserUpdateId(): ?string
    {
        return $this->userUpdateId;
    }

    public function setUserUpdateId(?string $userUpdateId): static
    {
        $this->userUpdateId = $userUpdateId;

        return $this;
    }

    public function getPallet(): ?string
    {
        return $this->pallet;
    }

    public function setPallet(?string $pallet): static
    {
        $this->pallet = $pallet;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getPartialPallet(): ?string
    {
        return $this->partialPallet;
    }

    public function setPartialPallet(?string $partialPallet): static
    {
        $this->partialPallet = $partialPallet;

        return $this;
    }

    public function getPalletId(): ?string
    {
        return $this->palletId;
    }

    public function setPalletId(?string $palletId): static
    {
        $this->palletId = $palletId;

        return $this;
    }

    public function getPartialPalletId(): ?string
    {
        return $this->partialPalletId;
    }

    public function setPartialPalletId(?string $partialPalletId): static
    {
        $this->partialPalletId = $partialPalletId;

        return $this;
    }

    public function getQtyAvailable(): ?string
    {
        return $this->qtyAvailable;
    }

    public function setQtyAvailable(?string $qtyAvailable): static
    {
        $this->qtyAvailable = $qtyAvailable;

        return $this;
    }

    public function getKey3(): ?\DateTimeInterface
    {
        return $this->key3;
    }

    public function setKey3(?\DateTimeInterface $key3): static
    {
        $this->key3 = $key3;

        return $this;
    }

    public function getKey4(): ?string
    {
        return $this->key4;
    }

    public function setKey4(?string $key4): static
    {
        $this->key4 = $key4;

        return $this;
    }

    public function getKey5(): ?string
    {
        return $this->key5;
    }

    public function setKey5(?string $key5): static
    {
        $this->key5 = $key5;

        return $this;
    }

    public function getKey6(): ?string
    {
        return $this->key6;
    }

    public function setKey6(?string $key6): static
    {
        $this->key6 = $key6;

        return $this;
    }

    public function getKey7(): ?string
    {
        return $this->key7;
    }

    public function setKey7(?string $key7): static
    {
        $this->key7 = $key7;

        return $this;
    }

    public function getKey8(): ?\DateTimeInterface
    {
        return $this->key8;
    }

    public function setKey8(?\DateTimeInterface $key8): static
    {
        $this->key8 = $key8;

        return $this;
    }

    public function getKey9(): ?string
    {
        return $this->key9;
    }

    public function setKey9(?string $key9): static
    {
        $this->key9 = $key9;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCustomForm3(): ?string
    {
        return $this->customForm3;
    }

    public function setCustomForm3(?string $customForm3): static
    {
        $this->customForm3 = $customForm3;

        return $this;
    }

    public function getCustomForm4(): ?string
    {
        return $this->customForm4;
    }

    public function setCustomForm4(?string $customForm4): static
    {
        $this->customForm4 = $customForm4;

        return $this;
    }

    public function getScanningUserId(): ?string
    {
        return $this->scanningUserId;
    }

    public function setScanningUserId(?string $scanningUserId): static
    {
        $this->scanningUserId = $scanningUserId;

        return $this;
    }

    public function getScanningCreatedDatetime(): ?\DateTimeInterface
    {
        return $this->scanningCreatedDatetime;
    }

    public function setScanningCreatedDatetime(?\DateTimeInterface $scanningCreatedDatetime): static
    {
        $this->scanningCreatedDatetime = $scanningCreatedDatetime;

        return $this;
    }

    public function getScanningPickQty(): ?string
    {
        return $this->scanningPickQty;
    }

    public function setScanningPickQty(?string $scanningPickQty): static
    {
        $this->scanningPickQty = $scanningPickQty;

        return $this;
    }

    public function getWmstkdSeqid(): ?string
    {
        return $this->wmstkdSeqid;
    }

    public function setWmstkdSeqid(?string $wmstkdSeqid): static
    {
        $this->wmstkdSeqid = $wmstkdSeqid;

        return $this;
    }

    public function getBillCarton(): ?string
    {
        return $this->billCarton;
    }

    public function setBillCarton(?string $billCarton): static
    {
        $this->billCarton = $billCarton;

        return $this;
    }

    public function getBillPallet(): ?string
    {
        return $this->billPallet;
    }

    public function setBillPallet(?string $billPallet): static
    {
        $this->billPallet = $billPallet;

        return $this;
    }

    public function getActualQty(): ?string
    {
        return $this->actualQty;
    }

    public function setActualQty(?string $actualQty): static
    {
        $this->actualQty = $actualQty;

        return $this;
    }

    public function getStickering(): ?string
    {
        return $this->stickering;
    }

    public function setStickering(?string $stickering): static
    {
        $this->stickering = $stickering;

        return $this;
    }


}
