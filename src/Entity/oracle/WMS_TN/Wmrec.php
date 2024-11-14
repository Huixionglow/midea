<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmrec
 *
 * @ORM\Table(name="wmrec", indexes={@ORM\Index(name="idx$$_72780002", columns={"COMPANY_CODE", "CUST_CODE", "WHSE_CODE", "BRANCH_CODE", "ENTRY_DATE", "ENTRY_NUM"}), @ORM\Index(name="idx$$_b1d40004", columns={"CUST_CODE", "WHSE_CODE", "BRANCH_CODE", "COMPANY_CODE", "PHASE"})})
 * @ORM\Entity
 */
class Wmrec
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="ENTRY_DATE", type="datetime", nullable=true, options={"default"="to_date(SYSDATE,'DD/MM/YY')"})
     */
    private $entryDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ETA_DATE", type="datetime", nullable=true, options={"default"="to_date(SYSDATE,'DD/MM/YY')"})
     */
    private $etaDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC1", type="string", length=50, nullable=true)
     */
    private $doc1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC2", type="string", length=50, nullable=true)
     */
    private $doc2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC3", type="string", length=50, nullable=true)
     */
    private $doc3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC4", type="string", length=50, nullable=true)
     */
    private $doc4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUST_PO", type="string", length=50, nullable=true)
     */
    private $custPo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MOVETYPE", type="string", length=8, nullable=true)
     */
    private $movetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRIORITY", type="string", length=20, nullable=true)
     */
    private $priority;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUPPLIER_CODE", type="string", length=20, nullable=true)
     */
    private $supplierCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUPPLIER_NAME", type="string", length=80, nullable=true)
     */
    private $supplierName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADD1", type="string", length=200, nullable=true)
     */
    private $add1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADD2", type="string", length=200, nullable=true)
     */
    private $add2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADD3", type="string", length=200, nullable=true)
     */
    private $add3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADD4", type="string", length=200, nullable=true)
     */
    private $add4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="POSTAL_CODE", type="string", length=20, nullable=true)
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CITY", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STATE", type="string", length=50, nullable=true)
     */
    private $state;

    /**
     * @var string|null
     *
     * @ORM\Column(name="COUNTRY", type="string", length=20, nullable=true)
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TEL", type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FAX", type="string", length=20, nullable=true)
     */
    private $fax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONTACT_PERSON", type="string", length=20, nullable=true)
     */
    private $contactPerson;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RECEIVE_AREA", type="string", length=20, nullable=true)
     */
    private $receiveArea;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RECEIVE_DOCK", type="string", length=20, nullable=true)
     */
    private $receiveDock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REMARK", type="string", length=1000, nullable=true)
     */
    private $remark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRANSPORT_CODE", type="string", length=20, nullable=true)
     */
    private $transportCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HAULIER", type="string", length=20, nullable=true)
     */
    private $haulier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BL_NUM", type="string", length=20, nullable=true)
     */
    private $blNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MAWB_NUM", type="string", length=20, nullable=true)
     */
    private $mawbNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="HAWB_NUM", type="string", length=20, nullable=true)
     */
    private $hawbNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="FLIGHT_NUM", type="string", length=20, nullable=true)
     */
    private $flightNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONFIRM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $confirm = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CONFIRM_DATE", type="datetime", nullable=true)
     */
    private $confirmDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VOIDED", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $voided = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="VOID_DATE", type="datetime", nullable=true)
     */
    private $voidDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRINT", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $print = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PRINT_DATE", type="datetime", nullable=true)
     */
    private $printDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CLOSE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $close = 'N';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CLOSE_DATE", type="datetime", nullable=true)
     */
    private $closeDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PHASE", type="string", length=1, nullable=true, options={"fixed"=true, "default"="1"})
     */
    private $phase;


    /**
     * @var string
     *
     * @ORM\Column(name="SEQID", type="string", length=20, nullable=false)
     */
    private $seqid;

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
     * @var int|null
     *
     * @ORM\Column(name="PRINT_COUNT", type="smallint", nullable=true)
     */
    private $printCount;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_METHOD", type="string", length=1, nullable=true, options={"default"="I","fixed"=true})
     */
    private $recMethod = 'M';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRUCK_IN_DATE", type="datetime", nullable=true)
     */
    private $truckInDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRUCK_IN_TIME", type="string", length=100, nullable=true)
     */
    private $truckInTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRUCK_OUT_DATE", type="datetime", nullable=true)
     */
    private $truckOutDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRUCK_OUT_TIME", type="string", length=100, nullable=true)
     */
    private $truckOutTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="UNLOAD_START_DATE", type="datetime", nullable=true)
     */
    private $unloadStartDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UNLOAD_START_TIME", type="string", length=100, nullable=true)
     */
    private $unloadStartTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="UNLOAD_END_DATE", type="datetime", nullable=true)
     */
    private $unloadEndDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UNLOAD_END_TIME", type="string", length=100, nullable=true)
     */
    private $unloadEndTime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOCUMENT_TYPE", type="string", length=20, nullable=true)
     */
    private $documentType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_REC_API", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $IsRecApi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ori_id", type="string", length=50, nullable=true)
     */
    private $oriId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="organization_id", type="string", length=50, nullable=true)
     */
    private $organizationId;

    public function getOriId(): ?string
    {
        return $this->oriId;
    }

    public function setOriId(?string $oriId): self
    {
        $this->oriId = $oriId;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->organizationId;
    }

    public function setOrganizationId(?string $organizationId): self
    {
        $this->organizationId = $organizationId;

        return $this;
    }


    public function getIsRecApi(): ?string
    {
        return $this->IsRecApi;
    }

    public function setIsRecApi(?string $IsRecApi): self
    {
        $this->IsRecApi = $IsRecApi;

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

public function setEntryNum($entryNum)
{
    $this->entryNum = $entryNum;
}

    public function getEntryDate(): ?\DateTimeInterface
    {
        return $this->entryDate;
    }

    public function setEntryDate(?\DateTimeInterface $entryDate): static
    {
        $this->entryDate = $entryDate;

        return $this;
    }

    public function getEtaDate(): ?\DateTimeInterface
    {
        return $this->etaDate;
    }

    public function setEtaDate(?\DateTimeInterface $etaDate): static
    {
        $this->etaDate = $etaDate;

        return $this;
    }

    public function getDoc1(): ?string
    {
        return $this->doc1;
    }

    public function setDoc1(?string $doc1): static
    {
        $this->doc1 = $doc1;

        return $this;
    }

    public function getDoc2(): ?string
    {
        return $this->doc2;
    }

    public function setDoc2(?string $doc2): static
    {
        $this->doc2 = $doc2;

        return $this;
    }

    public function getDoc3(): ?string
    {
        return $this->doc3;
    }

    public function setDoc3(?string $doc3): static
    {
        $this->doc3 = $doc3;

        return $this;
    }

    public function getDoc4(): ?string
    {
        return $this->doc4;
    }

    public function setDoc4(?string $doc4): static
    {
        $this->doc4 = $doc4;

        return $this;
    }

    public function getCustPo(): ?string
    {
        return $this->custPo;
    }

    public function setCustPo(?string $custPo): static
    {
        $this->custPo = $custPo;

        return $this;
    }

    public function getMovetype(): ?string
    {
        return $this->movetype;
    }

    public function setMovetype(?string $movetype): static
    {
        $this->movetype = $movetype;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(?string $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    public function getSupplierCode(): ?string
    {
        return $this->supplierCode;
    }

    public function setSupplierCode(?string $supplierCode): static
    {
        $this->supplierCode = $supplierCode;

        return $this;
    }

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function setSupplierName(?string $supplierName): static
    {
        $this->supplierName = $supplierName;

        return $this;
    }

    public function getAdd1(): ?string
    {
        return $this->add1;
    }

    public function setAdd1(?string $add1): static
    {
        $this->add1 = $add1;

        return $this;
    }

    public function getAdd2(): ?string
    {
        return $this->add2;
    }

    public function setAdd2(?string $add2): static
    {
        $this->add2 = $add2;

        return $this;
    }

    public function getAdd3(): ?string
    {
        return $this->add3;
    }

    public function setAdd3(?string $add3): static
    {
        $this->add3 = $add3;

        return $this;
    }

    public function getAdd4(): ?string
    {
        return $this->add4;
    }

    public function setAdd4(?string $add4): static
    {
        $this->add4 = $add4;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getContactPerson(): ?string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(?string $contactPerson): static
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    public function getReceiveArea(): ?string
    {
        return $this->receiveArea;
    }

    public function setReceiveArea(?string $receiveArea): static
    {
        $this->receiveArea = $receiveArea;

        return $this;
    }

    public function getReceiveDock(): ?string
    {
        return $this->receiveDock;
    }

    public function setReceiveDock(?string $receiveDock): static
    {
        $this->receiveDock = $receiveDock;

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

    public function getTransportCode(): ?string
    {
        return $this->transportCode;
    }

    public function setTransportCode(?string $transportCode): static
    {
        $this->transportCode = $transportCode;

        return $this;
    }

    public function getHaulier(): ?string
    {
        return $this->haulier;
    }

    public function setHaulier(?string $haulier): static
    {
        $this->haulier = $haulier;

        return $this;
    }

    public function getBlNum(): ?string
    {
        return $this->blNum;
    }

    public function setBlNum(?string $blNum): static
    {
        $this->blNum = $blNum;

        return $this;
    }

    public function getMawbNum(): ?string
    {
        return $this->mawbNum;
    }

    public function setMawbNum(?string $mawbNum): static
    {
        $this->mawbNum = $mawbNum;

        return $this;
    }

    public function getHawbNum(): ?string
    {
        return $this->hawbNum;
    }

    public function setHawbNum(?string $hawbNum): static
    {
        $this->hawbNum = $hawbNum;

        return $this;
    }

    public function getFlightNum(): ?string
    {
        return $this->flightNum;
    }

    public function setFlightNum(?string $flightNum): static
    {
        $this->flightNum = $flightNum;

        return $this;
    }

    public function getConfirm(): ?string
    {
        return $this->confirm;
    }

    public function setConfirm(?string $confirm): static
    {
        $this->confirm = $confirm;

        return $this;
    }

    public function getConfirmDate(): ?\DateTimeInterface
    {
        return $this->confirmDate;
    }

    public function setConfirmDate(?\DateTimeInterface $confirmDate): static
    {
        $this->confirmDate = $confirmDate;

        return $this;
    }

    public function getVoided(): ?string
    {
        return $this->voided;
    }

    public function setVoided(?string $voided): static
    {
        $this->voided = $voided;

        return $this;
    }

    public function getVoidDate(): ?\DateTimeInterface
    {
        return $this->voidDate;
    }

    public function setVoidDate(?\DateTimeInterface $voidDate): static
    {
        $this->voidDate = $voidDate;

        return $this;
    }

    public function getPrint(): ?string
    {
        return $this->print;
    }

    public function setPrint(?string $print): static
    {
        $this->print = $print;

        return $this;
    }

    public function getPrintDate(): ?\DateTimeInterface
    {
        return $this->printDate;
    }

    public function setPrintDate(?\DateTimeInterface $printDate): static
    {
        $this->printDate = $printDate;

        return $this;
    }

    public function getClose(): ?string
    {
        return $this->close;
    }

    public function setClose(?string $close): static
    {
        $this->close = $close;

        return $this;
    }

    public function getCloseDate(): ?\DateTimeInterface
    {
        return $this->closeDate;
    }

    public function setCloseDate(?\DateTimeInterface $closeDate): static
    {
        $this->closeDate = $closeDate;

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

    public function setSeqid(string $seqid): static
    {
        $this->seqid = $seqid;

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

    public function getPrintCount(): ?int
    {
        return $this->printCount;
    }

    public function setPrintCount(?int $printCount): static
    {
        $this->printCount = $printCount;

        return $this;
    }

    public function getRecMethod(): ?string
    {
        return $this->recMethod;
    }

    public function setRecMethod(?string $recMethod): static
    {
        $this->recMethod = $recMethod;

        return $this;
    }

   

    public function getTruckInDate(): ?\DateTimeInterface
    {
        return $this->truckInDate;
    }

    public function setTruckInDate(?\DateTimeInterface $truckInDate): static
    {
        $this->truckInDate = $truckInDate;

        return $this;
    }

    public function getTruckInTime(): ?string
    {
        return $this->truckInTime;
    }

    public function setTruckInTime(?string $truckInTime): static
    {
        $this->truckInTime = $truckInTime;

        return $this;
    }

    public function getTruckOutDate(): ?\DateTimeInterface
    {
        return $this->truckOutDate;
    }

    public function setTruckOutDate(?\DateTimeInterface $truckOutDate): static
    {
        $this->truckOutDate = $truckOutDate;

        return $this;
    }

    public function getTruckOutTime(): ?string
    {
        return $this->truckOutTime;
    }

    public function setTruckOutTime(?string $truckOutTime): static
    {
        $this->truckOutTime = $truckOutTime;

        return $this;
    }

    public function getUnloadStartDate(): ?\DateTimeInterface
    {
        return $this->unloadStartDate;
    }

    public function setUnloadStartDate(?\DateTimeInterface $unloadStartDate): static
    {
        $this->unloadStartDate = $unloadStartDate;

        return $this;
    }

    public function getUnloadStartTime(): ?string
    {
        return $this->unloadStartTime;
    }

    public function setUnloadStartTime(?string $unloadStartTime): static
    {
        $this->unloadStartTime = $unloadStartTime;

        return $this;
    }

    public function getUnloadEndDate(): ?\DateTimeInterface
    {
        return $this->unloadEndDate;
    }

    public function setUnloadEndDate(?\DateTimeInterface $unloadEndDate): static
    {
        $this->unloadEndDate = $unloadEndDate;

        return $this;
    }

    public function getUnloadEndTime(): ?string
    {
        return $this->unloadEndTime;
    }

    public function setUnloadEndTime(?string $unloadEndTime): static
    {
        $this->unloadEndTime = $unloadEndTime;

        return $this;
    }

    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    public function setDocumentType(?string $documentType): static
    {
        $this->documentType = $documentType;

        return $this;
    }




}
