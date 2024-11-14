<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmstk
 *
 * @ORM\Table(name="wmstk")
 * @ORM\Entity
 */
class Wmstk
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
     * @ORM\Column(name="ITEM_CODE", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $itemCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ITEM_DESC", type="string", length=500, nullable=true)
     */
    private $itemDesc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EAN_CODE", type="string", length=80, nullable=true)
     */
    private $eanCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CATEGORY_CODE", type="string", length=20, nullable=true)
     */
    private $categoryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GROUP_CODE", type="string", length=30, nullable=true)
     */
    private $groupCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUBGROUP_CODE", type="string", length=35, nullable=true)
     */
    private $subgroupCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PLANT_CODE", type="string", length=15, nullable=true)
     */
    private $plantCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BRAND_CODE", type="string", length=8, nullable=true)
     */
    private $brandCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BUYER_CODE", type="string", length=8, nullable=true)
     */
    private $buyerCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRINCIPAL_CODE", type="string", length=8, nullable=true)
     */
    private $principalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TARIFF_CODE", type="string", length=20, nullable=true)
     */
    private $tariffCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COUNTRY_ORIGIN", type="string", length=20, nullable=true)
     */
    private $countryOrigin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MIN_STOCK", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $minStock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TOTAL_LIFE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $totalLife;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REMAIN_LIFE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $remainLife;

    /**
     * @var string
     *
     * @ORM\Column(name="UOM_CODE", type="string", length=8, nullable=false)
     */
    private $uomCode;

    /**
     * @var string
     *
     * @ORM\Column(name="QTY_ON_HAND", type="decimal", precision=20, scale=3, nullable=false)
     */
    private $qtyOnHand = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="QTY_ON_ORDER", type="decimal", precision=20, scale=3, nullable=false)
     */
    private $qtyOnOrder = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="QTY_ON_PICK", type="decimal", precision=20, scale=3, nullable=false)
     */
    private $qtyOnPick = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="SEQID", type="string", length=20, nullable=false)
     */
    private $seqid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY1_IND", type="string", length=1, nullable=true)
     */
    private $key1Ind;

    /**
     * @var string|null
     *
     * @ORM\Column(name="KEY2_IND", type="string", length=1, nullable=true)
     */
    private $key2Ind;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PACK", type="string", length=20, nullable=true)
     */
    private $pack;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PREF_LOC", type="string", length=1, nullable=true)
     */
    private $prefLoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LICENCE_NO", type="string", length=1, nullable=true)
     */
    private $licenceNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXPIRY_IND", type="string", length=1, nullable=true)
     */
    private $expiryInd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SERIAL", type="string", length=1, nullable=true)
     */
    private $serial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STACKABLE", type="string", length=1, nullable=true)
     */
    private $stackable;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BATCH_IND", type="string", length=1, nullable=true)
     */
    private $batchInd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CAPACITY", type="string", length=1, nullable=true)
     */
    private $capacity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ENDDATE_REQUIRED", type="string", length=1, nullable=true)
     */
    private $enddateRequired;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="START_DATE", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $startDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="END_DATE", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $endDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="START_HOUR", type="string", length=2, nullable=true)
     */
    private $startHour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="END_HOUR", type="string", length=2, nullable=true)
     */
    private $endHour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="START_MINUTE", type="string", length=2, nullable=true)
     */
    private $startMinute;

    /**
     * @var string|null
     *
     * @ORM\Column(name="END_MINUTE", type="string", length=2, nullable=true)
     */
    private $endMinute;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REFERENCE", type="string", length=200, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REMARK", type="string", length=255, nullable=true)
     */
    private $remark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTIVE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $active;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userCreatedDatetime = 'SYSDATE';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATE_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userUpdateDatetime = 'SYSDATE';

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
     * @ORM\Column(name="GROSS_WEIGHT_IND", type="string", length=1, nullable=true)
     */
    private $grossWeightInd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ITEM_DIMENSION", type="string", length=100, nullable=true)
     */
    private $itemDimension;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REORDER_POINT", type="string", length=100, nullable=true)
     */
    private $reorderPoint;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REORDER_QTY", type="string", length=100, nullable=true)
     */
    private $reorderQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALUE_UNIT", type="string", length=100, nullable=true)
     */
    private $valueUnit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRODUCT_CODE", type="string", length=100, nullable=true)
     */
    private $productCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BASE_UOM", type="string", length=10, nullable=true)
     */
    private $baseUom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UOM_CODE3", type="string", length=10, nullable=true)
     */
    private $uomCode3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FILENAME", type="string", length=100, nullable=true)
     */
    private $filename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PALLET", type="string", length=50, nullable=true)
     */
    private $pallet;

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

    public function getItemCode(): ?string
    {
        return $this->itemCode;
    }

    public function setCompanyCode($companyCode)
    {
        $this->companyCode = $companyCode;
    }

    public function setBranchCode($branchCode)
    {
        $this->branchCode = $branchCode;
    }

    public function setWhseCode($whseCode)
    {
        $this->whseCode = $whseCode;
    }

    public function setCustCode($custCode)
    {
        $this->custCode = $custCode;
    }

    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
    }


    public function getItemDesc(): ?string
    {
        return $this->itemDesc;
    }

    public function setItemDesc(?string $itemDesc): static
    {
        $this->itemDesc = $itemDesc;

        return $this;
    }

    public function getEanCode(): ?string
    {
        return $this->eanCode;
    }

    public function setEanCode(?string $eanCode): static
    {
        $this->eanCode = $eanCode;

        return $this;
    }

    public function getCategoryCode(): ?string
    {
        return $this->categoryCode;
    }

    public function setCategoryCode(?string $categoryCode): static
    {
        $this->categoryCode = $categoryCode;

        return $this;
    }

    public function getGroupCode(): ?string
    {
        return $this->groupCode;
    }

    public function setGroupCode(?string $groupCode): static
    {
        $this->groupCode = $groupCode;

        return $this;
    }

    public function getSubgroupCode(): ?string
    {
        return $this->subgroupCode;
    }

    public function setSubgroupCode(?string $subgroupCode): static
    {
        $this->subgroupCode = $subgroupCode;

        return $this;
    }

    public function getPlantCode(): ?string
    {
        return $this->plantCode;
    }

    public function setPlantCode(?string $plantCode): static
    {
        $this->plantCode = $plantCode;

        return $this;
    }

    public function getBrandCode(): ?string
    {
        return $this->brandCode;
    }

    public function setBrandCode(?string $brandCode): static
    {
        $this->brandCode = $brandCode;

        return $this;
    }

    public function getBuyerCode(): ?string
    {
        return $this->buyerCode;
    }

    public function setBuyerCode(?string $buyerCode): static
    {
        $this->buyerCode = $buyerCode;

        return $this;
    }

    public function getPrincipalCode(): ?string
    {
        return $this->principalCode;
    }

    public function setPrincipalCode(?string $principalCode): static
    {
        $this->principalCode = $principalCode;

        return $this;
    }

    public function getTariffCode(): ?string
    {
        return $this->tariffCode;
    }

    public function setTariffCode(?string $tariffCode): static
    {
        $this->tariffCode = $tariffCode;

        return $this;
    }

    public function getCountryOrigin(): ?string
    {
        return $this->countryOrigin;
    }

    public function setCountryOrigin(?string $countryOrigin): static
    {
        $this->countryOrigin = $countryOrigin;

        return $this;
    }

    public function getMinStock(): ?string
    {
        return $this->minStock;
    }

    public function setMinStock(?string $minStock): static
    {
        $this->minStock = $minStock;

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

    public function getRemainLife(): ?string
    {
        return $this->remainLife;
    }

    public function setRemainLife(?string $remainLife): static
    {
        $this->remainLife = $remainLife;

        return $this;
    }

    public function getUomCode(): ?string
    {
        return $this->uomCode;
    }

    public function setUomCode(string $uomCode): static
    {
        $this->uomCode = $uomCode;

        return $this;
    }

    public function getQtyOnHand(): ?string
    {
        return $this->qtyOnHand;
    }

    public function setQtyOnHand(string $qtyOnHand): static
    {
        $this->qtyOnHand = $qtyOnHand;

        return $this;
    }

    public function getQtyOnOrder(): ?string
    {
        return $this->qtyOnOrder;
    }

    public function setQtyOnOrder(string $qtyOnOrder): static
    {
        $this->qtyOnOrder = $qtyOnOrder;

        return $this;
    }

    public function getQtyOnPick(): ?string
    {
        return $this->qtyOnPick;
    }

    public function setQtyOnPick(string $qtyOnPick): static
    {
        $this->qtyOnPick = $qtyOnPick;

        return $this;
    }

    public function getSeqid(): ?string
    {
        return $this->seqid;
    }

    public function setSeqid(string $seqid): static
    {
        $this->seqid = $seqid;

        return $this;
    }

    public function getKey1Ind(): ?string
    {
        return $this->key1Ind;
    }

    public function setKey1Ind(?string $key1Ind): static
    {
        $this->key1Ind = $key1Ind;

        return $this;
    }

    public function getKey2Ind(): ?string
    {
        return $this->key2Ind;
    }

    public function setKey2Ind(?string $key2Ind): static
    {
        $this->key2Ind = $key2Ind;

        return $this;
    }

    public function getPack(): ?string
    {
        return $this->pack;
    }

    public function setPack(?string $pack): static
    {
        $this->pack = $pack;

        return $this;
    }

    public function getPrefLoc(): ?string
    {
        return $this->prefLoc;
    }

    public function setPrefLoc(?string $prefLoc): static
    {
        $this->prefLoc = $prefLoc;

        return $this;
    }

    public function getLicenceNo(): ?string
    {
        return $this->licenceNo;
    }

    public function setLicenceNo(?string $licenceNo): static
    {
        $this->licenceNo = $licenceNo;

        return $this;
    }

    public function getExpiryInd(): ?string
    {
        return $this->expiryInd;
    }

    public function setExpiryInd(?string $expiryInd): static
    {
        $this->expiryInd = $expiryInd;

        return $this;
    }

    public function getSerial(): ?string
    {
        return $this->serial;
    }

    public function setSerial(?string $serial): static
    {
        $this->serial = $serial;

        return $this;
    }

    public function getStackable(): ?string
    {
        return $this->stackable;
    }

    public function setStackable(?string $stackable): static
    {
        $this->stackable = $stackable;

        return $this;
    }

    public function getBatchInd(): ?string
    {
        return $this->batchInd;
    }

    public function setBatchInd(?string $batchInd): static
    {
        $this->batchInd = $batchInd;

        return $this;
    }

    public function getCapacity(): ?string
    {
        return $this->capacity;
    }

    public function setCapacity(?string $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getEnddateRequired(): ?string
    {
        return $this->enddateRequired;
    }

    public function setEnddateRequired(?string $enddateRequired): static
    {
        $this->enddateRequired = $enddateRequired;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getStartHour(): ?string
    {
        return $this->startHour;
    }

    public function setStartHour(?string $startHour): static
    {
        $this->startHour = $startHour;

        return $this;
    }

    public function getEndHour(): ?string
    {
        return $this->endHour;
    }

    public function setEndHour(?string $endHour): static
    {
        $this->endHour = $endHour;

        return $this;
    }

    public function getStartMinute(): ?string
    {
        return $this->startMinute;
    }

    public function setStartMinute(?string $startMinute): static
    {
        $this->startMinute = $startMinute;

        return $this;
    }

    public function getEndMinute(): ?string
    {
        return $this->endMinute;
    }

    public function setEndMinute(?string $endMinute): static
    {
        $this->endMinute = $endMinute;

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

    public function getActive(): ?string
    {
        return $this->active;
    }

    public function setActive(?string $active): static
    {
        $this->active = $active;

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

    public function getGrossWeightInd(): ?string
    {
        return $this->grossWeightInd;
    }

    public function setGrossWeightInd(?string $grossWeightInd): static
    {
        $this->grossWeightInd = $grossWeightInd;

        return $this;
    }

    public function getItemDimension(): ?string
    {
        return $this->itemDimension;
    }

    public function setItemDimension(?string $itemDimension): static
    {
        $this->itemDimension = $itemDimension;

        return $this;
    }

    public function getReorderPoint(): ?string
    {
        return $this->reorderPoint;
    }

    public function setReorderPoint(?string $reorderPoint): static
    {
        $this->reorderPoint = $reorderPoint;

        return $this;
    }

    public function getReorderQty(): ?string
    {
        return $this->reorderQty;
    }

    public function setReorderQty(?string $reorderQty): static
    {
        $this->reorderQty = $reorderQty;

        return $this;
    }

    public function getValueUnit(): ?string
    {
        return $this->valueUnit;
    }

    public function setValueUnit(?string $valueUnit): static
    {
        $this->valueUnit = $valueUnit;

        return $this;
    }

    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    public function setProductCode(?string $productCode): static
    {
        $this->productCode = $productCode;

        return $this;
    }

    public function getBaseUom(): ?string
    {
        return $this->baseUom;
    }

    public function setBaseUom(?string $baseUom): static
    {
        $this->baseUom = $baseUom;

        return $this;
    }

    public function getUomCode3(): ?string
    {
        return $this->uomCode3;
    }

    public function setUomCode3(?string $uomCode3): static
    {
        $this->uomCode3 = $uomCode3;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): static
    {
        $this->filename = $filename;

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


}
