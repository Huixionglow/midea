<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmissd1
 *
 * @ORM\Table(name="wmissd1", indexes={@ORM\Index(name="idx$$_b1d40002", columns={"CUST_CODE", "WHSE_CODE", "BRANCH_CODE", "COMPANY_CODE", "KEY7", "KEY5", "KEY4"})})
 * @ORM\Entity
 */
class Wmissd1
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
     * @var string|null
     *
     * @ORM\Column(name="BATCH_NUM", type="string", length=100, nullable=true)
     */
    private $batchNum;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="EXPIRY_DATE", type="datetime", nullable=true)
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
     * @ORM\Column(name="KEY2", type="datetime", nullable=true)
     */
    private $key2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_LOT", type="string", length=20, nullable=true)
     */
    private $customLot;

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
     * @ORM\Column(name="CURR", type="string", length=3, nullable=true)
     */
    private $curr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRICE", type="string", length=50, nullable=true)
     */
    private $price;

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
     * @ORM\Column(name="REFERENCE", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REMARK", type="string", length=1000, nullable=true)
     */
    private $remark;

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
     * @var string|null
     *
     * @ORM\Column(name="WMSTK_SEQID", type="string", length=20, nullable=true)
     */
    private $wmstkSeqid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="datetime", nullable=true, options={"default"="sysdate"})
     */
    private $userCreatedDatetime = 'sysdate';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATE_DATETIME", type="datetime", nullable=true, options={"default"="sysdate"})
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
     * @ORM\Column(name="LIQ", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $liq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TOTAL_LIQ", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalLiq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LOT_NO", type="string", length=20, nullable=true)
     */
    private $lotNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TOTAL_LIFE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalLife;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LINE_NUM", type="string", length=8, nullable=true)
     */
    private $lineNum;

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
     * @ORM\Column(name="IMP_FILENAME", type="string", length=100, nullable=true)
     */
    private $impFilename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXP_FILENAME", type="string", length=100, nullable=true)
     */
    private $expFilename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_DELETE_ID", type="string", length=20, nullable=true)
     */
    private $userDeleteId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_DELETE_DATETIME", type="datetime", nullable=true)
     */
    private $userDeleteDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PICKING_DELETE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $pickingDelete = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_EXPORT_ID", type="string", length=20, nullable=true)
     */
    private $userExportId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_EXPORT_DATETIME", type="datetime", nullable=true)
     */
    private $userExportDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_IMPORT_ID", type="string", length=20, nullable=true)
     */
    private $userImportId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_IMPORT_DATETIME", type="datetime", nullable=true)
     */
    private $userImportDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PICKING_DELETE_REMARK", type="string", length=1000, nullable=true)
     */
    private $pickingDeleteRemark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="OB_NUM_DOC1", type="string", length=80, nullable=true)
     */
    private $obNumDoc1;
    

    /**
     * @var string|null
     *
     * @ORM\Column(name="BAL_QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $balQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PICK_QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $pickQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logistic_number", type="string", length=50, nullable=true)
     */
    private $logisticNumber;

    public function getLogisticNumber(): ?string
    {
        return $this->logisticNumber;
    }

    public function setLogisticNumber(?string $logisticNumber): static
    {
        $this->logisticNumber = $logisticNumber;

        return $this;
    }


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

    public function getCustomLot(): ?string
    {
        return $this->customLot;
    }

    public function setCustomLot(?string $customLot): static
    {
        $this->customLot = $customLot;

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

    public function getCurr(): ?string
    {
        return $this->curr;
    }

    public function setCurr(?string $curr): static
    {
        $this->curr = $curr;

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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;

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

    public function getWmstkSeqid(): ?string
    {
        return $this->wmstkSeqid;
    }

    public function setWmstkSeqid(?string $wmstkSeqid): static
    {
        $this->wmstkSeqid = $wmstkSeqid;

        return $this;
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

    public function getLiq(): ?string
    {
        return $this->liq;
    }

    public function setLiq(?string $liq): static
    {
        $this->liq = $liq;

        return $this;
    }

    public function getTotalLiq(): ?string
    {
        return $this->totalLiq;
    }

    public function setTotalLiq(?string $totalLiq): static
    {
        $this->totalLiq = $totalLiq;

        return $this;
    }

    public function getLotNo(): ?string
    {
        return $this->lotNo;
    }

    public function setLotNo(?string $lotNo): static
    {
        $this->lotNo = $lotNo;

        return $this;
    }

    public function getTotalLife(): ?string
    {
        return $this->totalLife;
    }

    public function setTotalLife(?string $totalLife): static
    {
        $this->totalLife = $totalLife;

        return $this;
    }

    public function getLineNum(): ?string
    {
        return $this->lineNum;
    }

    public function setLineNum(?string $lineNum): static
    {
        $this->lineNum = $lineNum;

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

    public function getImpFilename(): ?string
    {
        return $this->impFilename;
    }

    public function setImpFilename(?string $impFilename): static
    {
        $this->impFilename = $impFilename;

        return $this;
    }

    public function getExpFilename(): ?string
    {
        return $this->expFilename;
    }

    public function setExpFilename(?string $expFilename): static
    {
        $this->expFilename = $expFilename;

        return $this;
    }

    public function getUserDeleteId(): ?string
    {
        return $this->userDeleteId;
    }

    public function setUserDeleteId(?string $userDeleteId): static
    {
        $this->userDeleteId = $userDeleteId;

        return $this;
    }

    public function getUserDeleteDatetime(): ?\DateTimeInterface
    {
        return $this->userDeleteDatetime;
    }

    public function setUserDeleteDatetime(?\DateTimeInterface $userDeleteDatetime): static
    {
        $this->userDeleteDatetime = $userDeleteDatetime;

        return $this;
    }

    public function getPickingDelete(): ?string
    {
        return $this->pickingDelete;
    }

    public function setPickingDelete(?string $pickingDelete): static
    {
        $this->pickingDelete = $pickingDelete;

        return $this;
    }

    public function getUserExportId(): ?string
    {
        return $this->userExportId;
    }

    public function setUserExportId(?string $userExportId): static
    {
        $this->userExportId = $userExportId;

        return $this;
    }

    public function getUserExportDatetime(): ?\DateTimeInterface
    {
        return $this->userExportDatetime;
    }

    public function setUserExportDatetime(?\DateTimeInterface $userExportDatetime): static
    {
        $this->userExportDatetime = $userExportDatetime;

        return $this;
    }

    public function getUserImportId(): ?string
    {
        return $this->userImportId;
    }

    public function setUserImportId(?string $userImportId): static
    {
        $this->userImportId = $userImportId;

        return $this;
    }

    public function getUserImportDatetime(): ?\DateTimeInterface
    {
        return $this->userImportDatetime;
    }

    public function setUserImportDatetime(?\DateTimeInterface $userImportDatetime): static
    {
        $this->userImportDatetime = $userImportDatetime;

        return $this;
    }

    public function getPickingDeleteRemark(): ?string
    {
        return $this->pickingDeleteRemark;
    }

    public function setPickingDeleteRemark(?string $pickingDeleteRemark): static
    {
        $this->pickingDeleteRemark = $pickingDeleteRemark;

        return $this;
    }

    public function getObNumDoc1(): ?string
    {
        return $this->obNumDoc1;
    }

    public function setObNumDoc1(?string $obNumDoc1): static
    {
        $this->obNumDoc1 = $obNumDoc1;

        return $this;
    }

    public function getBalQty(): ?string
    {
        return $this->balQty;
    }

    public function setBalQty(?string $balQty): static
    {
        $this->balQty = $balQty;

        return $this;
    }

    public function getPickQty(): ?string
    {
        return $this->pickQty;
    }

    public function setPickQty(?string $pickQty): static
    {
        $this->pickQty = $pickQty;

        return $this;
    }
}
