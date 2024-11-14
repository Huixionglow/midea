<?php

namespace App\Entity;

use App\Repository\MideaOutboundDataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use \DateTime;
use \DateTimeInterface;

#[ORM\Entity(repositoryClass: MideaOutboundDataRepository::class)]
class MideaOutboundData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $documentId;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $sender;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $receiver;

    #[ORM\Column(type: "datetime")]
    private ?\DateTime $creationDatetime;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $transactionTimezone;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $transactionType;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $businessUnitId;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $organizationID;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $businessType;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $businessScenario;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $businessTimezone;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $shipmentIdentification;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $shipmentDate;

    #[ORM\Column(type: "datetime", nullable: true)]
    private ?\DateTime $estimatedDeliveryDate;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $shipmentInfoStructure;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $orderNumber;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $podStatus;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $podInfo;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $carrierName;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $carrierTransMethodCode;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $carrierAlphaCode;

    #[ORM\Column(type: "integer")]
    private ?int $cartonQty;

    #[ORM\Column(type: "decimal", precision: 10, scale: 3)]
    private ?float $weight;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $weightUom;

    #[ORM\Column(type: "decimal", precision:10, scale:3, nullable: true)]
    private ?float $volume;

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $volumeUom;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $packingCode;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $billOfLading;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $equipmentNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $carrierProNumber;

    #[ORM\Column(type: "integer")]
    private ?int $palletQty;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $appointmentNumber;

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $paymentMethod;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $replacementMode;

    #[ORM\Column(type: "string", length: 100, nullable: true)]
    private ?string $inboundOrderNo;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $attribute1;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $attribute2;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $attribute3;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $attribute4;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $attribute5;

    // Additional fields for address and contact details
    #[ORM\Column(type: "string", length: 50)]
    private ?string $addressTypeCode;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $addressLocationNumber;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $addressName;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $address1;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $address2;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $address3;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $address4;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $city;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $state;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $postalCode;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $country;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $contactName;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $contactPhone;

    private ?int $lineNum;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $distributionOrder;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $logisticProductCode;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $vendorPartNumber;

    #[ORM\Column(type: "text")]
    private ?string $itemDescription;

    #[ORM\Column(type: "integer")]
    private ?int $shipQuantity;

    #[ORM\Column(type: "integer")]
    private ?int $rejectQty;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $shipQtyUOM;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $consignmentNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $logisticNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $productBatchNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $articleNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $eanNumber;

    #[ORM\Column(type: "string", length: 50)]
    private ?string $fromWarehouseCode;

    #[ORM\Column(type: "string", length: 50, nullable: true)]
    private ?string $toWarehouseCode;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $palletMarksNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $cartonMarksNumber;

    #[ORM\Column(type: "string", length: 100)]
    private ?string $cartonTrackingNumber;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $lineAttribute1;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $lineAttribute2;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $lineAttribute3;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $lineAttribute4;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $lineAttribute5;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $serialNumber;

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

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): self
    {
        $this->documentId = $documentId;
        return $this;
    }

    // Sender
    public function getSender(): ?string
    {
        return $this->sender;
    }

    public function setSender(?string $sender): self
    {
        $this->sender = $sender;
        return $this;
    }

    // Receiver
    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(?string $receiver): self
    {
        $this->receiver = $receiver;
        return $this;
    }

    // Creation Datetime
    public function getCreationDatetime(): ?\DateTime
    {
        return $this->creationDatetime;
    }

        public function setCreationDatetime(?string $creationDatetime): self
        {
            $creationDatetime = new DateTime($creationDatetime);    
            $this->creationDatetime = $creationDatetime;
            return $this;
        }

    // Transaction Timezone
    public function getTransactionTimezone(): ?string
    {
        return $this->transactionTimezone;
    }

    public function setTransactionTimezone(?string $transactionTimezone): self
    {
        $this->transactionTimezone = $transactionTimezone;
        return $this;
    }

    // Transaction Type
    public function getTransactionType(): ?string
    {
        return $this->transactionType;
    }

    public function setTransactionType(?string $transactionType): self
    {
        $this->transactionType = $transactionType;
        return $this;
    }

    // Business Unit ID
    public function getBusinessUnitId(): ?string
    {
        return $this->businessUnitId;
    }

    public function setBusinessUnitId(?string $businessUnitId): self
    {
        $this->businessUnitId = $businessUnitId;
        return $this;
    }

    // Organization ID
    public function getOrganizationID(): ?string
    {
        return $this->organizationID;
    }

    public function setOrganizationID(?string $organizationID): self
    {
        $this->organizationID = $organizationID;
        return $this;
    }

    // Business Type
    public function getBusinessType(): ?string
    {
        return $this->businessType;
    }

    public function setBusinessType(?string $businessType): self
    {
        $this->businessType = $businessType;
        return $this;
    }

    // Business Scenario
    public function getBusinessScenario(): ?string
    {
        return $this->businessScenario;
    }

    public function setBusinessScenario(?string $businessScenario): self
    {
        $this->businessScenario = $businessScenario;
        return $this;
    }

    // Business Timezone
    public function getBusinessTimezone(): ?string
    {
        return $this->businessTimezone;
    }

    public function setBusinessTimezone(?string $businessTimezone): self
    {
        $this->businessTimezone = $businessTimezone;
        return $this;
    }

    // Shipment Identification
    public function getShipmentIdentification(): ?string
    {
        return $this->shipmentIdentification;
    }

    public function setShipmentIdentification(?string $shipmentIdentification): self
    {
        $this->shipmentIdentification = $shipmentIdentification;
        return $this;
    }

    // Shipment Date
    public function getShipmentDate(): ?\DateTime
    {
        return $this->shipmentDate;
    }

    public function setShipmentDate(?string $shipmentDate): self
    {
        $shipmentDate = new DateTime($shipmentDate);
        $this->shipmentDate = $shipmentDate;
        return $this;
    }


    // Estimated Delivery Date
    public function getEstimatedDeliveryDate(): ?\DateTime
    {
        return $this->estimatedDeliveryDate;
    }

    public function setEstimatedDeliveryDate(?\DateTime $estimatedDeliveryDate): self
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
        return $this;
    }

    // Shipment Info Structure
    public function getShipmentInfoStructure(): ?string
    {
        return $this->shipmentInfoStructure;
    }

    public function setShipmentInfoStructure(?string $shipmentInfoStructure): self
    {
        $this->shipmentInfoStructure = $shipmentInfoStructure;
        return $this;
    }

    // Order Number
    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    // Pod Status
    public function getPodStatus(): ?string
    {
        return $this->podStatus;
    }

    public function setPodStatus(?string $podStatus): self
    {
        $this->podStatus = $podStatus;
        return $this;
    }

    // Pod Info
    public function getPodInfo(): ?string
    {
        return $this->podInfo;
    }

    public function setPodInfo(?string $podInfo): self
    {
        $this->podInfo = $podInfo;
        return $this;
    }

    // Carrier Name
    public function getCarrierName(): ?string
    {
        return $this->carrierName;
    }

    public function setCarrierName(?string $carrierName): self
    {
        $this->carrierName = $carrierName;
        return $this;
    }

    // Carrier Trans Method Code
    public function getCarrierTransMethodCode(): ?string
    {
        return $this->carrierTransMethodCode;
    }

    public function setCarrierTransMethodCode(?string $carrierTransMethodCode): self
    {
        $this->carrierTransMethodCode = $carrierTransMethodCode;
        return $this;
    }

    // Carrier Alpha Code
    public function getCarrierAlphaCode(): ?string
    {
        return $this->carrierAlphaCode;
    }

    public function setCarrierAlphaCode(?string $carrierAlphaCode): self
    {
        $this->carrierAlphaCode = $carrierAlphaCode;
        return $this;
    }

    // Carton Qty
    public function getCartonQty(): ?int
    {
        return $this->cartonQty;
    }

    public function setCartonQty(int $cartonQty): self
    {
        $this->cartonQty = $cartonQty;
        return $this;
    }

    // Weight
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    // Weight UOM
    public function getWeightUom(): ?string
    {
        return $this->weightUom;
    }

    public function setWeightUom(?string $weightUom): self
    {
        $this->weightUom = $weightUom;
        return $this;
    }

    // Volume
    public function getVolume(): ?float
    {
        return $this->volume;
    }

    public function setVolume(?float $volume): self
    {
        $this->volume = $volume;
        return $this;
    }

    // Volume UOM
    public function getVolumeUom(): ?string
    {
        return $this->volumeUom;
    }

    public function setVolumeUom(?string $volumeUom): self
    {
        $this->volumeUom = $volumeUom;
        return $this;
    }

    // Packing Code
    public function getPackingCode(): ?string
    {
        return $this->packingCode;
    }

    public function setPackingCode(?string $packingCode): self
    {
        $this->packingCode = $packingCode;
        return $this;
    }

    // Bill Of Lading
    public function getBillOfLading(): ?string
    {
        return $this->billOfLading;
    }

    public function setBillOfLading(?string $billOfLading): self
    {
        $this->billOfLading = $billOfLading;
        return $this;
    }

    // Equipment Number
    public function getEquipmentNumber(): ?string
    {
        return $this->equipmentNumber;
    }

    public function setEquipmentNumber(?string $equipmentNumber): self
    {
        $this->equipmentNumber = $equipmentNumber;
        return $this;
    }

    // Carrier Pro Number
    public function getCarrierProNumber(): ?string
    {
        return $this->carrierProNumber;
    }

    public function setCarrierProNumber(?string $carrierProNumber): self
    {
        $this->carrierProNumber = $carrierProNumber;
        return $this;
    }

    // Pallet Qty
    public function getPalletQty(): ?int
    {
        return $this->palletQty;
    }

    public function setPalletQty(int $palletQty): self
    {
        $this->palletQty = $palletQty;
        return $this;
    }

    // Appointment Number
    public function getAppointmentNumber(): ?string
    {
        return $this->appointmentNumber;
    }

    public function setAppointmentNumber(?string $appointmentNumber): self
    {
        $this->appointmentNumber = $appointmentNumber;
        return $this;
    }

    // Payment Method
    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    // Replacement Mode
    public function getReplacementMode(): ?string
    {
        return $this->replacementMode;
    }

    public function setReplacementMode(?string $replacementMode): self
    {
        $this->replacementMode = $replacementMode;
        return $this;
    }

    // Inbound Order No
    public function getInboundOrderNo(): ?string
    {
        return $this->inboundOrderNo;
    }

    public function setInboundOrderNo(?string $inboundOrderNo): self
    {
        $this->inboundOrderNo = $inboundOrderNo;
        return $this;
    }

    // Attribute1
    public function getAttribute1(): ?string
    {
        return $this->attribute1;
    }

    public function setAttribute1(?string $attribute1): self
    {
        $this->attribute1 = $attribute1;
        return $this;
    }

    // Attribute2
    public function getAttribute2(): ?string
    {
        return $this->attribute2;
    }

    public function setAttribute2(?string $attribute2): self
    {
        $this->attribute2 = $attribute2;
        return $this;
    }

    // Attribute3
    public function getAttribute3(): ?string
    {
        return $this->attribute3;
    }

    public function setAttribute3(?string $attribute3): self
    {
        $this->attribute3 = $attribute3;
        return $this;
    }

    // Attribute4
    public function getAttribute4(): ?string
    {
        return $this->attribute4;
    }

    public function setAttribute4(?string $attribute4): self
    {
        $this->attribute4 = $attribute4;
        return $this;
    }

    // Attribute5
    public function getAttribute5(): ?string
    {
        return $this->attribute5;
    }

    public function setAttribute5(?string $attribute5): self
    {
        $this->attribute5 = $attribute5;
        return $this;
    }

    // Address Type Code
    public function getAddressTypeCode(): ?string
    {
        return $this->addressTypeCode;
    }

    public function setAddressTypeCode(?string $addressTypeCode): self
    {
        $this->addressTypeCode = $addressTypeCode;
        return $this;
    }

    // Address Location Number
    public function getAddressLocationNumber(): ?string
    {
        return $this->addressLocationNumber;
    }

    public function setAddressLocationNumber(?string $addressLocationNumber): self
    {
        $this->addressLocationNumber = $addressLocationNumber;
        return $this;
    }

    // Address Name
    public function getAddressName(): ?string
    {
        return $this->addressName;
    }

    public function setAddressName(?string $addressName): self
    {
        $this->addressName = $addressName;
        return $this;
    }

    // Address1
    public function getAddress1(): ?string
    {
        return $this->address1;
    }

    public function setAddress1(?string $address1): self
    {
        $this->address1 = $address1;
        return $this;
    }

    // Address2
    public function getAddress2(): ?string
    {
        return $this->address2;
    }

    public function setAddress2(?string $address2): self
    {
        $this->address2 = $address2;
        return $this;
    }

    // Address3
    public function getAddress3(): ?string
    {
        return $this->address3;
    }

    public function setAddress3(?string $address3): self
    {
        $this->address3 = $address3;
        return $this;
    }

    // Address4
    public function getAddress4(): ?string
    {
        return $this->address4;
    }

    public function setAddress4(?string $address4): self
    {
        $this->address4 = $address4;
        return $this;
    }

    // City
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;
        return $this;
    }

    // State
    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;
        return $this;
    }

    // Postal Code
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;
        return $this;
    }

    // Country
    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;
        return $this;
    }

    // Contact Name
    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): self
    {
        $this->contactName = $contactName;
        return $this;
    }

    // Contact Phone
    public function getContactPhone(): ?string
    {
        return $this->contactPhone;
    }

    public function setContactPhone(?string $contactPhone): self
    {
        $this->contactPhone = $contactPhone;
        return $this;
    }

    // Line Num
    public function getLineNum(): ?int
    {
        return $this->lineNum;
    }

    public function setLineNum(int $lineNum): self
    {
        $this->lineNum = $lineNum;
        return $this;
    }

    // Distribution Order
    public function getDistributionOrder(): ?string
    {
        return $this->distributionOrder;
    }

    public function setDistributionOrder(?string $distributionOrder): self
    {
        $this->distributionOrder = $distributionOrder;
        return $this;
    }

    // Logistic Product Code
    public function getLogisticProductCode(): ?string
    {
        return $this->logisticProductCode;
    }

    public function setLogisticProductCode(?string $logisticProductCode): self
    {
        $this->logisticProductCode = $logisticProductCode;
        return $this;
    }

    // Vendor Part Number
    public function getVendorPartNumber(): ?string
    {
        return $this->vendorPartNumber;
    }

    public function setVendorPartNumber(?string $vendorPartNumber): self
    {
        $this->vendorPartNumber = $vendorPartNumber;
        return $this;
    }

    // Item Description
    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }

    public function setItemDescription(?string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;
        return $this;
    }

    // Ship Quantity
    public function getShipQuantity(): ?int
    {
        return $this->shipQuantity;
    }

    public function setShipQuantity(int $shipQuantity): self
    {
        $this->shipQuantity = $shipQuantity;
        return $this;
    }

    // Reject Qty
    public function getRejectQty(): ?int
    {
        return $this->rejectQty;
    }

    public function setRejectQty(int $rejectQty): self
    {
        $this->rejectQty = $rejectQty;
        return $this;
    }

    // Ship Qty UOM
    public function getShipQtyUOM(): ?string
    {
        return $this->shipQtyUOM;
    }

    public function setShipQtyUOM(?string $shipQtyUOM): self
    {
        $this->shipQtyUOM = $shipQtyUOM;
        return $this;
    }

    // Consignment Number
    public function getConsignmentNumber(): ?string
    {
        return $this->consignmentNumber;
    }

    public function setConsignmentNumber(?string $consignmentNumber): self
    {
        $this->consignmentNumber = $consignmentNumber;
        return $this;
    }

    // Logistic Number
    public function getLogisticNumber(): ?string
    {
        return $this->logisticNumber;
    }

    public function setLogisticNumber(?string $logisticNumber): self
    {
        $this->logisticNumber = $logisticNumber;
        return $this;
    }

    // Product Batch Number
    public function getProductBatchNumber(): ?string
    {
        return $this->productBatchNumber;
    }

    public function setProductBatchNumber(?string $productBatchNumber): self
    {
        $this->productBatchNumber = $productBatchNumber;
        return $this;
    }

    // Article Number
    public function getArticleNumber(): ?string
    {
        return $this->articleNumber;
    }

    public function setArticleNumber(?string $articleNumber): self
    {
        $this->articleNumber = $articleNumber;
        return $this;
    }

    // EAN Number
    public function getEanNumber(): ?string
    {
        return $this->eanNumber;
    }

    public function setEanNumber(?string $eanNumber): self
    {
        $this->eanNumber = $eanNumber;
        return $this;
    }

    // From Warehouse Code
    public function getFromWarehouseCode(): ?string
    {
        return $this->fromWarehouseCode;
    }

    public function setFromWarehouseCode(?string $fromWarehouseCode): self
    {
        $this->fromWarehouseCode = $fromWarehouseCode;
        return $this;
    }

    // To Warehouse Code
    public function getToWarehouseCode(): ?string
    {
        return $this->toWarehouseCode;
    }

    public function setToWarehouseCode(?string $toWarehouseCode): self
    {
        $this->toWarehouseCode = $toWarehouseCode;
        return $this;
    }

    // Pallet Marks Number
    public function getPalletMarksNumber(): ?string
    {
        return $this->palletMarksNumber;
    }

    public function setPalletMarksNumber(?string $palletMarksNumber): self
    {
        $this->palletMarksNumber = $palletMarksNumber;
        return $this;
    }

    // Carton Marks Number
    public function getCartonMarksNumber(): ?string
    {
        return $this->cartonMarksNumber;
    }

    public function setCartonMarksNumber(?string $cartonMarksNumber): self
    {
        $this->cartonMarksNumber = $cartonMarksNumber;
        return $this;
    }

    // Carton Tracking Number
    public function getCartonTrackingNumber(): ?string
    {
        return $this->cartonTrackingNumber;
    }

    public function setCartonTrackingNumber(?string $cartonTrackingNumber): self
    {
        $this->cartonTrackingNumber = $cartonTrackingNumber;
        return $this;
    }

    // Line Attribute 1
    public function getLineAttribute1(): ?string
    {
        return $this->lineAttribute1;
    }

    public function setLineAttribute1(?string $lineAttribute1): self
    {
        $this->lineAttribute1 = $lineAttribute1;
        return $this;
    }

    // Line Attribute 2
    public function getLineAttribute2(): ?string
    {
        return $this->lineAttribute2;
    }

    public function setLineAttribute2(?string $lineAttribute2): self
    {
        $this->lineAttribute2 = $lineAttribute2;
        return $this;
    }

    // Line Attribute 3
    public function getLineAttribute3(): ?string
    {
        return $this->lineAttribute3;
    }

    public function setLineAttribute3(?string $lineAttribute3): self
    {
        $this->lineAttribute3 = $lineAttribute3;
        return $this;
    }

    // Line Attribute 4
    public function getLineAttribute4(): ?string
    {
        return $this->lineAttribute4;
    }

    public function setLineAttribute4(?string $lineAttribute4): self
    {
        $this->lineAttribute4 = $lineAttribute4;
        return $this;
    }

    // Line Attribute 5
    public function getLineAttribute5(): ?string
    {
        return $this->lineAttribute5;
    }

    public function setLineAttribute5(?string $lineAttribute5): self
    {
        $this->lineAttribute5 = $lineAttribute5;
        return $this;
    }

    // Serial Number
    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(?string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    public function getUserCreateDate(): ?\DateTime
    {
        return $this->userCreateDate;
    }

    public function setUserCreateDate(?string $userCreateDate): self
    {
        $userCreateDate = new DateTime($userCreateDate);
        $this->userCreateDate = $userCreateDate;
        return $this;
    }

    public function getUserDeleteDate(): ?\DateTime
    {
        return $this->userDeleteDate;
    }

    public function setUserDeleteDate(?\DateTime $userDeleteDate): self
    {
        $this->userDeleteDate = $userDeleteDate;
        return $this;
    }

    public function getIsAPI(): ?bool
    {
        return $this->isAPI;
    }

    public function setIsAPI(bool $isAPI): self
    {
        $this->isAPI = $isAPI;
        return $this;
    }

    public function __construct()
    {
        $this->userCreateDate = new DateTime();
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


}
