<?php

namespace App\Entity\Oracle\WMS_TN;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wmissd3
 *
 * @ORM\Table(name="wmissd3")
 * @ORM\Entity
 */
class Wmissd3
{
    /**
     * @var string
     *
     * @ORM\Column(name="company_code", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $companyCode;

    /**
     * @var string
     *
     * @ORM\Column(name="branch_code", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $branchCode;

    /**
     * @var string
     *
     * @ORM\Column(name="whse_code", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $whseCode;

    /**
     * @var string
     *
     * @ORM\Column(name="cust_code", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $custCode;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_num", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entryNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="item_code", type="string", length=50, nullable=true)
     */
    private $itemCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="grade_code", type="string", length=20, nullable=true)
     */
    private $gradeCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="batch_num", type="string", length=30, nullable=true)
     */
    private $batchNum;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="expiry_date", type="datetime", nullable=true)
     */
    private $expiryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="key1", type="string", length=20, nullable=true)
     */
    private $key1;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="key2", type="datetime", nullable=true)
     */
    private $key2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="custom_lot", type="string", length=20, nullable=true)
     */
    private $customLot;

    /**
     * @var string|null
     *
     * @ORM\Column(name="custom_form1", type="string", length=20, nullable=true)
     */
    private $customForm1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="custom_form2", type="string", length=20, nullable=true)
     */
    private $customForm2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uom_code", type="string", length=20, nullable=true)
     */
    private $uomCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uom_conv", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $uomConv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="curr", type="string", length=3, nullable=true)
     */
    private $curr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="price", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $price;

    /**
     * @var string|null
     *
     * @ORM\Column(name="qty", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $qty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loose_qty", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $looseQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_qty", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="remark", type="string", length=1000, nullable=true)
     */
    private $remark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phase", type="string", length=1, nullable=true)
     */
    private $phase;

    /**
     * @var string
     *
     * @ORM\Column(name="seqid", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $seqid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wmstk_seqid", type="string", length=20, nullable=true)
     */
    private $wmstkSeqid;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="user_created_datetime", type="datetime", nullable=true)
     */
    private $userCreatedDatetime;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="user_update_datetime", type="datetime", nullable=true)
     */
    private $userUpdateDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_created_id", type="string", length=20, nullable=true)
     */
    private $userCreatedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_update_id", type="string", length=20, nullable=true)
     */
    private $userUpdateId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="liq", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $liq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_liq", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalLiq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lot_no", type="string", length=20, nullable=true)
     */
    private $lotNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="total_life", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalLife;

    /**
     * @var string|null
     *
     * @ORM\Column(name="line_num", type="string", length=8, nullable=true)
     */
    private $lineNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pallet", type="decimal", precision=20, scale=4, nullable=true)
     */
    private $pallet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="weight", type="decimal", precision=20, scale=4, nullable=true)
     */
    private $weight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imp_filename", type="string", length=100, nullable=true)
     */
    private $impFilename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="exp_filename", type="string", length=100, nullable=true)
     */
    private $expFilename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_delete_id", type="string", length=20, nullable=true)
     */
    private $userDeleteId;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="user_delete_datetime", type="datetime", nullable=true)
     */
    private $userDeleteDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picking_delete", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $pickingDelete = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_export_id", type="string", length=20, nullable=true)
     */
    private $userExportId;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="user_export_datetime", type="datetime", nullable=true)
     */
    private $userExportDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_import_id", type="string", length=20, nullable=true)
     */
    private $userImportId;

    /**
     * @var \DateTimeInterface|null
     *
     * @ORM\Column(name="user_import_datetime", type="datetime", nullable=true)
     */
    private $userImportDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="picking_delete_remark", type="string", length=1000, nullable=true)
     */
    private $pickingDeleteRemark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="loc_code", type="string", length=20, nullable=true)
     */
    private $locCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serial_no", type="string", length=100, nullable=true)
     */
    private $serialNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wmissd1_seqid", type="string", length=20, nullable=true)
     */
    private $wmissd1Seqid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="shelf_life", type="integer", nullable=true)
     */
    private $shelfLife;

    /**
     * @var string|null
     *
     * @ORM\Column(name="wmpickd1_seqid", type="string", length=50, nullable=true)
     */
    private $wmpickd1Seqid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pick_instruction", type="string", length=255, nullable=true)
     */
    private $pickInstruction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pick_qty", type="decimal", precision=20, scale=0, nullable=true)
     */
    private $pickQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bal_qty", type="decimal", precision=20, scale=10, nullable=true)
     */
    private $balQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="serialno_retrieve", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $serialnoRetrieve = 'N';

    // Getters and Setters

    public function getCompanyCode(): ?string
    {
        return $this->companyCode;
    }

    public function setCompanyCode(string $companyCode): self
    {
        $this->companyCode = $companyCode;

        return $this;
    }

    public function getBranchCode(): ?string
    {
        return $this->branchCode;
    }

    public function setBranchCode(string $branchCode): self
    {
        $this->branchCode = $branchCode;

        return $this;
    }

    public function getWhseCode(): ?string
    {
        return $this->whseCode;
    }

    public function setWhseCode(string $whseCode): self
    {
        $this->whseCode = $whseCode;

        return $this;
    }

    public function getCustCode(): ?string
    {
        return $this->custCode;
    }

    public function setCustCode(string $custCode): self
    {
        $this->custCode = $custCode;

        return $this;
    }

    public function getEntryNum(): ?string
    {
        return $this->entryNum;
    }

    public function setEntryNum(string $entryNum): self
    {
        $this->entryNum = $entryNum;

        return $this;
    }

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setItemCode(?string $itemCode): self
    {
        $this->itemCode = $itemCode;

        return $this;
    }

    public function getGradeCode(): ?string
    {
        return $this->gradeCode;
    }

    public function setGradeCode(?string $gradeCode): self
    {
        $this->gradeCode = $gradeCode;

        return $this;
    }

    public function getBatchNum(): ?string
    {
        return $this->batchNum;
    }

    public function setBatchNum(?string $batchNum): self
    {
        $this->batchNum = $batchNum;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiryDate;
    }

    public function setExpiryDate(?\DateTimeInterface $expiryDate): self
    {
        $this->expiryDate = $expiryDate;

        return $this;
    }

    public function getKey1(): ?string
    {
        return $this->key1;
    }

    public function setKey1(?string $key1): self
    {
        $this->key1 = $key1;

        return $this;
    }

    public function getKey2(): ?\DateTimeInterface
    {
        return $this->key2;
    }

    public function setKey2(?\DateTimeInterface $key2): self
    {
        $this->key2 = $key2;

        return $this;
    }

    public function getCustomLot(): ?string
    {
        return $this->customLot;
    }

    public function setCustomLot(?string $customLot): self
    {
        $this->customLot = $customLot;

        return $this;
    }

    public function getCustomForm1(): ?string
    {
        return $this->customForm1;
    }

    public function setCustomForm1(?string $customForm1): self
    {
        $this->customForm1 = $customForm1;

        return $this;
    }

    public function getCustomForm2(): ?string
    {
        return $this->customForm2;
    }

    public function setCustomForm2(?string $customForm2): self
    {
        $this->customForm2 = $customForm2;

        return $this;
    }

    public function getUomCode(): ?string
    {
        return $this->uomCode;
    }

    public function setUomCode(?string $uomCode): self
    {
        $this->uomCode = $uomCode;

        return $this;
    }

    public function getUomConv(): ?string
    {
        return $this->uomConv;
    }

    public function setUomConv(?string $uomConv): self
    {
        $this->uomConv = $uomConv;

        return $this;
    }

    public function getCurr(): ?string
    {
        return $this->curr;
    }

    public function setCurr(?string $curr): self
    {
        $this->curr = $curr;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQty(): ?string
    {
        return $this->qty;
    }

    public function setQty(?string $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getLooseQty(): ?string
    {
        return $this->looseQty;
    }

    public function setLooseQty(?string $looseQty): self
    {
        $this->looseQty = $looseQty;

        return $this;
    }

    public function getTotalQty(): ?string
    {
        return $this->totalQty;
    }

    public function setTotalQty(?string $totalQty): self
    {
        $this->totalQty = $totalQty;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): self
    {
        $this->remark = $remark;

        return $this;
    }

    public function getPhase(): ?string
    {
        return $this->phase;
    }

    public function setPhase(?string $phase): self
    {
        $this->phase = $phase;

        return $this;
    }

    public function getSeqid(): ?string
    {
        return $this->seqid;
    }

    public function setSeqid(string $seqid): self
    {
        $this->seqid = $seqid;

        return $this;
    }

    public function getWmstkSeqid(): ?string
    {
        return $this->wmstkSeqid;
    }

    public function setWmstkSeqid(?string $wmstkSeqid): self
    {
        $this->wmstkSeqid = $wmstkSeqid;

        return $this;
    }

    public function getUserCreatedDatetime(): ?\DateTimeInterface
    {
        return $this->userCreatedDatetime;
    }

    public function setUserCreatedDatetime(?\DateTimeInterface $userCreatedDatetime): self
    {
        $this->userCreatedDatetime = $userCreatedDatetime;

        return $this;
    }

    public function getUserUpdateDatetime(): ?\DateTimeInterface
    {
        return $this->userUpdateDatetime;
    }

    public function setUserUpdateDatetime(?\DateTimeInterface $userUpdateDatetime): self
    {
        $this->userUpdateDatetime = $userUpdateDatetime;

        return $this;
    }

    public function getUserCreatedId(): ?string
    {
        return $this->userCreatedId;
    }

    public function setUserCreatedId(?string $userCreatedId): self
    {
        $this->userCreatedId = $userCreatedId;

        return $this;
    }

    public function getUserUpdateId(): ?string
    {
        return $this->userUpdateId;
    }

    public function setUserUpdateId(?string $userUpdateId): self
    {
        $this->userUpdateId = $userUpdateId;

        return $this;
    }

    public function getLiq(): ?string
    {
        return $this->liq;
    }

    public function setLiq(?string $liq): self
    {
        $this->liq = $liq;

        return $this;
    }

    public function getTotalLiq(): ?string
    {
        return $this->totalLiq;
    }

    public function setTotalLiq(?string $totalLiq): self
    {
        $this->totalLiq = $totalLiq;

        return $this;
    }

    public function getLotNo(): ?string
    {
        return $this->lotNo;
    }

    public function setLotNo(?string $lotNo): self
    {
        $this->lotNo = $lotNo;

        return $this;
    }

    public function getTotalLife(): ?string
    {
        return $this->totalLife;
    }

    public function setTotalLife(?string $totalLife): self
    {
        $this->totalLife = $totalLife;

        return $this;
    }

    public function getLineNum(): ?string
    {
        return $this->lineNum;
    }

    public function setLineNum(?string $lineNum): self
    {
        $this->lineNum = $lineNum;

        return $this;
    }

    public function getPallet(): ?string
    {
        return $this->pallet;
    }

    public function setPallet(?string $pallet): self
    {
        $this->pallet = $pallet;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getImpFilename(): ?string
    {
        return $this->impFilename;
    }

    public function setImpFilename(?string $impFilename): self
    {
        $this->impFilename = $impFilename;

        return $this;
    }

    public function getExpFilename(): ?string
    {
        return $this->expFilename;
    }

    public function setExpFilename(?string $expFilename): self
    {
        $this->expFilename = $expFilename;

        return $this;
    }

    public function getUserDeleteId(): ?string
    {
        return $this->userDeleteId;
    }

    public function setUserDeleteId(?string $userDeleteId): self
    {
        $this->userDeleteId = $userDeleteId;

        return $this;
    }

    public function getUserDeleteDatetime(): ?\DateTimeInterface
    {
        return $this->userDeleteDatetime;
    }

    public function setUserDeleteDatetime(?\DateTimeInterface $userDeleteDatetime): self
    {
        $this->userDeleteDatetime = $userDeleteDatetime;

        return $this;
    }

    public function getPickingDelete(): ?string
    {
        return $this->pickingDelete;
    }

    public function setPickingDelete(?string $pickingDelete): self
    {
        $this->pickingDelete = $pickingDelete;

        return $this;
    }

    public function getUserExportId(): ?string
    {
        return $this->userExportId;
    }

    public function setUserExportId(?string $userExportId): self
    {
        $this->userExportId = $userExportId;

        return $this;
    }

    public function getUserExportDatetime(): ?\DateTimeInterface
    {
        return $this->userExportDatetime;
    }

    public function setUserExportDatetime(?\DateTimeInterface $userExportDatetime): self
    {
        $this->userExportDatetime = $userExportDatetime;

        return $this;
    }

    public function getUserImportId(): ?string
    {
        return $this->userImportId;
    }

    public function setUserImportId(?string $userImportId): self
    {
        $this->userImportId = $userImportId;

        return $this;
    }

    public function getUserImportDatetime(): ?\DateTimeInterface
    {
        return $this->userImportDatetime;
    }

    public function setUserImportDatetime(?\DateTimeInterface $userImportDatetime): self
    {
        $this->userImportDatetime = $userImportDatetime;

        return $this;
    }

    public function getPickingDeleteRemark(): ?string
    {
        return $this->pickingDeleteRemark;
    }

    public function setPickingDeleteRemark(?string $pickingDeleteRemark): self
    {
        $this->pickingDeleteRemark = $pickingDeleteRemark;

        return $this;
    }

    public function getLocCode(): ?string
    {
        return $this->locCode;
    }

    public function setLocCode(?string $locCode): self
    {
        $this->locCode = $locCode;

        return $this;
    }

    public function getSerialNo(): ?string
    {
        return $this->serialNo;
    }

    public function setSerialNo(?string $serialNo): self
    {
        $this->serialNo = $serialNo;

        return $this;
    }

    public function getWmissd1Seqid(): ?string
    {
        return $this->wmissd1Seqid;
    }

    public function setWmissd1Seqid(?string $wmissd1Seqid): self
    {
        $this->wmissd1Seqid = $wmissd1Seqid;

        return $this;
    }

    public function getShelfLife(): ?int
    {
        return $this->shelfLife;
    }

    public function setShelfLife(?int $shelfLife): self
    {
        $this->shelfLife = $shelfLife;

        return $this;
    }

    public function getWmpickd1Seqid(): ?string
    {
        return $this->wmpickd1Seqid;
    }

    public function setWmpickd1Seqid(?string $wmpickd1Seqid): self
    {
        $this->wmpickd1Seqid = $wmpickd1Seqid;

        return $this;
    }

    public function getPickInstruction(): ?string
    {
        return $this->pickInstruction;
    }

    public function setPickInstruction(?string $pickInstruction): self
    {
        $this->pickInstruction = $pickInstruction;

        return $this;
    }

    public function getPickQty(): ?string
    {
        return $this->pickQty;
    }

    public function setPickQty(?string $pickQty): self
    {
        $this->pickQty = $pickQty;

        return $this;
    }

    public function getBalQty(): ?string
    {
        return $this->balQty;
    }

    public function setBalQty(?string $balQty): self
    {
        $this->balQty = $balQty;

        return $this;
    }

    public function getSerialnoRetrieve(): ?string
    {
        return $this->serialnoRetrieve;
    }

    public function setSerialnoRetrieve(?string $serialnoRetrieve): self
    {
        $this->serialnoRetrieve = $serialnoRetrieve;

        return $this;
    }
}
