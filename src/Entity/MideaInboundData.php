<?php

namespace App\Entity;

use App\Repository\MideaInboundDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity(repositoryClass: MideaInboundDataRepository::class)]
class MideaInboundData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sender = null;

    #[ORM\Column(length: 255)]
    private ?string $receiver = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $transactionTimeZone = null;

    #[ORM\Column(length: 255)]
    private ?string $transactionType = null;

    #[ORM\Column(length: 255)]
    private ?string $documentId = null;

    #[ORM\Column]
    private ?int $orgId = null;

    #[ORM\Column(length: 255)]
    private ?string $organizationId = null;

    #[ORM\Column(length: 255)]
    private ?string $businessType = null;

    #[ORM\Column(length: 255)]
    private ?string $businessScenario = null;

    #[ORM\Column(length: 255)]
    private ?string $businessTimezone = null;

    #[ORM\Column(length: 255)]
    private ?string $shipmentIdentification = null;

    #[ORM\Column(length: 255)]
    private ?string $documentType = null;

    #[ORM\Column(length: 255)]
    private ?string $orderDate = null;

    #[ORM\Column(length: 255)]
    private ?string $etaPortDate = null;

    #[ORM\Column(length: 255)]
    private ?string $etaWHDate = null;

    #[ORM\Column(length: 255)]
    private ?string $documentNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $containerNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $replacementMode = null;

    #[ORM\Column(length: 255)]
    private ?string $OutboundOrderNo = null;

    #[ORM\Column(length: 255)]
    private ?string $remark = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute1 = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute2 = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute3 = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute4 = null;

    #[ORM\Column(length: 255)]
    private ?string $attribute5 = null;

    #[ORM\Column(length: 255)]
    private ?string $addressTypeCode = null;

    #[ORM\Column(length: 255)]
    private ?string $addressLocationNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $addressName = null;

    #[ORM\Column(length: 255)]
    private ?string $address1 = null;

    #[ORM\Column(length: 255)]
    private ?string $address2 = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 255)]
    private ?string $state = null;

    #[ORM\Column(length: 255)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $contactName = null;

    #[ORM\Column(length: 255)]
    private ?string $contactPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $lineNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $vendorPartNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $itemDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $orderQuantity = null;

    #[ORM\Column(length: 255)]
    private ?string $orderQtyUom = null;

    #[ORM\Column(length: 255)]
    private ?string $productBatchNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $articleNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $ean = null;

    #[ORM\Column(length: 255)]
    private ?string $fromWarehouseCode = null;

    #[ORM\Column(length: 255)]
    private ?string $toWarehouseCode = null;

    #[ORM\Column]
    private ?int $transactionId = null;

    #[ORM\Column(length: 255)]
    private ?string $upc = null;

    #[ORM\Column(length: 255)]
    private ?string $lineAttribute1 = null;

    #[ORM\Column(length: 255)]
    private ?string $lineAttribute2 = null;

    #[ORM\Column(length: 255)]
    private ?string $lineAttribute3 = null;

    #[ORM\Column(length: 255)]
    private ?string $lineAttribute4 = null;

    #[ORM\Column(length: 255)]
    private ?string $lineAttribute5 = null;
	
    #[ORM\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTime $userCreateDate;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $userDeleteDate;

    #[ORM\Column(type: "boolean", options: ["default" => false])]
    private ?bool $isAPI;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(?string $sender): static
    {
        $this->sender = $sender;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(?string $receiver): static
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?string $creationDate): static
    {
        $creationDate = new \DateTime($creationDate);
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getTransactionTimeZone(): ?string
    {
        return $this->transactionTimeZone;
    }

    public function setTransactionTimeZone(?string $transactionTimeZone): static
    {
        $this->transactionTimeZone = $transactionTimeZone;

        return $this;
    }

    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(?string $transactionType): static
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): static
    {
        $this->documentId = $documentId;

        return $this;
    }

    public function getOrgId(): ?int
    {
        return $this->orgId;
    }

    public function setOrgId(int $orgId): static
    {
        $this->orgId = $orgId;

        return $this;
    }

    public function getOrganizationId(): ?string
    {
        return $this->organizationId;
    }

    public function setOrganizationId(?string $organizationId): static
    {
        $this->organizationId = $organizationId;

        return $this;
    }

    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }

    public function setBusinessType(?string $businessType): static
    {
        $this->businessType = $businessType;

        return $this;
    }

    public function getBusinessScenario(): ?string
    {
        return $this->businessScenario;
    }

    public function setBusinessScenario(?string $businessScenario): static
    {
        $this->businessScenario = $businessScenario;

        return $this;
    }

    public function getBusinessTimezone(): ?string
    {
        return $this->businessTimezone;
    }

    public function setBusinessTimezone(?string $businessTimezone): static
    {
        $this->businessTimezone = $businessTimezone;

        return $this;
    }

    public function getShipmentIdentification(): ?string
    {
        return $this->shipmentIdentification;
    }

    public function setShipmentIdentification(?string $shipmentIdentification): static
    {
        $this->shipmentIdentification = $shipmentIdentification;

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

    public function getOrderDate(): ?string
    {
        return $this->orderDate;
    }

    public function setOrderDate(?string $orderDate): static
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getEtaPortDate(): ?string
    {
        return $this->etaPortDate;
    }

    public function setEtaPortDate(?string $etaPortDate): static
    {
        $this->etaPortDate = $etaPortDate;

        return $this;
    }

    public function getEtaWHDate(): ?string
    {
        return $this->etaWHDate;
    }

    public function setEtaWHDate(?string $etaWHDate): static
    {
        $this->etaWHDate = $etaWHDate;

        return $this;
    }

    public function getDocumentNumber(): ?string
    {
        return $this->documentNumber;
    }

    public function setDocumentNumber(?string $documentNumber): static
    {
        $this->documentNumber = $documentNumber;

        return $this;
    }

    public function getContainerNumber(): ?string
    {
        return $this->containerNumber;
    }

    public function setContainerNumber(?string $containerNumber): static
    {
        $this->containerNumber = $containerNumber;

        return $this;
    }

    public function getReplacementMode(): ?string
    {
        return $this->replacementMode;
    }

    public function setReplacementMode(?string $replacementMode): static
    {
        $this->replacementMode = $replacementMode;

        return $this;
    }

    public function getOutboundOrderNo(): ?string
    {
        return $this->OutboundOrderNo;
    }

    public function setOutboundOrderNo(?string $OutboundOrderNo): static
    {
        $this->OutboundOrderNo = $OutboundOrderNo;

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

    public function getAttribute1(): ?string
    {
        return $this->attribute1;
    }

    public function setAttribute1(?string $attribute1): static
    {
        $this->attribute1 = $attribute1;

        return $this;
    }

    public function getAttribute2(): ?string
    {
        return $this->attribute2;
    }

    public function setAttribute2(?string $attribute2): static
    {
        $this->attribute2 = $attribute2;

        return $this;
    }

    public function getAttribute3(): ?string
    {
        return $this->attribute3;
    }

    public function setAttribute3(?string $attribute3): static
    {
        $this->attribute3 = $attribute3;

        return $this;
    }

    public function getAttribute4(): ?string
    {
        return $this->attribute4;
    }

    public function setAttribute4(?string $attribute4): static
    {
        $this->attribute4 = $attribute4;

        return $this;
    }

    public function getAttribute5(): ?string
    {
        return $this->attribute5;
    }

    public function setAttribute5(?string $attribute5): static
    {
        $this->attribute5 = $attribute5;

        return $this;
    }

    public function getAddressTypeCode(): ?string
    {
        return $this->addressTypeCode;
    }

    public function setAddressTypeCode(?string $addressTypeCode): static
    {
        $this->addressTypeCode = $addressTypeCode;

        return $this;
    }

    public function getAddressLocationNumber(): ?string
    {
        return $this->addressLocationNumber;
    }

    public function setAddressLocationNumber(?string $addressLocationNumber): static
    {
        $this->addressLocationNumber = $addressLocationNumber;

        return $this;
    }

    public function getAddressName(): ?string
    {
        return $this->addressName;
    }

    public function setAddressName(?string $addressName): static
    {
        $this->addressName = $addressName;

        return $this;
    }

    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): static
    {
        $this->address1 = $address1;

        return $this;
    }

    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): static
    {
        $this->address2 = $address2;

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

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

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

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): static
    {
        $this->contactName = $contactName;

        return $this;
    }

    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    public function setContactPhone(?string $contactPhone): static
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    public function getLineNumber(): ?string
    {
        return $this->lineNumber;
    }

    public function setLineNumber(?string $lineNumber): static
    {
        $this->lineNumber = $lineNumber;

        return $this;
    }

    public function getVendorPartNumber(): ?string
    {
        return $this->vendorPartNumber;
    }

    public function setVendorPartNumber(?string $vendorPartNumber): static
    {
        $this->vendorPartNumber = $vendorPartNumber;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }

    public function setItemDescription(?string $itemDescription): static
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    public function getOrderQuantity(): ?string
    {
        return $this->orderQuantity;
    }

    public function setOrderQuantity(?string $orderQuantity): static
    {
        $this->orderQuantity = $orderQuantity;

        return $this;
    }

    public function getOrderQtyUom(): ?string
    {
        return $this->orderQtyUom;
    }

    public function setOrderQtyUom(?string $orderQtyUom): static
    {
        $this->orderQtyUom = $orderQtyUom;

        return $this;
    }

    public function getProductBatchNumber(): ?string
    {
        return $this->productBatchNumber;
    }

    public function setProductBatchNumber(?string $productBatchNumber): static
    {
        $this->productBatchNumber = $productBatchNumber;

        return $this;
    }

    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(?string $articleNumber): static
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(?string $ean): static
    {
        $this->ean = $ean;

        return $this;
    }

    public function getFromWarehouseCode(): ?string
    {
        return $this->fromWarehouseCode;
    }

    public function setFromWarehouseCode(?string $fromWarehouseCode): static
    {
        $this->fromWarehouseCode = $fromWarehouseCode;

        return $this;
    }

    public function getToWarehouseCode(): ?string
    {
        return $this->toWarehouseCode;
    }

    public function setToWarehouseCode(?string $toWarehouseCode): static
    {
        $this->toWarehouseCode = $toWarehouseCode;

        return $this;
    }

    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    public function setTransactionId(int $transactionId): static
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    public function getUpc(): ?string
    {
        return $this->upc;
    }

    public function setUpc(?string $upc): static
    {
        $this->upc = $upc;

        return $this;
    }


    public function getLineAttribute1(): ?string
    {
        return $this->lineAttribute1;
    }

    public function setLineAttribute1(?string $lineAttribute1): static
    {
        $this->lineAttribute1 = $lineAttribute1;

        return $this;
    }

    public function getLineAttribute2(): ?string
    {
        return $this->lineAttribute2;
    }

    public function setLineAttribute2(?string $lineAttribute2): static
    {
        $this->lineAttribute2 = $lineAttribute2;

        return $this;
    }

    public function getLineAttribute3(): ?string
    {
        return $this->lineAttribute3;
    }

    public function setLineAttribute3(?string $lineAttribute3): static
    {
        $this->lineAttribute3 = $lineAttribute3;

        return $this;
    }

    public function getLineAttribute4(): ?string
    {
        return $this->lineAttribute4;
    }

    public function setLineAttribute4(?string $lineAttribute4): static
    {
        $this->lineAttribute4 = $lineAttribute4;

        return $this;
    }
	
    public function getLineAttribute5(): ?string
    {
        return $this->lineAttribute5;
    }

    public function getUserCreateDate(): ?\DateTime
    {
        return $this->userCreateDate;
    }

    public function setUserCreateDate(\DateTime $userCreateDate): static
    {
        $this->userCreateDate = $userCreateDate;

        return $this;
    }

    public function getUserDeleteDate(): ?\DateTime
    {
        return $this->userDeleteDate;
    }

    public function setUserDeleteDate(\DateTime $userDeleteDate): static
    {
        $this->userDeleteDate = $userDeleteDate;

        return $this;
    }

    public function getIsAPI(): ?bool
    {
        return $this->isAPI;
    }

    public function setIsAPI(bool $isAPI): static
    {
        $this->isAPI = $isAPI;

        return $this;
    }

    public function fromArray(array $data): self
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            if (method_exists($this, $setter)) {
                if (is_array($value)) {
                    $this->fromArray($value); 
                } else {
                    $this->$setter($value);
                }
            }
        }

        return $this;
    }

    public function __construct()
    {
        $this->userCreateDate = new DateTime();
    }


}
