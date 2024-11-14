<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * MasterUom
 *
 * @ORM\Table(name="master_uom")
 * @ORM\Entity
 */
class MasterUom
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
     * @var string
     *
     * @ORM\Column(name="UOM_CODE", type="string", length=80, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $uomCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DENOM", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $denom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LENGTH", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $length;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WIDTH", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $width;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HEIGHT", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $height;

    /**
     * @var string|null
     *
     * @ORM\Column(name="M3", type="decimal", precision=20, scale=10, nullable=true)
     */
    private $m3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NET_WEIGHT", type="decimal", precision=20, scale=10, nullable=true)
     */
    private $netWeight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GROSS_WEIGHT", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $grossWeight;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COST_CURR", type="string", length=3, nullable=true)
     */
    private $costCurr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SELL_CURR", type="string", length=3, nullable=true)
     */
    private $sellCurr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COST_PRICE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $costPrice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SELL_PRICE", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $sellPrice;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userCreatedDatetime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATE_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userUpdateDatetime;

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
     * @ORM\Column(name="PER_PALLET", type="decimal", precision=20, scale=4, nullable=true)
     */
    private $perPallet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FILENAME", type="string", length=100, nullable=true)
     */
    private $filename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TEMP_UOM", type="string", length=80, nullable=true)
     */
    private $tempUom;

    

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

    public function getUomCode(): ?string
    {
        return $this->uomCode;
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

    public function setUomCode($uomCode)
    {
        $this->uomCode = $uomCode;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDenom(): ?string
    {
        return $this->denom;
    }

    public function setDenom(?string $denom): static
    {
        $this->denom = $denom;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(?string $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(?string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(?string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getM3(): ?string
    {
        return $this->m3;
    }

    public function setM3(?string $m3): static
    {
        $this->m3 = $m3;

        return $this;
    }

    public function getNetWeight(): ?string
    {
        return $this->netWeight;
    }

    public function setNetWeight(?string $netWeight): static
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    public function getGrossWeight(): ?string
    {
        return $this->grossWeight;
    }

    public function setGrossWeight(?string $grossWeight): static
    {
        $this->grossWeight = $grossWeight;

        return $this;
    }

    public function getCostCurr(): ?string
    {
        return $this->costCurr;
    }

    public function setCostCurr(?string $costCurr): static
    {
        $this->costCurr = $costCurr;

        return $this;
    }

    public function getSellCurr(): ?string
    {
        return $this->sellCurr;
    }

    public function setSellCurr(?string $sellCurr): static
    {
        $this->sellCurr = $sellCurr;

        return $this;
    }

    public function getCostPrice(): ?string
    {
        return $this->costPrice;
    }

    public function setCostPrice(?string $costPrice): static
    {
        $this->costPrice = $costPrice;

        return $this;
    }

    public function getSellPrice(): ?string
    {
        return $this->sellPrice;
    }

    public function setSellPrice(?string $sellPrice): static
    {
        $this->sellPrice = $sellPrice;

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

    public function getPerPallet(): ?string
    {
        return $this->perPallet;
    }

    public function setPerPallet(?string $perPallet): static
    {
        $this->perPallet = $perPallet;

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

    public function getTempUom(): ?string
    {
        return $this->tempUom;
    }

    public function setTempUom(?string $tempUom): static
    {
        $this->tempUom = $tempUom;

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

    public function getSupplierCode(): ?string
    {
        return $this->supplierCode;
    }

    public function getBackM3(): ?string
    {
        return $this->backM3;
    }

    public function setBackM3(?string $backM3): static
    {
        $this->backM3 = $backM3;

        return $this;
    }

    public function getNetWeightUom(): ?string
    {
        return $this->netWeightUom;
    }

    public function setNetWeightUom(?string $netWeightUom): static
    {
        $this->netWeightUom = $netWeightUom;

        return $this;
    }

    public function getGrossWeightUom(): ?string
    {
        return $this->grossWeightUom;
    }

    public function setGrossWeightUom(?string $grossWeightUom): static
    {
        $this->grossWeightUom = $grossWeightUom;

        return $this;
    }

    public function getPackUom(): ?string
    {
        return $this->packUom;
    }

    public function setPackUom(?string $packUom): static
    {
        $this->packUom = $packUom;

        return $this;
    }


}
