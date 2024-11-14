<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmiss
 *
 * @ORM\Table(name="wmiss", indexes={@ORM\Index(name="idx$$_52290003", columns={"WHSE_CODE", "CUST_CODE", "COMPANY_CODE", "PHASE", "BRANCH_CODE", "ENTRY_DATE"}), @ORM\Index(name="idx$$_522c0001", columns={"ENTRY_DATE"}), @ORM\Index(name="idx$$_522c0003", columns={"WHSE_CODE", "CUST_CODE", "COMPANY_CODE", "PHASE", "BRANCH_CODE"}), @ORM\Index(name="idx$$_72780005", columns={"COMPANY_CODE", "CUST_CODE", "WHSE_CODE", "BRANCH_CODE", "ENTRY_DATE", "ENTRY_NUM"}), @ORM\Index(name="idx$$_b1d40001", columns={"CUST_CODE", "WHSE_CODE", "BRANCH_CODE", "COMPANY_CODE", "PHASE", "CONFIRM_DATE"})})
 * @ORM\Entity
 */
class Wmiss
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
     * @ORM\Column(name="ENTRY_DATE", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $entryDate = 'SYSDATE';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ETA_DATE", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $etaDate = 'SYSDATE';

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
     * @ORM\Column(name="DOC3", type="string", length=100, nullable=true)
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
     * @ORM\Column(name="ROUTE", type="string", length=20, nullable=true)
     */
    private $route;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ROUTE_NAME", type="string", length=20, nullable=true)
     */
    private $routeName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="INVOICE", type="string", length=20, nullable=true)
     */
    private $invoice;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="INVOICE_DATE", type="datetime", nullable=true)
     */
    private $invoiceDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALESMAN_CODE", type="string", length=20, nullable=true)
     */
    private $salesmanCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALESMAN_NAME", type="string", length=50, nullable=true)
     */
    private $salesmanName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PAYMENT_TERM", type="string", length=40, nullable=true)
     */
    private $paymentTerm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORDER_NUM", type="string", length=20, nullable=true)
     */
    private $orderNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SALES_ORDER_NUM", type="string", length=20, nullable=true)
     */
    private $salesOrderNum;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_CODE", type="string", length=20, nullable=true)
     */
    private $acctCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_NAME", type="string", length=200, nullable=true)
     */
    private $acctName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_ADD1", type="string", length=500, nullable=true)
     */
    private $acctAdd1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_ADD2", type="string", length=200, nullable=true)
     */
    private $acctAdd2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_ADD3", type="string", length=200, nullable=true)
     */
    private $acctAdd3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_ADD4", type="string", length=200, nullable=true)
     */
    private $acctAdd4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_POSTAL_CODE", type="string", length=20, nullable=true)
     */
    private $acctPostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_CITY", type="string", length=50, nullable=true)
     */
    private $acctCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_STATE", type="string", length=50, nullable=true)
     */
    private $acctState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_COUNTRY", type="string", length=20, nullable=true)
     */
    private $acctCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_TEL", type="string", length=50, nullable=true)
     */
    private $acctTel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_FAX", type="string", length=50, nullable=true)
     */
    private $acctFax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_CODE", type="string", length=20, nullable=true)
     */
    private $deliveryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIVERY_NAME", type="string", length=200, nullable=true)
     */
    private $deliveryName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_ADD1", type="string", length=500, nullable=true)
     */
    private $delivAdd1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_ADD2", type="string", length=200, nullable=true)
     */
    private $delivAdd2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_ADD3", type="string", length=200, nullable=true)
     */
    private $delivAdd3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_ADD4", type="string", length=200, nullable=true)
     */
    private $delivAdd4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_POSTAL_CODE", type="string", length=20, nullable=true)
     */
    private $delivPostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_CITY", type="string", length=50, nullable=true)
     */
    private $delivCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_STATE", type="string", length=50, nullable=true)
     */
    private $delivState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_COUNTRY", type="string", length=20, nullable=true)
     */
    private $delivCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_TEL", type="string", length=50, nullable=true)
     */
    private $delivTel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_FAX", type="string", length=50, nullable=true)
     */
    private $delivFax;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_INSTRUCTION", type="string", length=255, nullable=true)
     */
    private $delivInstruction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_REMARK", type="string", length=255, nullable=true)
     */
    private $delivRemark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REMARK", type="string", length=1000, nullable=true)
     */
    private $remark;

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
     * @ORM\Column(name="PRINT", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $print;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="PRINT_DATE", type="datetime", nullable=true)
     */
    private $printDate;

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
     */
    private $seqid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="datetime", nullable=true, options={"default"="sysdate"})
     */
    private $userCreatedDatetime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATE_DATETIME", type="datetime", nullable=true, options={"default"="sysdate"})
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="CUST_REC_DATE", type="datetime", nullable=true)
     */
    private $custRecDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DO_RET_DATE", type="datetime", nullable=true)
     */
    private $doRetDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SHELF_LIFE", type="string", length=5, nullable=true)
     */
    private $shelfLife;

    /**
     * @var string|null
     *
     * @ORM\Column(name="URGENT", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $urgent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC_TYPE", type="string", length=20, nullable=true)
     */
    private $docType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CRATE_RET", type="string", length=5, nullable=true)
     */
    private $crateRet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PALLET_RET", type="string", length=5, nullable=true)
     */
    private $palletRet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="POD_REMARK", type="string", length=100, nullable=true)
     */
    private $podRemark;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CRATE_OUT", type="string", length=5, nullable=true)
     */
    private $crateOut;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PALLET_OUT", type="string", length=5, nullable=true)
     */
    private $palletOut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SUBMIT_DATE", type="datetime", nullable=true)
     */
    private $submitDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_METHOD", type="string", length=1, nullable=true, options={"default"="M","fixed"=true})
     */
    private $ordMethod = 'M';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DELIV_DATE", type="datetime", nullable=true)
     */
    private $delivDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EXP_FILENAME", type="string", length=100, nullable=true)
     */
    private $expFilename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="POD_BY", type="string", length=20, nullable=true)
     */
    private $podBy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="POD_DATE", type="datetime", nullable=true)
     */
    private $podDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="INVOICE_AMT", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $invoiceAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISPUTE_AMT", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $disputeAmt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISPUTE_QTY", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $disputeQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GRN_NO", type="string", length=20, nullable=true)
     */
    private $grnNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LORRY_NO", type="string", length=20, nullable=true)
     */
    private $lorryNo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WDS_NO", type="string", length=20, nullable=true)
     */
    private $wdsNo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRANSIT_DATE", type="datetime", nullable=true)
     */
    private $transitDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRADE_RETURN_NO", type="string", length=50, nullable=true)
     */
    private $tradeReturnNo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="TRADE_RETURN_RECEIVED_DATE", type="datetime", nullable=true)
     */
    private $tradeReturnReceivedDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRADE_RETURN_REMARKS", type="string", length=50, nullable=true)
     */
    private $tradeReturnRemarks;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="REQUEST_DELIVERY_DATE", type="datetime", nullable=true)
     */
    private $requestDeliveryDate;


    /**
     * @var string|null
     *
     * @ORM\Column(name="DELIV_CONTACT", type="string", length=100, nullable=true)
     */
    private $delivContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACCT_CONTACT", type="string", length=100, nullable=true)
     */
    private $acctContact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PICK_INSTRUCTION", type="string", length=255, nullable=true)
     */
    private $pickInstruction;

   

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

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): static
    {
        $this->route = $route;

        return $this;
    }

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(?string $routeName): static
    {
        $this->routeName = $routeName;

        return $this;
    }

    public function getInvoice(): ?string
    {
        return $this->invoice;
    }

    public function setInvoice(?string $invoice): static
    {
        $this->invoice = $invoice;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTimeInterface $invoiceDate): static
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getSalesmanCode(): ?string
    {
        return $this->salesmanCode;
    }

    public function setSalesmanCode(?string $salesmanCode): static
    {
        $this->salesmanCode = $salesmanCode;

        return $this;
    }

    public function getSalesmanName(): ?string
    {
        return $this->salesmanName;
    }

    public function setSalesmanName(?string $salesmanName): static
    {
        $this->salesmanName = $salesmanName;

        return $this;
    }

    public function getPaymentTerm(): ?string
    {
        return $this->paymentTerm;
    }

    public function setPaymentTerm(?string $paymentTerm): static
    {
        $this->paymentTerm = $paymentTerm;

        return $this;
    }

    public function getOrderNum(): ?string
    {
        return $this->orderNum;
    }

    public function setOrderNum(?string $orderNum): static
    {
        $this->orderNum = $orderNum;

        return $this;
    }

    public function getSalesOrderNum(): ?string
    {
        return $this->salesOrderNum;
    }

    public function setSalesOrderNum(?string $salesOrderNum): static
    {
        $this->salesOrderNum = $salesOrderNum;

        return $this;
    }

    public function getAcctCode(): ?string
    {
        return $this->acctCode;
    }

    public function setAcctCode(?string $acctCode): static
    {
        $this->acctCode = $acctCode;

        return $this;
    }

    public function getAcctName(): ?string
    {
        return $this->acctName;
    }

    public function setAcctName(?string $acctName): static
    {
        $this->acctName = $acctName;

        return $this;
    }

    public function getAcctAdd1(): ?string
    {
        return $this->acctAdd1;
    }

    public function setAcctAdd1(?string $acctAdd1): static
    {
        $this->acctAdd1 = $acctAdd1;

        return $this;
    }

    public function getAcctAdd2(): ?string
    {
        return $this->acctAdd2;
    }

    public function setAcctAdd2(?string $acctAdd2): static
    {
        $this->acctAdd2 = $acctAdd2;

        return $this;
    }

    public function getAcctAdd3(): ?string
    {
        return $this->acctAdd3;
    }

    public function setAcctAdd3(?string $acctAdd3): static
    {
        $this->acctAdd3 = $acctAdd3;

        return $this;
    }

    public function getAcctAdd4(): ?string
    {
        return $this->acctAdd4;
    }

    public function setAcctAdd4(?string $acctAdd4): static
    {
        $this->acctAdd4 = $acctAdd4;

        return $this;
    }

    public function getAcctPostalCode(): ?string
    {
        return $this->acctPostalCode;
    }

    public function setAcctPostalCode(?string $acctPostalCode): static
    {
        $this->acctPostalCode = $acctPostalCode;

        return $this;
    }

    public function getAcctCity(): ?string
    {
        return $this->acctCity;
    }

    public function setAcctCity(?string $acctCity): static
    {
        $this->acctCity = $acctCity;

        return $this;
    }

    public function getAcctState(): ?string
    {
        return $this->acctState;
    }

    public function setAcctState(?string $acctState): static
    {
        $this->acctState = $acctState;

        return $this;
    }

    public function getAcctCountry(): ?string
    {
        return $this->acctCountry;
    }

    public function setAcctCountry(?string $acctCountry): static
    {
        $this->acctCountry = $acctCountry;

        return $this;
    }

    public function getAcctTel(): ?string
    {
        return $this->acctTel;
    }

    public function setAcctTel(?string $acctTel): static
    {
        $this->acctTel = $acctTel;

        return $this;
    }

    public function getAcctFax(): ?string
    {
        return $this->acctFax;
    }

    public function setAcctFax(?string $acctFax): static
    {
        $this->acctFax = $acctFax;

        return $this;
    }

    public function getDeliveryCode(): ?string
    {
        return $this->deliveryCode;
    }

    public function setDeliveryCode(?string $deliveryCode): static
    {
        $this->deliveryCode = $deliveryCode;

        return $this;
    }

    public function getDeliveryName(): ?string
    {
        return $this->deliveryName;
    }

    public function setDeliveryName(?string $deliveryName): static
    {
        $this->deliveryName = $deliveryName;

        return $this;
    }

    public function getDelivAdd1(): ?string
    {
        return $this->delivAdd1;
    }

    public function setDelivAdd1(?string $delivAdd1): static
    {
        $this->delivAdd1 = $delivAdd1;

        return $this;
    }

    public function getDelivAdd2(): ?string
    {
        return $this->delivAdd2;
    }

    public function setDelivAdd2(?string $delivAdd2): static
    {
        $this->delivAdd2 = $delivAdd2;

        return $this;
    }

    public function getDelivAdd3(): ?string
    {
        return $this->delivAdd3;
    }

    public function setDelivAdd3(?string $delivAdd3): static
    {
        $this->delivAdd3 = $delivAdd3;

        return $this;
    }

    public function getDelivAdd4(): ?string
    {
        return $this->delivAdd4;
    }

    public function setDelivAdd4(?string $delivAdd4): static
    {
        $this->delivAdd4 = $delivAdd4;

        return $this;
    }

    public function getDelivPostalCode(): ?string
    {
        return $this->delivPostalCode;
    }

    public function setDelivPostalCode(?string $delivPostalCode): static
    {
        $this->delivPostalCode = $delivPostalCode;

        return $this;
    }

    public function getDelivCity(): ?string
    {
        return $this->delivCity;
    }

    public function setDelivCity(?string $delivCity): static
    {
        $this->delivCity = $delivCity;

        return $this;
    }

    public function getDelivState(): ?string
    {
        return $this->delivState;
    }

    public function setDelivState(?string $delivState): static
    {
        $this->delivState = $delivState;

        return $this;
    }

    public function getDelivCountry(): ?string
    {
        return $this->delivCountry;
    }

    public function setDelivCountry(?string $delivCountry): static
    {
        $this->delivCountry = $delivCountry;

        return $this;
    }

    public function getDelivTel(): ?string
    {
        return $this->delivTel;
    }

    public function setDelivTel(?string $delivTel): static
    {
        $this->delivTel = $delivTel;

        return $this;
    }

    public function getDelivFax(): ?string
    {
        return $this->delivFax;
    }

    public function setDelivFax(?string $delivFax): static
    {
        $this->delivFax = $delivFax;

        return $this;
    }

    public function getDelivInstruction(): ?string
    {
        return $this->delivInstruction;
    }

    public function setDelivInstruction(?string $delivInstruction): static
    {
        $this->delivInstruction = $delivInstruction;

        return $this;
    }

    public function getDelivRemark(): ?string
    {
        return $this->delivRemark;
    }

    public function setDelivRemark(?string $delivRemark): static
    {
        $this->delivRemark = $delivRemark;

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

    public function getCustRecDate(): ?\DateTimeInterface
    {
        return $this->custRecDate;
    }

    public function setCustRecDate(?\DateTimeInterface $custRecDate): static
    {
        $this->custRecDate = $custRecDate;

        return $this;
    }

    public function getDoRetDate(): ?\DateTimeInterface
    {
        return $this->doRetDate;
    }

    public function setDoRetDate(?\DateTimeInterface $doRetDate): static
    {
        $this->doRetDate = $doRetDate;

        return $this;
    }

    public function getShelfLife(): ?string
    {
        return $this->shelfLife;
    }

    public function setShelfLife(?string $shelfLife): static
    {
        $this->shelfLife = $shelfLife;

        return $this;
    }

    public function getUrgent(): ?string
    {
        return $this->urgent;
    }

    public function setUrgent(?string $urgent): static
    {
        $this->urgent = $urgent;

        return $this;
    }

    public function getDocType(): ?string
    {
        return $this->docType;
    }

    public function setDocType(?string $docType): static
    {
        $this->docType = $docType;

        return $this;
    }

    public function getCrateRet(): ?string
    {
        return $this->crateRet;
    }

    public function setCrateRet(?string $crateRet): static
    {
        $this->crateRet = $crateRet;

        return $this;
    }

    public function getPalletRet(): ?string
    {
        return $this->palletRet;
    }

    public function setPalletRet(?string $palletRet): static
    {
        $this->palletRet = $palletRet;

        return $this;
    }

    public function getPodRemark(): ?string
    {
        return $this->podRemark;
    }

    public function setPodRemark(?string $podRemark): static
    {
        $this->podRemark = $podRemark;

        return $this;
    }

    public function getCrateOut(): ?string
    {
        return $this->crateOut;
    }

    public function setCrateOut(?string $crateOut): static
    {
        $this->crateOut = $crateOut;

        return $this;
    }

    public function getPalletOut(): ?string
    {
        return $this->palletOut;
    }

    public function setPalletOut(?string $palletOut): static
    {
        $this->palletOut = $palletOut;

        return $this;
    }

    public function getSubmitDate(): ?\DateTimeInterface
    {
        return $this->submitDate;
    }

    public function setSubmitDate(?\DateTimeInterface $submitDate): static
    {
        $this->submitDate = $submitDate;

        return $this;
    }

    public function getOrdMethod(): ?string
    {
        return $this->ordMethod;
    }

    public function setOrdMethod(?string $ordMethod): static
    {
        $this->ordMethod = $ordMethod;

        return $this;
    }

    public function getDelivDate(): ?\DateTimeInterface
    {
        return $this->delivDate;
    }

    public function setDelivDate(?\DateTimeInterface $delivDate): static
    {
        $this->delivDate = $delivDate;

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

    public function getPodBy(): ?string
    {
        return $this->podBy;
    }

    public function setPodBy(?string $podBy): static
    {
        $this->podBy = $podBy;

        return $this;
    }

    public function getPodDate(): ?\DateTimeInterface
    {
        return $this->podDate;
    }

    public function setPodDate(?\DateTimeInterface $podDate): static
    {
        $this->podDate = $podDate;

        return $this;
    }

    public function getInvoiceAmt(): ?string
    {
        return $this->invoiceAmt;
    }

    public function setInvoiceAmt(?string $invoiceAmt): static
    {
        $this->invoiceAmt = $invoiceAmt;

        return $this;
    }

    public function getDisputeAmt(): ?string
    {
        return $this->disputeAmt;
    }

    public function setDisputeAmt(?string $disputeAmt): static
    {
        $this->disputeAmt = $disputeAmt;

        return $this;
    }

    public function getDisputeQty(): ?string
    {
        return $this->disputeQty;
    }

    public function setDisputeQty(?string $disputeQty): static
    {
        $this->disputeQty = $disputeQty;

        return $this;
    }

    public function getGrnNo(): ?string
    {
        return $this->grnNo;
    }

    public function setGrnNo(?string $grnNo): static
    {
        $this->grnNo = $grnNo;

        return $this;
    }

    public function getLorryNo(): ?string
    {
        return $this->lorryNo;
    }

    public function setLorryNo(?string $lorryNo): static
    {
        $this->lorryNo = $lorryNo;

        return $this;
    }

    public function getWdsNo(): ?string
    {
        return $this->wdsNo;
    }

    public function setWdsNo(?string $wdsNo): static
    {
        $this->wdsNo = $wdsNo;

        return $this;
    }

    public function getTransitDate(): ?\DateTimeInterface
    {
        return $this->transitDate;
    }

    public function setTransitDate(?\DateTimeInterface $transitDate): static
    {
        $this->transitDate = $transitDate;

        return $this;
    }

    public function getTradeReturnNo(): ?string
    {
        return $this->tradeReturnNo;
    }

    public function setTradeReturnNo(?string $tradeReturnNo): static
    {
        $this->tradeReturnNo = $tradeReturnNo;

        return $this;
    }

    public function getTradeReturnReceivedDate(): ?\DateTimeInterface
    {
        return $this->tradeReturnReceivedDate;
    }

    public function setTradeReturnReceivedDate(?\DateTimeInterface $tradeReturnReceivedDate): static
    {
        $this->tradeReturnReceivedDate = $tradeReturnReceivedDate;

        return $this;
    }

    public function getTradeReturnRemarks(): ?string
    {
        return $this->tradeReturnRemarks;
    }

    public function setTradeReturnRemarks(?string $tradeReturnRemarks): static
    {
        $this->tradeReturnRemarks = $tradeReturnRemarks;

        return $this;
    }

    public function getRequestDeliveryDate(): ?\DateTimeInterface
    {
        return $this->requestDeliveryDate;
    }

    public function setRequestDeliveryDate(?\DateTimeInterface $requestDeliveryDate): static
    {
        $this->requestDeliveryDate = $requestDeliveryDate;

        return $this;
    }

   

    public function getDelivContact(): ?string
    {
        return $this->delivContact;
    }

    public function setDelivContact(?string $delivContact): static
    {
        $this->delivContact = $delivContact;

        return $this;
    }

    public function getAcctContact(): ?string
    {
        return $this->acctContact;
    }

    public function setAcctContact(?string $acctContact): static
    {
        $this->acctContact = $acctContact;

        return $this;
    }

    
    public function getDcdoRetrieve(): ?string
    {
        return $this->dcdoRetrieve;
    }

    public function setDcdoRetrieve(?string $dcdoRetrieve): static
    {
        $this->dcdoRetrieve = $dcdoRetrieve;

        return $this;
    }

    public function getPickInstruction(): ?string
    {
        return $this->pickInstruction;
    }

    public function setPickInstruction(?string $pickInstruction): static
    {
        $this->pickInstruction = $pickInstruction;

        return $this;
    }


    public function getDriverName(): ?string
    {
        return $this->driverName;
    }

    public function setDriverName(?string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }


}
