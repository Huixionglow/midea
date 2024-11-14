<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wmprofile
 *
 * @ORM\Table(name="wmprofile")
 * @ORM\Entity
 */
class Wmprofile
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
     * @ORM\Column(name="CUST_CODE", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $custCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_ALLOW_CANCEL", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $genAllowCancel = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_BARCODE", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $genBarcode = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_BARCODE_TYPE", type="string", length=1, nullable=true)
     */
    private $genBarcodeType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_CROSSDOCK", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $genCrossdock = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_UPD_METHOD", type="string", length=1, nullable=true)
     */
    private $genUpdMethod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_WHSE_TYPE", type="string", length=1, nullable=true)
     */
    private $genWhseType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="GEN_WITH_LOC", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $genWithLoc = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_ACKNOWLEDGE", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issAcknowledge = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCH_NO", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issBatchNo = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC1", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issDoc1 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC1_LABEL", type="string", length=20, nullable=true)
     */
    private $issDoc1Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC2", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issDoc2 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC2_LABEL", type="string", length=20, nullable=true)
     */
    private $issDoc2Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC3", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issDoc3 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC3_LABEL", type="string", length=20, nullable=true)
     */
    private $issDoc3Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC4", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issDoc4 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC4_LABEL", type="string", length=20, nullable=true)
     */
    private $issDoc4Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPIRY_DATE", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issExpiryDate = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY1", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issKey1 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY1_LABEL", type="string", length=20, nullable=true)
     */
    private $issKey1Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY2", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issKey2 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY2_LABEL", type="string", length=20, nullable=true)
     */
    private $issKey2Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY_SEQ", type="string", length=100, nullable=true)
     */
    private $issKeySeq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_METHOD", type="string", length=4, nullable=true)
     */
    private $issMethod;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_PARTIAL", type="string", length=1, nullable=true)
     */
    private $issPartial;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_SERIAL", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issSerial = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_CURRENCY", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodCurrency = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_FIX_LOC", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodFixLoc = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_GROUP_FIELD", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodGroupField = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_PICK_FACE", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodPickFace = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_PLANT", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodPlant = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_SERIAL", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodSerial = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PROD_SUBGROUP", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $prodSubgroup = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_AUTO_PUTAWAY", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recAutoPutaway = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC1", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recDoc1 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC1_LABEL", type="string", length=20, nullable=true)
     */
    private $recDoc1Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC2", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recDoc2 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC2_LABEL", type="string", length=20, nullable=true)
     */
    private $recDoc2Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC3", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recDoc3 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC3_LABEL", type="string", length=20, nullable=true)
     */
    private $recDoc3Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC4", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recDoc4 = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC4_LABEL", type="string", length=20, nullable=true)
     */
    private $recDoc4Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_SERIAL", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $recSerial = '(\'N\')';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_CREATED_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userCreatedDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_CREATED_ID", type="string", length=20, nullable=true)
     */
    private $userCreatedId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="USER_UPDATED_DATETIME", type="datetime", nullable=true, options={"default"="SYSDATE"})
     */
    private $userUpdatedDatetime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="USER_UPDATED_ID", type="string", length=20, nullable=true)
     */
    private $userUpdatedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BYPASS_ORDER_AND_PICKING", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issBypassOrderAndPicking = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CHECK_GRADE_QTY_ON_HAND", type="string", length=1, nullable=true, options={"default"="('N')"})
     */
    private $issCheckGradeQtyOnHand = '(\'N\')';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DEFAULT_MOVETYPE", type="string", length=100, nullable=true)
     */
    private $recDefaultMovetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DEFAULT_GRADE", type="string", length=100, nullable=true)
     */
    private $recDefaultGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DEFAULT_MOVETYPE", type="string", length=100, nullable=true)
     */
    private $issDefaultMovetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DEFAULT_GRADE", type="string", length=100, nullable=true)
     */
    private $issDefaultGrade;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BYPASS_KEYSEQ_IN_ORDER", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issBypassKeyseqInOrder = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EDIT_ENTRY_DATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issEditEntryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_EDIT_ENTRY_DATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recEditEntryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_KEY2_AUTO_REC_DATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recKey2AutoRecDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_KEY1_AUTO_PRI_KEY", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recKey1AutoPriKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_ACC_TO", type="string", length=2, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAccTo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DELIVERY_TO", type="string", length=2, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDeliveryTo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_SUPPLIER", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recSupplier = 'N';

    /**
     * @var int|null
     *
     * @ORM\Column(name="PROD_DECIMAL_PLACE", type="integer", nullable=true)
     */
    private $prodDecimalPlace = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPIRY_DATE_LABEL", type="string", length=20, nullable=true)
     */
    private $issExpiryDateLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCH_NO_LABEL", type="string", length=20, nullable=true)
     */
    private $issBatchNoLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_CUST_PO_LABEL", type="string", length=20, nullable=true)
     */
    private $recCustPoLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CUST_PO_LABEL", type="string", length=20, nullable=true)
     */
    private $issCustPoLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_EXPORT_EDI_DIRECT_FTP", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recExportEdiDirectFtp = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPORT_EDI_DIRECT_FTP", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issExportEdiDirectFtp = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_IMPORT_EDI_PARTIAL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recImportEdiPartial = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_EDI_PARTIAL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issImportEdiPartial = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BYPASS_ISSUE_PROCESS", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issBypassIssueProcess;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CUST_PO_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issCustPoDuplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_CUST_PO_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recCustPoDuplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC4_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recDoc4Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC3_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recDoc3Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC2_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recDoc2Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC1_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $recDoc1Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC4_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issDoc4Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC3_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issDoc3Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC2_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issDoc2Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC1_DUPLICATE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issDoc1Duplicate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC1_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $recDoc1IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC2_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $recDoc2IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC3_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $recDoc3IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC4_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $recDoc4IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC1_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $issDoc1IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC2_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $issDoc2IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC3_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $issDoc3IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC4_IS_INT", type="string", length=1, nullable=true, options={"default"="N"})
     */
    private $issDoc4IsInt = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_SHELF_LIFE_PROCESS", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issShelfLifeProcess = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PRODUCT_MASTER_DETAIL", type="string", length=100, nullable=true)
     */
    private $rptProductMasterDetail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DETAIL_TRANSACTION", type="string", length=100, nullable=true)
     */
    private $rptDetailTransaction;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_RECEIPT_DETAIL_LISTING", type="string", length=100, nullable=true)
     */
    private $rptReceiptDetailListing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DELIVERY_DETAIL_LISTING", type="string", length=100, nullable=true)
     */
    private $rptDeliveryDetailListing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_RECEIPT_NOTE", type="string", length=100, nullable=true)
     */
    private $rptReceiptNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_NOTE", type="string", length=100, nullable=true)
     */
    private $rptOrderNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PICKING_NOTE", type="string", length=100, nullable=true)
     */
    private $rptPickingNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISSUE_NOTE", type="string", length=100, nullable=true)
     */
    private $rptIssueNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISS_PICKING_NOTE", type="string", length=100, nullable=true)
     */
    private $rptIssPickingNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY1_IS_DISABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey1IsDisable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY2_IS_DISABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey2IsDisable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCH_NUM_IS_DISABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issBatchNumIsDisable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPIRY_DATE_IS_DISABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issExpiryDateIsDisable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PRODUCT_MASTER_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptProductMasterExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DETAIL_TRANSACTION_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptDetailTransactionExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_RECEIPT_DETAIL_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptReceiptDetailExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DELIVERY_DETAIL_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptDeliveryDetailExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_PRODUCT", type="string", length=100, nullable=true)
     */
    private $rptScProduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_PRODUCT_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptScProductExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOCATION_LANDSCAPE", type="string", length=100, nullable=true)
     */
    private $rptScLocationLandscape;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOCATION_PORTRAIT", type="string", length=100, nullable=true)
     */
    private $rptScLocationPortrait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOCATION_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptScLocationExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_TRANSFERLOC_NOTE", type="string", length=100, nullable=true)
     */
    private $rptTransferlocNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ADJUSTMENT_NOTE", type="string", length=100, nullable=true)
     */
    private $rptAdjustmentNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCH_NUM_IS_UNIQUE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issBatchNumIsUnique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY1_IS_UNIQUE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issKey1IsUnique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY2_IS_UNIQUE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issKey2IsUnique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPIRY_DATE_IS_UNIQUE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issExpiryDateIsUnique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_PUTAWAY_QUICK_ASSIGN", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recPutawayQuickAssign = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_VALIDATE_EXPIRY_DATE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recValidateExpiryDate = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPORT_FILE_METHOD", type="string", length=1, nullable=true, options={"default"="S","fixed"=true})
     */
    private $issExportFileMethod = 'S';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_EXPORT_FILE_METHOD", type="string", length=1, nullable=true, options={"default"="S","fixed"=true})
     */
    private $recExportFileMethod = 'S';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_IMPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $recImportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_EXPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $recExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $issImportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $issExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_MANUAL_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recManualExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MANUAL_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issManualExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_AUTO_IMPORT_ORDER_PARTIAL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAutoImportOrderPartial = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_ROUTE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issRoute = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_EXPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $ordExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_EXPORT_EDI_DIRECT_FTP", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordExportEdiDirectFtp = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_EXPORT_FILE_METHOD", type="string", length=1, nullable=true, options={"default"="S","fixed"=true})
     */
    private $ordExportFileMethod = 'S';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_MANUAL_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordManualExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_RECEIPT_EXPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $recReceiptExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_RECEIPT_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recReceiptExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_RECEIPT_MANUAL_EXPORT_EDI", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recReceiptManualExportEdi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_PICK_LOC_MODEL", type="string", length=50, nullable=true)
     */
    private $issPickLocModel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_VALIDATE_PO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recValidatePo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_REC_NOT_ALLOW_MANUAL_A_D", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $impRecNotAllowManualAD = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_NOT_ALLOW_MANUAL_ADDDEL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordNotAllowManualAdddel = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_ALLOW_ZERO_QTY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recAllowZeroQty = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="WMSTK_WITH_MAX_MIN_UOM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $wmstkWithMaxMinUom = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEF_REC_NOT_ALLOW_MANUAL_A_D", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $defRecNotAllowManualAD = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="WMSTK_MAX_UOM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $wmstkMaxUom = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_DETAIL_LISTING", type="string", length=100, nullable=true)
     */
    private $rptOrderDetailListing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_DETAIL_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptOrderDetailExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALIDATE_TRANSPORT", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $validateTransport = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_REC_NOT_ALLOW_EXCEED_QTY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $impRecNotAllowExceedQty = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CUSTOMFORM2_LABEL", type="string", length=20, nullable=true)
     */
    private $issCustomform2Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CUSTOMFORM1_LABEL", type="string", length=20, nullable=true)
     */
    private $issCustomform1Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_CUSTOMFORM2_LABEL", type="string", length=20, nullable=true)
     */
    private $recCustomform2Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_CUSTOMFORM1_LABEL", type="string", length=20, nullable=true)
     */
    private $recCustomform1Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOT_ALLOW_TRANSFER_GRADE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $notAllowTransferGrade = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY2", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey2 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY1", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey1 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_EXPIRY_DATE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastExpiryDate = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_BATCH_NO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastBatchNo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISSUE_DO", type="string", length=100, nullable=true)
     */
    private $rptIssueDo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONVERT_TO_UOM", type="string", length=20, nullable=true)
     */
    private $convertToUom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_ONLY_BATCH_PARTIAL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issImportOnlyBatchPartial = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_POD_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptPodExcel;

    /**
     * @var string
     *
     * @ORM\Column(name="ISS_PRIMARY_DOC", type="string", length=50, nullable=false, options={"default"="DOC1"})
     */
    private $issPrimaryDoc = 'DOC1';

    /**
     * @var string
     *
     * @ORM\Column(name="REC_PRIMARY_DOC", type="string", length=50, nullable=false, options={"default"="CUST_PO"})
     */
    private $recPrimaryDoc = 'CUST_PO';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_VALIDATE_PO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issValidatePo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_LISTING", type="string", length=100, nullable=true)
     */
    private $rptOrderListing;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptOrderExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DSN_EXP_RRETURN_TNDO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDsnExpRreturnTndo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DSN_EXP_LOADING_ONLY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDsnExpLoadingOnly = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DSN_EXP_TN_DO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDsnExpTnDo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DSN_AS_FILENAME", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDsnAsFilename = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DSN_EXPORT_DO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDsnExportDo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MANUAL_MODE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $manualMode = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="INVENTORY_LOCATION_CHK_KEY", type="string", length=100, nullable=true)
     */
    private $inventoryLocationChkKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="INVENTORY_PALLETID_CHK_KEY", type="string", length=100, nullable=true)
     */
    private $inventoryPalletidChkKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SCANNING_MODE", type="string", length=1, nullable=true, options={"default"="B","fixed"=true})
     */
    private $scanningMode = 'B';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MULTIPLE_PALLET_PER_LOC", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $multiplePalletPerLoc = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="VALIDATE_SUPP_VS_ITEM_PLANT", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $validateSuppVsItemPlant = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SUPPLIERCODE_AUTO_KEY1", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $suppliercodeAutoKey1 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MANUAL_CHANGE_SCANNING_MODE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $manualChangeScanningMode = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY3", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey3 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY4", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey4 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY3", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey3 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY4", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey4 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY3_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey3Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY4_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey4Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_PARTIAL_KEYSEQ_IN_ORDER", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issPartialKeyseqInOrder = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_ALLOW_DRAFT_PICKLIST", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAllowDraftPicklist = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY5", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey5 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY5", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey5 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY5_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey5Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY6", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey6 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY6", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey6 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY6_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey6Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY7", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey7 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY7", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey7 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY7_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey7Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY8", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey8 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY8", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey8 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY8_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey8Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_KEY9", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastKey9 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY9", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issKey9 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_KEY9_LABEL", type="string", length=100, nullable=true)
     */
    private $issKey9Label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DEFAULT_DOC3", type="string", length=20, nullable=true)
     */
    private $issDefaultDoc3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DEFAULT_DOC3", type="string", length=20, nullable=true)
     */
    private $recDefaultDoc3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="STORER_KEY", type="string", length=20, nullable=true)
     */
    private $storerKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_AUTOFILL_DETAIL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recAutofillDetail = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISSUE_INVOICE", type="string", length=100, nullable=true)
     */
    private $rptIssueInvoice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PACKING_LIST", type="string", length=50, nullable=true)
     */
    private $rptPackingList;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RECD_PRICE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recdPrice = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_BILL_CHRGS", type="decimal", precision=20, scale=3, nullable=true)
     */
    private $rptBillChrgs = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_ALLOW_EXTRA_QTY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordAllowExtraQty = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_CONSO_CUSTOMS_INVOICE", type="string", length=100, nullable=true)
     */
    private $rptConsoCustomsInvoice;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_COMM_CODE_REQUIRED", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isCommCodeRequired = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCH_NUM_AUTO_FILL", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issBatchNumAutoFill = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_REQUIRE_ITEMS_CHECKING", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $ordRequireItemsChecking = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_PUTAWAY_CONTROL_ITEM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recPutawayControlItem = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC2_AUTO_KEY7", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recDoc2AutoKey7 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MAST_PRICE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issMastPrice = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_DOC3_AUTO_KEY9", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recDoc3AutoKey9 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_AUTO_MANUAL_PICK_QTY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAutoManualPickQty = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC3_EDITABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDoc3Editable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DOC4_EDITABLE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDoc4Editable = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DIS_A_PICK_MANUAL_NT_ALLOW", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDisAPickManualNtAllow = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="AUDIT_FIELDS_DETAIL", type="text", nullable=true)
     */
    private $auditFieldsDetail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AUDIT_FIELDS_HEADER", type="text", nullable=true)
     */
    private $auditFieldsHeader;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_AUTO_ADD_ACCT", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAutoAddAcct = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="BATCH_NUM_REGEX", type="string", length=100, nullable=true)
     */
    private $batchNumRegex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_PICKING_LIST_SORTING", type="string", length=100, nullable=true)
     */
    private $issPickingListSorting;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_ALLOW_INSUFF_QTY", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issAllowInsuffQty = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISSUE_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptIssueExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_PICK_QTY_OPTIMIZATION", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issPickQtyOptimization = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DO_GROUP_BY", type="string", length=800, nullable=true)
     */
    private $rptDoGroupBy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOTNO_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptScLotnoExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOTNO_PORTRAIT", type="string", length=100, nullable=true)
     */
    private $rptScLotnoPortrait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_LOTNO_LANDSCAPE", type="string", length=100, nullable=true)
     */
    private $rptScLotnoLandscape;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_PRODUCT_LANDSCAPE", type="string", length=100, nullable=true)
     */
    private $rptScProductLandscape;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_SC_PRODUCT_PORTRAIT", type="string", length=100, nullable=true)
     */
    private $rptScProductPortrait;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CONFIRM_VALIDATE_DOC3", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issConfirmValidateDoc3 = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="TRANSFER_AUTO_QTY_ON_HAND", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $transferAutoQtyOnHand = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_ALLOW_PRINT_REC_NOTE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isAllowPrintRecNote = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DO_KEY_SEQ", type="string", length=500, nullable=true)
     */
    private $rptDoKeySeq;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_BILL_BY_SUPP_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptBillBySuppExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EDIT_ETA_DATE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issEditEtaDate = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_BILL_BY_SUPP_WITH_LOC", type="string", length=100, nullable=true)
     */
    private $rptBillBySuppWithLoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_REC_AUTO_ADD_NEW_ITEM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $impRecAutoAddNewItem = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PUT_ALLOW_BATCH_NO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $putAllowBatchNo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PUT_MAST_BATCH_NO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $putMastBatchNo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_INBOUND_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $issImportInboundClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_OUTBOUND_CLASS_NAME", type="string", length=200, nullable=true)
     */
    private $issImportOutboundClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_INBOUND_DETAIL_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptInboundDetailExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_OUTBOUND_DETAIL_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptOutboundDetailExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_BATCH_NO_REGEX", type="string", length=50, nullable=true)
     */
    private $recBatchNoRegex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_CUSTOM_INV_CURR", type="string", length=200, nullable=true)
     */
    private $issCustomInvCurr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_PUT_KEY2_NULL_AUTO_DATE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recPutKey2NullAutoDate = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="ISS_LOOKUPBATCH", type="string", length=300, nullable=false, options={"default"="STKD.PALLET_ID,STKD.BATCH_NUM "})
     */
    private $issLookupbatch = 'STKD.PALLET_ID,STKD.BATCH_NUM ';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPTBARCODE", type="string", length=300, nullable=true)
     */
    private $rptbarcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISS_BARCODE", type="string", length=300, nullable=true)
     */
    private $rptIssBarcode;

    /**
     * @var string
     *
     * @ORM\Column(name="IS_SAME_LOCCODE", type="string", length=1, nullable=false, options={"default"="N","fixed"=true})
     */
    private $isSameLoccode = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="IS_RPT_TAKE_UOM", type="string", length=1, nullable=false, options={"default"="Y","fixed"=true})
     */
    private $isRptTakeUom = 'Y';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ITEM_IMPORT_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $itemImportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_CPL_SQL_SORTING", type="string", length=500, nullable=true)
     */
    private $rptCplSqlSorting;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_CPL_PDF", type="string", length=200, nullable=true)
     */
    private $rptCplPdf;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MOBILE_PUTAWAY_MODE", type="string", length=1, nullable=true, options={"default"="M","fixed"=true})
     */
    private $mobilePutawayMode = 'M';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_RECEIPT_PARTIAL_RETRIEVE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recReceiptPartialRetrieve = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IS_REFERENCE_ITEM_DESC", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issIsReferenceItemDesc = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_BARCODE_PRODUCT", type="string", length=200, nullable=true)
     */
    private $rptBarcodeProduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MOBILE_DIRECT_REC", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $mobileDirectRec = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="MOBILE_PRINTER", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $mobilePrinter = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_IMPORT_API", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isImportApi = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_STOCK_AGING_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptStockAgingExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SC_ALLOW_PURGE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $scAllowPurge = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="SC_ALLOW_RECONCILATION", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $scAllowReconcilation = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PRINT_RECEIPT_LABEL", type="string", length=200, nullable=true)
     */
    private $printReceiptLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PICKING_NOTE_SUMMARY_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptPickingNoteSummaryExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PICKING_NOTE_SUMMARY", type="string", length=200, nullable=true)
     */
    private $rptPickingNoteSummary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PSC", type="string", length=200, nullable=true)
     */
    private $rptPsc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ISS_IMP_BY_FEILD", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isIssImpByFeild = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMP_FEILD_CLASS_NAME", type="string", length=100, nullable=true)
     */
    private $issImpFeildClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_ORDER_BY_TEXT_HAED", type="string", length=200, nullable=true)
     */
    private $impOrderByTextHaed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_LOCATION_BY_SCAN", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isLocationByScan = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_PUTAWAY_SCAN_ITEM_VALIDATE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isPutawayScanItemValidate = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_CUST_PO_EQUAL_BATCH_NO", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $recCustPoEqualBatchNo = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_DIRECT_CONFIRM", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $issDirectConfirm = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_IMP_UP_FEILD_CLASS_NAME", type="string", length=200, nullable=true)
     */
    private $recImpUpFeildClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_UP_REC_BY_TEXT_HAED", type="string", length=200, nullable=true)
     */
    private $impUpRecByTextHaed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_REC_IMP_UP_BY_FEILD", type="string", length=200, nullable=true)
     */
    private $isRecImpUpByFeild;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CUSTOM_MONTHLY_RPT_EXCEL_NEW", type="string", length=200, nullable=true)
     */
    private $customMonthlyRptExcelNew;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_AUTO_PUTAWAY_PRE_LOC_CODE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $isAutoPutawayPreLocCode = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISS_EXPORT_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptIssExportExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DETAIL_TRANS_BY_ITEM_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptDetailTransByItemExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_PRODUCT_LISTING_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptProductListingExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_WHSE_STORAGE_EXCEL", type="string", length=200, nullable=true)
     */
    private $rptWhseStorageExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_SCAN_BY_PICKING_RETRIEVE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issScanByPickingRetrieve;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RETRIEVE_ISSUE_TARGET_CUST", type="string", length=100, nullable=true)
     */
    private $retrieveIssueTargetCust;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_MULTIPLE_RETRIEVE_ISSUE", type="string", length=100, nullable=true)
     */
    private $isMultipleRetrieveIssue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ISSUE__DETAIL_NOTE", type="string", length=100, nullable=true)
     */
    private $rptIssueDetailNote;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ALLOW_PALLETID_ADJ", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isAllowPalletidAdj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_CHK_ORDER_POSTAL_CODE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isChkOrderPostalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_EXPORT_ISS_API", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isExportIssApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_EXPORT_REC_API", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isExportRecApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_ORDER_EXTERNAL_LIST", type="string", length=100, nullable=true)
     */
    private $rptOrderExternalList;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ISS_PRINT_INV_CUPS", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isIssPrintInvCups;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_KEY1_VS_EXPIRY", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isKey1VsExpiry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_REC_PRODUCT_MATCH_CATEGORY", type="string", length=100, nullable=true)
     */
    private $impRecProductMatchCategory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_RM_DO_FILE_TO_ARCH", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isRmDoFileToArch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ORD_PICKING_LOOSE_ALERT", type="string", length=100, nullable=true)
     */
    private $ordPickingLooseAlert;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ISS_SHELF_LIFE_BY_ACCT", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isIssShelfLifeByAcct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DSN_REPORT_TYPE", type="string", length=12, nullable=true)
     */
    private $dsnReportType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TNET_API_URL_PRINT_LABEL", type="string", length=100, nullable=true)
     */
    private $tnetApiUrlPrintLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DETAIL_TRANS_TRUCK_EXCEL", type="string", length=100, nullable=true)
     */
    private $rptDetailTransTruckExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_EXPORT_VIEW_TYPE", type="string", length=100, nullable=true)
     */
    private $trExportViewType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ISS_SHELF_LIFE_BY_ITEM", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isIssShelfLifeByItem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_IS_WMPICK_TMP", type="string", length=100, nullable=true)
     */
    private $rptIsWmpickTmp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADJ_IMP_CLASSNAME", type="string", length=100, nullable=true)
     */
    private $adjImpClassname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DELIV_DETAIL_BY_ITEM_GROUP", type="string", length=100, nullable=true)
     */
    private $rptDelivDetailByItemGroup;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MANUAL_PICK_KEY1", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $issManualPickKey1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_API_OUTBOUND_URL", type="string", length=100, nullable=true)
     */
    private $impApiOutboundUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMPORT_API_LOGIN_CREDENTIAL", type="string", length=22, nullable=true)
     */
    private $importApiLoginCredential;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMPORT_API_KEYCODE", type="string", length=22, nullable=true)
     */
    private $importApiKeycode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_IMPORT_REC_API", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isImportRecApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WHSE_CODE_API", type="string", length=22, nullable=true)
     */
    private $whseCodeApi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_TRF_REASON", type="string", length=22, nullable=true)
     */
    private $isTrfReason;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_TRF_TRANSCODE", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isTrfTranscode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_AUTO_ADD_ACCT_TYPE", type="string", length=22, nullable=true)
     */
    private $issAutoAddAcctType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_FUTURE_EXPIRY_DATE", type="string", length=22, nullable=true)
     */
    private $issFutureExpiryDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_EXPORT_VIEW_TYPE", type="string", length=22, nullable=true)
     */
    private $issExportViewType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_PUTAWAY_EXPORT_VIEW_TYPE", type="string", length=22, nullable=true)
     */
    private $recPutawayExportViewType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_WHSE_STOCK_TRANS_EXCEL", type="string", length=11, nullable=true)
     */
    private $rptWhseStockTransExcel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_AUTO_FILL_LOC_CODE", type="string", length=22, nullable=true)
     */
    private $trAutoFillLocCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_AUTO_FILL_QTY", type="string", length=22, nullable=true)
     */
    private $trAutoFillQty;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_ADJ_EXPORT_EDI", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $isAdjExportEdi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADJ_EXPORT_CLASS_NAME", type="string", length=22, nullable=true)
     */
    private $adjExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RPT_DETAIL_TRAN_EXCELDETAILS", type="string", length=22, nullable=true)
     */
    private $rptDetailTranExceldetails;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_BATCHNUM_DATE_LABEL", type="string", length=22, nullable=true)
     */
    private $issBatchnumDateLabel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IS_IMP_CHECK_DUPLICATE_DETAIL", type="string", length=2, nullable=true)
     */
    private $isImpCheckDuplicateDetail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMPREC_NOT_ALLOW_REMOVE", type="string", length=2, nullable=true)
     */
    private $imprecNotAllowRemove;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_CHK_FULL_PALLET", type="string", length=2, nullable=true)
     */
    private $impChkFullPallet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DISABLE_COL_DEFAULT_ASRS_LOC", type="string", length=22, nullable=true)
     */
    private $disableColDefaultAsrsLoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEFAULT_ASRS_LOC", type="string", length=22, nullable=true)
     */
    private $defaultAsrsLoc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RET_FROM_ISSUE_ALLOW_EXPORT", type="string", length=22, nullable=true)
     */
    private $retFromIssueAllowExport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_MOVETYPE_EXPISSUE", type="string", length=22, nullable=true)
     */
    private $issMovetypeExpissue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_ORDER_SENDMAIL_RECIPIENT", type="string", length=2, nullable=true)
     */
    private $impOrderSendmailRecipient;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IMP_ORDER_EMAIL", type="string", length=22, nullable=true)
     */
    private $impOrderEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ISS_IMPORT_ORDER_VALIDATE", type="string", length=22, nullable=true)
     */
    private $issImportOrderValidate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_MANUAL_EXPORT_EDI", type="string", length=22, nullable=true)
     */
    private $trManualExportEdi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_EXPORT_CLASS_NAME", type="string", length=22, nullable=true)
     */
    private $trExportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_EXPORT_EDI", type="string", length=22, nullable=true)
     */
    private $trExportEdi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TR_IMPORT_CLASS_NAME", type="string", length=22, nullable=true)
     */
    private $trImportClassName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="REC_MAST_REF_QTY_MOVETYPE", type="string", length=22, nullable=true)
     */
    private $recMastRefQtyMovetype;

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

    public function getGenAllowCancel(): ?string
    {
        return $this->genAllowCancel;
    }

    public function setGenAllowCancel(?string $genAllowCancel): static
    {
        $this->genAllowCancel = $genAllowCancel;

        return $this;
    }

    public function getGenBarcode(): ?string
    {
        return $this->genBarcode;
    }

    public function setGenBarcode(?string $genBarcode): static
    {
        $this->genBarcode = $genBarcode;

        return $this;
    }

    public function getGenBarcodeType(): ?string
    {
        return $this->genBarcodeType;
    }

    public function setGenBarcodeType(?string $genBarcodeType): static
    {
        $this->genBarcodeType = $genBarcodeType;

        return $this;
    }

    public function getGenCrossdock(): ?string
    {
        return $this->genCrossdock;
    }

    public function setGenCrossdock(?string $genCrossdock): static
    {
        $this->genCrossdock = $genCrossdock;

        return $this;
    }

    public function getGenUpdMethod(): ?string
    {
        return $this->genUpdMethod;
    }

    public function setGenUpdMethod(?string $genUpdMethod): static
    {
        $this->genUpdMethod = $genUpdMethod;

        return $this;
    }

    public function getGenWhseType(): ?string
    {
        return $this->genWhseType;
    }

    public function setGenWhseType(?string $genWhseType): static
    {
        $this->genWhseType = $genWhseType;

        return $this;
    }

    public function getGenWithLoc(): ?string
    {
        return $this->genWithLoc;
    }

    public function setGenWithLoc(?string $genWithLoc): static
    {
        $this->genWithLoc = $genWithLoc;

        return $this;
    }

    public function getIssAcknowledge(): ?string
    {
        return $this->issAcknowledge;
    }

    public function setIssAcknowledge(?string $issAcknowledge): static
    {
        $this->issAcknowledge = $issAcknowledge;

        return $this;
    }

    public function getIssBatchNo(): ?string
    {
        return $this->issBatchNo;
    }

    public function setIssBatchNo(?string $issBatchNo): static
    {
        $this->issBatchNo = $issBatchNo;

        return $this;
    }

    public function getIssDoc1(): ?string
    {
        return $this->issDoc1;
    }

    public function setIssDoc1(?string $issDoc1): static
    {
        $this->issDoc1 = $issDoc1;

        return $this;
    }

    public function getIssDoc1Label(): ?string
    {
        return $this->issDoc1Label;
    }

    public function setIssDoc1Label(?string $issDoc1Label): static
    {
        $this->issDoc1Label = $issDoc1Label;

        return $this;
    }

    public function getIssDoc2(): ?string
    {
        return $this->issDoc2;
    }

    public function setIssDoc2(?string $issDoc2): static
    {
        $this->issDoc2 = $issDoc2;

        return $this;
    }

    public function getIssDoc2Label(): ?string
    {
        return $this->issDoc2Label;
    }

    public function setIssDoc2Label(?string $issDoc2Label): static
    {
        $this->issDoc2Label = $issDoc2Label;

        return $this;
    }

    public function getIssDoc3(): ?string
    {
        return $this->issDoc3;
    }

    public function setIssDoc3(?string $issDoc3): static
    {
        $this->issDoc3 = $issDoc3;

        return $this;
    }

    public function getIssDoc3Label(): ?string
    {
        return $this->issDoc3Label;
    }

    public function setIssDoc3Label(?string $issDoc3Label): static
    {
        $this->issDoc3Label = $issDoc3Label;

        return $this;
    }

    public function getIssDoc4(): ?string
    {
        return $this->issDoc4;
    }

    public function setIssDoc4(?string $issDoc4): static
    {
        $this->issDoc4 = $issDoc4;

        return $this;
    }

    public function getIssDoc4Label(): ?string
    {
        return $this->issDoc4Label;
    }

    public function setIssDoc4Label(?string $issDoc4Label): static
    {
        $this->issDoc4Label = $issDoc4Label;

        return $this;
    }

    public function getIssExpiryDate(): ?string
    {
        return $this->issExpiryDate;
    }

    public function setIssExpiryDate(?string $issExpiryDate): static
    {
        $this->issExpiryDate = $issExpiryDate;

        return $this;
    }

    public function getIssKey1(): ?string
    {
        return $this->issKey1;
    }

    public function setIssKey1(?string $issKey1): static
    {
        $this->issKey1 = $issKey1;

        return $this;
    }

    public function getIssKey1Label(): ?string
    {
        return $this->issKey1Label;
    }

    public function setIssKey1Label(?string $issKey1Label): static
    {
        $this->issKey1Label = $issKey1Label;

        return $this;
    }

    public function getIssKey2(): ?string
    {
        return $this->issKey2;
    }

    public function setIssKey2(?string $issKey2): static
    {
        $this->issKey2 = $issKey2;

        return $this;
    }

    public function getIssKey2Label(): ?string
    {
        return $this->issKey2Label;
    }

    public function setIssKey2Label(?string $issKey2Label): static
    {
        $this->issKey2Label = $issKey2Label;

        return $this;
    }

    public function getIssKeySeq(): ?string
    {
        return $this->issKeySeq;
    }

    public function setIssKeySeq(?string $issKeySeq): static
    {
        $this->issKeySeq = $issKeySeq;

        return $this;
    }

    public function getIssMethod(): ?string
    {
        return $this->issMethod;
    }

    public function setIssMethod(?string $issMethod): static
    {
        $this->issMethod = $issMethod;

        return $this;
    }

    public function getIssPartial(): ?string
    {
        return $this->issPartial;
    }

    public function setIssPartial(?string $issPartial): static
    {
        $this->issPartial = $issPartial;

        return $this;
    }

    public function getIssSerial(): ?string
    {
        return $this->issSerial;
    }

    public function setIssSerial(?string $issSerial): static
    {
        $this->issSerial = $issSerial;

        return $this;
    }

    public function getProdCurrency(): ?string
    {
        return $this->prodCurrency;
    }

    public function setProdCurrency(?string $prodCurrency): static
    {
        $this->prodCurrency = $prodCurrency;

        return $this;
    }

    public function getProdFixLoc(): ?string
    {
        return $this->prodFixLoc;
    }

    public function setProdFixLoc(?string $prodFixLoc): static
    {
        $this->prodFixLoc = $prodFixLoc;

        return $this;
    }

    public function getProdGroupField(): ?string
    {
        return $this->prodGroupField;
    }

    public function setProdGroupField(?string $prodGroupField): static
    {
        $this->prodGroupField = $prodGroupField;

        return $this;
    }

    public function getProdPickFace(): ?string
    {
        return $this->prodPickFace;
    }

    public function setProdPickFace(?string $prodPickFace): static
    {
        $this->prodPickFace = $prodPickFace;

        return $this;
    }

    public function getProdPlant(): ?string
    {
        return $this->prodPlant;
    }

    public function setProdPlant(?string $prodPlant): static
    {
        $this->prodPlant = $prodPlant;

        return $this;
    }

    public function getProdSerial(): ?string
    {
        return $this->prodSerial;
    }

    public function setProdSerial(?string $prodSerial): static
    {
        $this->prodSerial = $prodSerial;

        return $this;
    }

    public function getProdSubgroup(): ?string
    {
        return $this->prodSubgroup;
    }

    public function setProdSubgroup(?string $prodSubgroup): static
    {
        $this->prodSubgroup = $prodSubgroup;

        return $this;
    }

    public function getRecAutoPutaway(): ?string
    {
        return $this->recAutoPutaway;
    }

    public function setRecAutoPutaway(?string $recAutoPutaway): static
    {
        $this->recAutoPutaway = $recAutoPutaway;

        return $this;
    }

    public function getRecDoc1(): ?string
    {
        return $this->recDoc1;
    }

    public function setRecDoc1(?string $recDoc1): static
    {
        $this->recDoc1 = $recDoc1;

        return $this;
    }

    public function getRecDoc1Label(): ?string
    {
        return $this->recDoc1Label;
    }

    public function setRecDoc1Label(?string $recDoc1Label): static
    {
        $this->recDoc1Label = $recDoc1Label;

        return $this;
    }

    public function getRecDoc2(): ?string
    {
        return $this->recDoc2;
    }

    public function setRecDoc2(?string $recDoc2): static
    {
        $this->recDoc2 = $recDoc2;

        return $this;
    }

    public function getRecDoc2Label(): ?string
    {
        return $this->recDoc2Label;
    }

    public function setRecDoc2Label(?string $recDoc2Label): static
    {
        $this->recDoc2Label = $recDoc2Label;

        return $this;
    }

    public function getRecDoc3(): ?string
    {
        return $this->recDoc3;
    }

    public function setRecDoc3(?string $recDoc3): static
    {
        $this->recDoc3 = $recDoc3;

        return $this;
    }

    public function getRecDoc3Label(): ?string
    {
        return $this->recDoc3Label;
    }

    public function setRecDoc3Label(?string $recDoc3Label): static
    {
        $this->recDoc3Label = $recDoc3Label;

        return $this;
    }

    public function getRecDoc4(): ?string
    {
        return $this->recDoc4;
    }

    public function setRecDoc4(?string $recDoc4): static
    {
        $this->recDoc4 = $recDoc4;

        return $this;
    }

    public function getRecDoc4Label(): ?string
    {
        return $this->recDoc4Label;
    }

    public function setRecDoc4Label(?string $recDoc4Label): static
    {
        $this->recDoc4Label = $recDoc4Label;

        return $this;
    }

    public function getRecSerial(): ?string
    {
        return $this->recSerial;
    }

    public function setRecSerial(?string $recSerial): static
    {
        $this->recSerial = $recSerial;

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

    public function getUserCreatedId(): ?string
    {
        return $this->userCreatedId;
    }

    public function setUserCreatedId(?string $userCreatedId): static
    {
        $this->userCreatedId = $userCreatedId;

        return $this;
    }

    public function getUserUpdatedDatetime(): ?\DateTimeInterface
    {
        return $this->userUpdatedDatetime;
    }

    public function setUserUpdatedDatetime(?\DateTimeInterface $userUpdatedDatetime): static
    {
        $this->userUpdatedDatetime = $userUpdatedDatetime;

        return $this;
    }

    public function getUserUpdatedId(): ?string
    {
        return $this->userUpdatedId;
    }

    public function setUserUpdatedId(?string $userUpdatedId): static
    {
        $this->userUpdatedId = $userUpdatedId;

        return $this;
    }

    public function getIssBypassOrderAndPicking(): ?string
    {
        return $this->issBypassOrderAndPicking;
    }

    public function setIssBypassOrderAndPicking(?string $issBypassOrderAndPicking): static
    {
        $this->issBypassOrderAndPicking = $issBypassOrderAndPicking;

        return $this;
    }

    public function getIssCheckGradeQtyOnHand(): ?string
    {
        return $this->issCheckGradeQtyOnHand;
    }

    public function setIssCheckGradeQtyOnHand(?string $issCheckGradeQtyOnHand): static
    {
        $this->issCheckGradeQtyOnHand = $issCheckGradeQtyOnHand;

        return $this;
    }

    public function getRecDefaultMovetype(): ?string
    {
        return $this->recDefaultMovetype;
    }

    public function setRecDefaultMovetype(?string $recDefaultMovetype): static
    {
        $this->recDefaultMovetype = $recDefaultMovetype;

        return $this;
    }

    public function getRecDefaultGrade(): ?string
    {
        return $this->recDefaultGrade;
    }

    public function setRecDefaultGrade(?string $recDefaultGrade): static
    {
        $this->recDefaultGrade = $recDefaultGrade;

        return $this;
    }

    public function getIssDefaultMovetype(): ?string
    {
        return $this->issDefaultMovetype;
    }

    public function setIssDefaultMovetype(?string $issDefaultMovetype): static
    {
        $this->issDefaultMovetype = $issDefaultMovetype;

        return $this;
    }

    public function getIssDefaultGrade(): ?string
    {
        return $this->issDefaultGrade;
    }

    public function setIssDefaultGrade(?string $issDefaultGrade): static
    {
        $this->issDefaultGrade = $issDefaultGrade;

        return $this;
    }

    public function getIssBypassKeyseqInOrder(): ?string
    {
        return $this->issBypassKeyseqInOrder;
    }

    public function setIssBypassKeyseqInOrder(?string $issBypassKeyseqInOrder): static
    {
        $this->issBypassKeyseqInOrder = $issBypassKeyseqInOrder;

        return $this;
    }

    public function getIssEditEntryDate(): ?string
    {
        return $this->issEditEntryDate;
    }

    public function setIssEditEntryDate(?string $issEditEntryDate): static
    {
        $this->issEditEntryDate = $issEditEntryDate;

        return $this;
    }

    public function getRecEditEntryDate(): ?string
    {
        return $this->recEditEntryDate;
    }

    public function setRecEditEntryDate(?string $recEditEntryDate): static
    {
        $this->recEditEntryDate = $recEditEntryDate;

        return $this;
    }

    public function getRecKey2AutoRecDate(): ?string
    {
        return $this->recKey2AutoRecDate;
    }

    public function setRecKey2AutoRecDate(?string $recKey2AutoRecDate): static
    {
        $this->recKey2AutoRecDate = $recKey2AutoRecDate;

        return $this;
    }

    public function getRecKey1AutoPriKey(): ?string
    {
        return $this->recKey1AutoPriKey;
    }

    public function setRecKey1AutoPriKey(?string $recKey1AutoPriKey): static
    {
        $this->recKey1AutoPriKey = $recKey1AutoPriKey;

        return $this;
    }

    public function getIssAccTo(): ?string
    {
        return $this->issAccTo;
    }

    public function setIssAccTo(?string $issAccTo): static
    {
        $this->issAccTo = $issAccTo;

        return $this;
    }

    public function getIssDeliveryTo(): ?string
    {
        return $this->issDeliveryTo;
    }

    public function setIssDeliveryTo(?string $issDeliveryTo): static
    {
        $this->issDeliveryTo = $issDeliveryTo;

        return $this;
    }

    public function getRecSupplier(): ?string
    {
        return $this->recSupplier;
    }

    public function setRecSupplier(?string $recSupplier): static
    {
        $this->recSupplier = $recSupplier;

        return $this;
    }

    public function getProdDecimalPlace(): ?int
    {
        return $this->prodDecimalPlace;
    }

    public function setProdDecimalPlace(?int $prodDecimalPlace): static
    {
        $this->prodDecimalPlace = $prodDecimalPlace;

        return $this;
    }

    public function getIssExpiryDateLabel(): ?string
    {
        return $this->issExpiryDateLabel;
    }

    public function setIssExpiryDateLabel(?string $issExpiryDateLabel): static
    {
        $this->issExpiryDateLabel = $issExpiryDateLabel;

        return $this;
    }

    public function getIssBatchNoLabel(): ?string
    {
        return $this->issBatchNoLabel;
    }

    public function setIssBatchNoLabel(?string $issBatchNoLabel): static
    {
        $this->issBatchNoLabel = $issBatchNoLabel;

        return $this;
    }

    public function getRecCustPoLabel(): ?string
    {
        return $this->recCustPoLabel;
    }

    public function setRecCustPoLabel(?string $recCustPoLabel): static
    {
        $this->recCustPoLabel = $recCustPoLabel;

        return $this;
    }

    public function getIssCustPoLabel(): ?string
    {
        return $this->issCustPoLabel;
    }

    public function setIssCustPoLabel(?string $issCustPoLabel): static
    {
        $this->issCustPoLabel = $issCustPoLabel;

        return $this;
    }

    public function getIssExportEdi(): ?string
    {
        return $this->issExportEdi;
    }

    public function setIssExportEdi(?string $issExportEdi): static
    {
        $this->issExportEdi = $issExportEdi;

        return $this;
    }

    public function getRecExportEdi(): ?string
    {
        return $this->recExportEdi;
    }

    public function setRecExportEdi(?string $recExportEdi): static
    {
        $this->recExportEdi = $recExportEdi;

        return $this;
    }

    public function getRecExportEdiDirectFtp(): ?string
    {
        return $this->recExportEdiDirectFtp;
    }

    public function setRecExportEdiDirectFtp(?string $recExportEdiDirectFtp): static
    {
        $this->recExportEdiDirectFtp = $recExportEdiDirectFtp;

        return $this;
    }

    public function getIssExportEdiDirectFtp(): ?string
    {
        return $this->issExportEdiDirectFtp;
    }

    public function setIssExportEdiDirectFtp(?string $issExportEdiDirectFtp): static
    {
        $this->issExportEdiDirectFtp = $issExportEdiDirectFtp;

        return $this;
    }

    public function getRecImportEdiPartial(): ?string
    {
        return $this->recImportEdiPartial;
    }

    public function setRecImportEdiPartial(?string $recImportEdiPartial): static
    {
        $this->recImportEdiPartial = $recImportEdiPartial;

        return $this;
    }

    public function getIssImportEdiPartial(): ?string
    {
        return $this->issImportEdiPartial;
    }

    public function setIssImportEdiPartial(?string $issImportEdiPartial): static
    {
        $this->issImportEdiPartial = $issImportEdiPartial;

        return $this;
    }

    public function getIssBypassIssueProcess(): ?string
    {
        return $this->issBypassIssueProcess;
    }

    public function setIssBypassIssueProcess(?string $issBypassIssueProcess): static
    {
        $this->issBypassIssueProcess = $issBypassIssueProcess;

        return $this;
    }

    public function getIssCustPoDuplicate(): ?string
    {
        return $this->issCustPoDuplicate;
    }

    public function setIssCustPoDuplicate(?string $issCustPoDuplicate): static
    {
        $this->issCustPoDuplicate = $issCustPoDuplicate;

        return $this;
    }

    public function getRecCustPoDuplicate(): ?string
    {
        return $this->recCustPoDuplicate;
    }

    public function setRecCustPoDuplicate(?string $recCustPoDuplicate): static
    {
        $this->recCustPoDuplicate = $recCustPoDuplicate;

        return $this;
    }

    public function getRecDoc4Duplicate(): ?string
    {
        return $this->recDoc4Duplicate;
    }

    public function setRecDoc4Duplicate(?string $recDoc4Duplicate): static
    {
        $this->recDoc4Duplicate = $recDoc4Duplicate;

        return $this;
    }

    public function getRecDoc3Duplicate(): ?string
    {
        return $this->recDoc3Duplicate;
    }

    public function setRecDoc3Duplicate(?string $recDoc3Duplicate): static
    {
        $this->recDoc3Duplicate = $recDoc3Duplicate;

        return $this;
    }

    public function getRecDoc2Duplicate(): ?string
    {
        return $this->recDoc2Duplicate;
    }

    public function setRecDoc2Duplicate(?string $recDoc2Duplicate): static
    {
        $this->recDoc2Duplicate = $recDoc2Duplicate;

        return $this;
    }

    public function getRecDoc1Duplicate(): ?string
    {
        return $this->recDoc1Duplicate;
    }

    public function setRecDoc1Duplicate(?string $recDoc1Duplicate): static
    {
        $this->recDoc1Duplicate = $recDoc1Duplicate;

        return $this;
    }

    public function getIssDoc4Duplicate(): ?string
    {
        return $this->issDoc4Duplicate;
    }

    public function setIssDoc4Duplicate(?string $issDoc4Duplicate): static
    {
        $this->issDoc4Duplicate = $issDoc4Duplicate;

        return $this;
    }

    public function getIssDoc3Duplicate(): ?string
    {
        return $this->issDoc3Duplicate;
    }

    public function setIssDoc3Duplicate(?string $issDoc3Duplicate): static
    {
        $this->issDoc3Duplicate = $issDoc3Duplicate;

        return $this;
    }

    public function getIssDoc2Duplicate(): ?string
    {
        return $this->issDoc2Duplicate;
    }

    public function setIssDoc2Duplicate(?string $issDoc2Duplicate): static
    {
        $this->issDoc2Duplicate = $issDoc2Duplicate;

        return $this;
    }

    public function getIssDoc1Duplicate(): ?string
    {
        return $this->issDoc1Duplicate;
    }

    public function setIssDoc1Duplicate(?string $issDoc1Duplicate): static
    {
        $this->issDoc1Duplicate = $issDoc1Duplicate;

        return $this;
    }

    public function getRecDoc1IsInt(): ?string
    {
        return $this->recDoc1IsInt;
    }

    public function setRecDoc1IsInt(?string $recDoc1IsInt): static
    {
        $this->recDoc1IsInt = $recDoc1IsInt;

        return $this;
    }

    public function getRecDoc2IsInt(): ?string
    {
        return $this->recDoc2IsInt;
    }

    public function setRecDoc2IsInt(?string $recDoc2IsInt): static
    {
        $this->recDoc2IsInt = $recDoc2IsInt;

        return $this;
    }

    public function getRecDoc3IsInt(): ?string
    {
        return $this->recDoc3IsInt;
    }

    public function setRecDoc3IsInt(?string $recDoc3IsInt): static
    {
        $this->recDoc3IsInt = $recDoc3IsInt;

        return $this;
    }

    public function getRecDoc4IsInt(): ?string
    {
        return $this->recDoc4IsInt;
    }

    public function setRecDoc4IsInt(?string $recDoc4IsInt): static
    {
        $this->recDoc4IsInt = $recDoc4IsInt;

        return $this;
    }

    public function getIssDoc1IsInt(): ?string
    {
        return $this->issDoc1IsInt;
    }

    public function setIssDoc1IsInt(?string $issDoc1IsInt): static
    {
        $this->issDoc1IsInt = $issDoc1IsInt;

        return $this;
    }

    public function getIssDoc2IsInt(): ?string
    {
        return $this->issDoc2IsInt;
    }

    public function setIssDoc2IsInt(?string $issDoc2IsInt): static
    {
        $this->issDoc2IsInt = $issDoc2IsInt;

        return $this;
    }

    public function getIssDoc3IsInt(): ?string
    {
        return $this->issDoc3IsInt;
    }

    public function setIssDoc3IsInt(?string $issDoc3IsInt): static
    {
        $this->issDoc3IsInt = $issDoc3IsInt;

        return $this;
    }

    public function getIssDoc4IsInt(): ?string
    {
        return $this->issDoc4IsInt;
    }

    public function setIssDoc4IsInt(?string $issDoc4IsInt): static
    {
        $this->issDoc4IsInt = $issDoc4IsInt;

        return $this;
    }

    public function getIssShelfLifeProcess(): ?string
    {
        return $this->issShelfLifeProcess;
    }

    public function setIssShelfLifeProcess(?string $issShelfLifeProcess): static
    {
        $this->issShelfLifeProcess = $issShelfLifeProcess;

        return $this;
    }

    public function getRptProductMasterDetail(): ?string
    {
        return $this->rptProductMasterDetail;
    }

    public function setRptProductMasterDetail(?string $rptProductMasterDetail): static
    {
        $this->rptProductMasterDetail = $rptProductMasterDetail;

        return $this;
    }

    public function getRptDetailTransaction(): ?string
    {
        return $this->rptDetailTransaction;
    }

    public function setRptDetailTransaction(?string $rptDetailTransaction): static
    {
        $this->rptDetailTransaction = $rptDetailTransaction;

        return $this;
    }

    public function getRptReceiptDetailListing(): ?string
    {
        return $this->rptReceiptDetailListing;
    }

    public function setRptReceiptDetailListing(?string $rptReceiptDetailListing): static
    {
        $this->rptReceiptDetailListing = $rptReceiptDetailListing;

        return $this;
    }

    public function getRptDeliveryDetailListing(): ?string
    {
        return $this->rptDeliveryDetailListing;
    }

    public function setRptDeliveryDetailListing(?string $rptDeliveryDetailListing): static
    {
        $this->rptDeliveryDetailListing = $rptDeliveryDetailListing;

        return $this;
    }

    public function getRptReceiptNote(): ?string
    {
        return $this->rptReceiptNote;
    }

    public function setRptReceiptNote(?string $rptReceiptNote): static
    {
        $this->rptReceiptNote = $rptReceiptNote;

        return $this;
    }

    public function getRptOrderNote(): ?string
    {
        return $this->rptOrderNote;
    }

    public function setRptOrderNote(?string $rptOrderNote): static
    {
        $this->rptOrderNote = $rptOrderNote;

        return $this;
    }

    public function getRptPickingNote(): ?string
    {
        return $this->rptPickingNote;
    }

    public function setRptPickingNote(?string $rptPickingNote): static
    {
        $this->rptPickingNote = $rptPickingNote;

        return $this;
    }

    public function getRptIssueNote(): ?string
    {
        return $this->rptIssueNote;
    }

    public function setRptIssueNote(?string $rptIssueNote): static
    {
        $this->rptIssueNote = $rptIssueNote;

        return $this;
    }

    public function getRptIssPickingNote(): ?string
    {
        return $this->rptIssPickingNote;
    }

    public function setRptIssPickingNote(?string $rptIssPickingNote): static
    {
        $this->rptIssPickingNote = $rptIssPickingNote;

        return $this;
    }

    public function getIssKey1IsDisable(): ?string
    {
        return $this->issKey1IsDisable;
    }

    public function setIssKey1IsDisable(?string $issKey1IsDisable): static
    {
        $this->issKey1IsDisable = $issKey1IsDisable;

        return $this;
    }

    public function getIssKey2IsDisable(): ?string
    {
        return $this->issKey2IsDisable;
    }

    public function setIssKey2IsDisable(?string $issKey2IsDisable): static
    {
        $this->issKey2IsDisable = $issKey2IsDisable;

        return $this;
    }

    public function getIssBatchNumIsDisable(): ?string
    {
        return $this->issBatchNumIsDisable;
    }

    public function setIssBatchNumIsDisable(?string $issBatchNumIsDisable): static
    {
        $this->issBatchNumIsDisable = $issBatchNumIsDisable;

        return $this;
    }

    public function getIssExpiryDateIsDisable(): ?string
    {
        return $this->issExpiryDateIsDisable;
    }

    public function setIssExpiryDateIsDisable(?string $issExpiryDateIsDisable): static
    {
        $this->issExpiryDateIsDisable = $issExpiryDateIsDisable;

        return $this;
    }

    public function getRptProductMasterExcel(): ?string
    {
        return $this->rptProductMasterExcel;
    }

    public function setRptProductMasterExcel(?string $rptProductMasterExcel): static
    {
        $this->rptProductMasterExcel = $rptProductMasterExcel;

        return $this;
    }

    public function getRptDetailTransactionExcel(): ?string
    {
        return $this->rptDetailTransactionExcel;
    }

    public function setRptDetailTransactionExcel(?string $rptDetailTransactionExcel): static
    {
        $this->rptDetailTransactionExcel = $rptDetailTransactionExcel;

        return $this;
    }

    public function getRptReceiptDetailExcel(): ?string
    {
        return $this->rptReceiptDetailExcel;
    }

    public function setRptReceiptDetailExcel(?string $rptReceiptDetailExcel): static
    {
        $this->rptReceiptDetailExcel = $rptReceiptDetailExcel;

        return $this;
    }

    public function getRptDeliveryDetailExcel(): ?string
    {
        return $this->rptDeliveryDetailExcel;
    }

    public function setRptDeliveryDetailExcel(?string $rptDeliveryDetailExcel): static
    {
        $this->rptDeliveryDetailExcel = $rptDeliveryDetailExcel;

        return $this;
    }

    public function getRptScProduct(): ?string
    {
        return $this->rptScProduct;
    }

    public function setRptScProduct(?string $rptScProduct): static
    {
        $this->rptScProduct = $rptScProduct;

        return $this;
    }

    public function getRptScProductExcel(): ?string
    {
        return $this->rptScProductExcel;
    }

    public function setRptScProductExcel(?string $rptScProductExcel): static
    {
        $this->rptScProductExcel = $rptScProductExcel;

        return $this;
    }

    public function getRptScLocationLandscape(): ?string
    {
        return $this->rptScLocationLandscape;
    }

    public function setRptScLocationLandscape(?string $rptScLocationLandscape): static
    {
        $this->rptScLocationLandscape = $rptScLocationLandscape;

        return $this;
    }

    public function getRptScLocationPortrait(): ?string
    {
        return $this->rptScLocationPortrait;
    }

    public function setRptScLocationPortrait(?string $rptScLocationPortrait): static
    {
        $this->rptScLocationPortrait = $rptScLocationPortrait;

        return $this;
    }

    public function getRptScLocationExcel(): ?string
    {
        return $this->rptScLocationExcel;
    }

    public function setRptScLocationExcel(?string $rptScLocationExcel): static
    {
        $this->rptScLocationExcel = $rptScLocationExcel;

        return $this;
    }

    public function getRptTransferlocNote(): ?string
    {
        return $this->rptTransferlocNote;
    }

    public function setRptTransferlocNote(?string $rptTransferlocNote): static
    {
        $this->rptTransferlocNote = $rptTransferlocNote;

        return $this;
    }

    public function getRptAdjustmentNote(): ?string
    {
        return $this->rptAdjustmentNote;
    }

    public function setRptAdjustmentNote(?string $rptAdjustmentNote): static
    {
        $this->rptAdjustmentNote = $rptAdjustmentNote;

        return $this;
    }

    public function getIssBatchNumIsUnique(): ?string
    {
        return $this->issBatchNumIsUnique;
    }

    public function setIssBatchNumIsUnique(?string $issBatchNumIsUnique): static
    {
        $this->issBatchNumIsUnique = $issBatchNumIsUnique;

        return $this;
    }

    public function getIssKey1IsUnique(): ?string
    {
        return $this->issKey1IsUnique;
    }

    public function setIssKey1IsUnique(?string $issKey1IsUnique): static
    {
        $this->issKey1IsUnique = $issKey1IsUnique;

        return $this;
    }

    public function getIssKey2IsUnique(): ?string
    {
        return $this->issKey2IsUnique;
    }

    public function setIssKey2IsUnique(?string $issKey2IsUnique): static
    {
        $this->issKey2IsUnique = $issKey2IsUnique;

        return $this;
    }

    public function getIssExpiryDateIsUnique(): ?string
    {
        return $this->issExpiryDateIsUnique;
    }

    public function setIssExpiryDateIsUnique(?string $issExpiryDateIsUnique): static
    {
        $this->issExpiryDateIsUnique = $issExpiryDateIsUnique;

        return $this;
    }

    public function getRecPutawayQuickAssign(): ?string
    {
        return $this->recPutawayQuickAssign;
    }

    public function setRecPutawayQuickAssign(?string $recPutawayQuickAssign): static
    {
        $this->recPutawayQuickAssign = $recPutawayQuickAssign;

        return $this;
    }

    public function getRecValidateExpiryDate(): ?string
    {
        return $this->recValidateExpiryDate;
    }

    public function setRecValidateExpiryDate(?string $recValidateExpiryDate): static
    {
        $this->recValidateExpiryDate = $recValidateExpiryDate;

        return $this;
    }

    public function getIssExportFileMethod(): ?string
    {
        return $this->issExportFileMethod;
    }

    public function setIssExportFileMethod(?string $issExportFileMethod): static
    {
        $this->issExportFileMethod = $issExportFileMethod;

        return $this;
    }

    public function getRecExportFileMethod(): ?string
    {
        return $this->recExportFileMethod;
    }

    public function setRecExportFileMethod(?string $recExportFileMethod): static
    {
        $this->recExportFileMethod = $recExportFileMethod;

        return $this;
    }

    public function getRecImportClassName(): ?string
    {
        return $this->recImportClassName;
    }

    public function setRecImportClassName(?string $recImportClassName): static
    {
        $this->recImportClassName = $recImportClassName;

        return $this;
    }

    public function getRecExportClassName(): ?string
    {
        return $this->recExportClassName;
    }

    public function setRecExportClassName(?string $recExportClassName): static
    {
        $this->recExportClassName = $recExportClassName;

        return $this;
    }

    public function getIssImportClassName(): ?string
    {
        return $this->issImportClassName;
    }

    public function setIssImportClassName(?string $issImportClassName): static
    {
        $this->issImportClassName = $issImportClassName;

        return $this;
    }

    public function getIssExportClassName(): ?string
    {
        return $this->issExportClassName;
    }

    public function setIssExportClassName(?string $issExportClassName): static
    {
        $this->issExportClassName = $issExportClassName;

        return $this;
    }

    public function getRecManualExportEdi(): ?string
    {
        return $this->recManualExportEdi;
    }

    public function setRecManualExportEdi(?string $recManualExportEdi): static
    {
        $this->recManualExportEdi = $recManualExportEdi;

        return $this;
    }

    public function getIssManualExportEdi(): ?string
    {
        return $this->issManualExportEdi;
    }

    public function setIssManualExportEdi(?string $issManualExportEdi): static
    {
        $this->issManualExportEdi = $issManualExportEdi;

        return $this;
    }

    public function getIssAutoImportOrderPartial(): ?string
    {
        return $this->issAutoImportOrderPartial;
    }

    public function setIssAutoImportOrderPartial(?string $issAutoImportOrderPartial): static
    {
        $this->issAutoImportOrderPartial = $issAutoImportOrderPartial;

        return $this;
    }

    public function getIssRoute(): ?string
    {
        return $this->issRoute;
    }

    public function setIssRoute(?string $issRoute): static
    {
        $this->issRoute = $issRoute;

        return $this;
    }

    public function getOrdExportClassName(): ?string
    {
        return $this->ordExportClassName;
    }

    public function setOrdExportClassName(?string $ordExportClassName): static
    {
        $this->ordExportClassName = $ordExportClassName;

        return $this;
    }

    public function getOrdExportEdi(): ?string
    {
        return $this->ordExportEdi;
    }

    public function setOrdExportEdi(?string $ordExportEdi): static
    {
        $this->ordExportEdi = $ordExportEdi;

        return $this;
    }

    public function getOrdExportEdiDirectFtp(): ?string
    {
        return $this->ordExportEdiDirectFtp;
    }

    public function setOrdExportEdiDirectFtp(?string $ordExportEdiDirectFtp): static
    {
        $this->ordExportEdiDirectFtp = $ordExportEdiDirectFtp;

        return $this;
    }

    public function getOrdExportFileMethod(): ?string
    {
        return $this->ordExportFileMethod;
    }

    public function setOrdExportFileMethod(?string $ordExportFileMethod): static
    {
        $this->ordExportFileMethod = $ordExportFileMethod;

        return $this;
    }

    public function getOrdManualExportEdi(): ?string
    {
        return $this->ordManualExportEdi;
    }

    public function setOrdManualExportEdi(?string $ordManualExportEdi): static
    {
        $this->ordManualExportEdi = $ordManualExportEdi;

        return $this;
    }

    public function getRecReceiptExportClassName(): ?string
    {
        return $this->recReceiptExportClassName;
    }

    public function setRecReceiptExportClassName(?string $recReceiptExportClassName): static
    {
        $this->recReceiptExportClassName = $recReceiptExportClassName;

        return $this;
    }

    public function getRecReceiptExportEdi(): ?string
    {
        return $this->recReceiptExportEdi;
    }

    public function setRecReceiptExportEdi(?string $recReceiptExportEdi): static
    {
        $this->recReceiptExportEdi = $recReceiptExportEdi;

        return $this;
    }

    public function getRecReceiptManualExportEdi(): ?string
    {
        return $this->recReceiptManualExportEdi;
    }

    public function setRecReceiptManualExportEdi(?string $recReceiptManualExportEdi): static
    {
        $this->recReceiptManualExportEdi = $recReceiptManualExportEdi;

        return $this;
    }

    public function getIssPickLocModel(): ?string
    {
        return $this->issPickLocModel;
    }

    public function setIssPickLocModel(?string $issPickLocModel): static
    {
        $this->issPickLocModel = $issPickLocModel;

        return $this;
    }

    public function getRecValidatePo(): ?string
    {
        return $this->recValidatePo;
    }

    public function setRecValidatePo(?string $recValidatePo): static
    {
        $this->recValidatePo = $recValidatePo;

        return $this;
    }

    public function getImpRecNotAllowManualAD(): ?string
    {
        return $this->impRecNotAllowManualAD;
    }

    public function setImpRecNotAllowManualAD(?string $impRecNotAllowManualAD): static
    {
        $this->impRecNotAllowManualAD = $impRecNotAllowManualAD;

        return $this;
    }

    public function getOrdNotAllowManualAdddel(): ?string
    {
        return $this->ordNotAllowManualAdddel;
    }

    public function setOrdNotAllowManualAdddel(?string $ordNotAllowManualAdddel): static
    {
        $this->ordNotAllowManualAdddel = $ordNotAllowManualAdddel;

        return $this;
    }

    public function getRecAllowZeroQty(): ?string
    {
        return $this->recAllowZeroQty;
    }

    public function setRecAllowZeroQty(?string $recAllowZeroQty): static
    {
        $this->recAllowZeroQty = $recAllowZeroQty;

        return $this;
    }

    public function getWmstkWithMaxMinUom(): ?string
    {
        return $this->wmstkWithMaxMinUom;
    }

    public function setWmstkWithMaxMinUom(?string $wmstkWithMaxMinUom): static
    {
        $this->wmstkWithMaxMinUom = $wmstkWithMaxMinUom;

        return $this;
    }

    public function getDefRecNotAllowManualAD(): ?string
    {
        return $this->defRecNotAllowManualAD;
    }

    public function setDefRecNotAllowManualAD(?string $defRecNotAllowManualAD): static
    {
        $this->defRecNotAllowManualAD = $defRecNotAllowManualAD;

        return $this;
    }

    public function getWmstkMaxUom(): ?string
    {
        return $this->wmstkMaxUom;
    }

    public function setWmstkMaxUom(?string $wmstkMaxUom): static
    {
        $this->wmstkMaxUom = $wmstkMaxUom;

        return $this;
    }

    public function getRptOrderDetailListing(): ?string
    {
        return $this->rptOrderDetailListing;
    }

    public function setRptOrderDetailListing(?string $rptOrderDetailListing): static
    {
        $this->rptOrderDetailListing = $rptOrderDetailListing;

        return $this;
    }

    public function getRptOrderDetailExcel(): ?string
    {
        return $this->rptOrderDetailExcel;
    }

    public function setRptOrderDetailExcel(?string $rptOrderDetailExcel): static
    {
        $this->rptOrderDetailExcel = $rptOrderDetailExcel;

        return $this;
    }

    public function getValidateTransport(): ?string
    {
        return $this->validateTransport;
    }

    public function setValidateTransport(?string $validateTransport): static
    {
        $this->validateTransport = $validateTransport;

        return $this;
    }

    public function getImpRecNotAllowExceedQty(): ?string
    {
        return $this->impRecNotAllowExceedQty;
    }

    public function setImpRecNotAllowExceedQty(?string $impRecNotAllowExceedQty): static
    {
        $this->impRecNotAllowExceedQty = $impRecNotAllowExceedQty;

        return $this;
    }

    public function getIssCustomform2Label(): ?string
    {
        return $this->issCustomform2Label;
    }

    public function setIssCustomform2Label(?string $issCustomform2Label): static
    {
        $this->issCustomform2Label = $issCustomform2Label;

        return $this;
    }

    public function getIssCustomform1Label(): ?string
    {
        return $this->issCustomform1Label;
    }

    public function setIssCustomform1Label(?string $issCustomform1Label): static
    {
        $this->issCustomform1Label = $issCustomform1Label;

        return $this;
    }

    public function getRecCustomform2Label(): ?string
    {
        return $this->recCustomform2Label;
    }

    public function setRecCustomform2Label(?string $recCustomform2Label): static
    {
        $this->recCustomform2Label = $recCustomform2Label;

        return $this;
    }

    public function getRecCustomform1Label(): ?string
    {
        return $this->recCustomform1Label;
    }

    public function setRecCustomform1Label(?string $recCustomform1Label): static
    {
        $this->recCustomform1Label = $recCustomform1Label;

        return $this;
    }

    public function getNotAllowTransferGrade(): ?string
    {
        return $this->notAllowTransferGrade;
    }

    public function setNotAllowTransferGrade(?string $notAllowTransferGrade): static
    {
        $this->notAllowTransferGrade = $notAllowTransferGrade;

        return $this;
    }

    public function getIssMastKey2(): ?string
    {
        return $this->issMastKey2;
    }

    public function setIssMastKey2(?string $issMastKey2): static
    {
        $this->issMastKey2 = $issMastKey2;

        return $this;
    }

    public function getIssMastKey1(): ?string
    {
        return $this->issMastKey1;
    }

    public function setIssMastKey1(?string $issMastKey1): static
    {
        $this->issMastKey1 = $issMastKey1;

        return $this;
    }

    public function getIssMastExpiryDate(): ?string
    {
        return $this->issMastExpiryDate;
    }

    public function setIssMastExpiryDate(?string $issMastExpiryDate): static
    {
        $this->issMastExpiryDate = $issMastExpiryDate;

        return $this;
    }

    public function getIssMastBatchNo(): ?string
    {
        return $this->issMastBatchNo;
    }

    public function setIssMastBatchNo(?string $issMastBatchNo): static
    {
        $this->issMastBatchNo = $issMastBatchNo;

        return $this;
    }

    public function getRptIssueDo(): ?string
    {
        return $this->rptIssueDo;
    }

    public function setRptIssueDo(?string $rptIssueDo): static
    {
        $this->rptIssueDo = $rptIssueDo;

        return $this;
    }

    public function getConvertToUom(): ?string
    {
        return $this->convertToUom;
    }

    public function setConvertToUom(?string $convertToUom): static
    {
        $this->convertToUom = $convertToUom;

        return $this;
    }

    public function getIssImportOnlyBatchPartial(): ?string
    {
        return $this->issImportOnlyBatchPartial;
    }

    public function setIssImportOnlyBatchPartial(?string $issImportOnlyBatchPartial): static
    {
        $this->issImportOnlyBatchPartial = $issImportOnlyBatchPartial;

        return $this;
    }

    public function getRptPodExcel(): ?string
    {
        return $this->rptPodExcel;
    }

    public function setRptPodExcel(?string $rptPodExcel): static
    {
        $this->rptPodExcel = $rptPodExcel;

        return $this;
    }

    public function getIssPrimaryDoc(): ?string
    {
        return $this->issPrimaryDoc;
    }

    public function setIssPrimaryDoc(string $issPrimaryDoc): static
    {
        $this->issPrimaryDoc = $issPrimaryDoc;

        return $this;
    }

    public function getRecPrimaryDoc(): ?string
    {
        return $this->recPrimaryDoc;
    }

    public function setRecPrimaryDoc(string $recPrimaryDoc): static
    {
        $this->recPrimaryDoc = $recPrimaryDoc;

        return $this;
    }

    public function getIssValidatePo(): ?string
    {
        return $this->issValidatePo;
    }

    public function setIssValidatePo(?string $issValidatePo): static
    {
        $this->issValidatePo = $issValidatePo;

        return $this;
    }

    public function getRptOrderListing(): ?string
    {
        return $this->rptOrderListing;
    }

    public function setRptOrderListing(?string $rptOrderListing): static
    {
        $this->rptOrderListing = $rptOrderListing;

        return $this;
    }

    public function getRptOrderExcel(): ?string
    {
        return $this->rptOrderExcel;
    }

    public function setRptOrderExcel(?string $rptOrderExcel): static
    {
        $this->rptOrderExcel = $rptOrderExcel;

        return $this;
    }

    public function getIssDsnExpRreturnTndo(): ?string
    {
        return $this->issDsnExpRreturnTndo;
    }

    public function setIssDsnExpRreturnTndo(?string $issDsnExpRreturnTndo): static
    {
        $this->issDsnExpRreturnTndo = $issDsnExpRreturnTndo;

        return $this;
    }

    public function getIssDsnExpLoadingOnly(): ?string
    {
        return $this->issDsnExpLoadingOnly;
    }

    public function setIssDsnExpLoadingOnly(?string $issDsnExpLoadingOnly): static
    {
        $this->issDsnExpLoadingOnly = $issDsnExpLoadingOnly;

        return $this;
    }

    public function getIssDsnExpTnDo(): ?string
    {
        return $this->issDsnExpTnDo;
    }

    public function setIssDsnExpTnDo(?string $issDsnExpTnDo): static
    {
        $this->issDsnExpTnDo = $issDsnExpTnDo;

        return $this;
    }

    public function getIssDsnAsFilename(): ?string
    {
        return $this->issDsnAsFilename;
    }

    public function setIssDsnAsFilename(?string $issDsnAsFilename): static
    {
        $this->issDsnAsFilename = $issDsnAsFilename;

        return $this;
    }

    public function getIssDsnExportDo(): ?string
    {
        return $this->issDsnExportDo;
    }

    public function setIssDsnExportDo(?string $issDsnExportDo): static
    {
        $this->issDsnExportDo = $issDsnExportDo;

        return $this;
    }

    public function getManualMode(): ?string
    {
        return $this->manualMode;
    }

    public function setManualMode(?string $manualMode): static
    {
        $this->manualMode = $manualMode;

        return $this;
    }

    public function getInventoryLocationChkKey(): ?string
    {
        return $this->inventoryLocationChkKey;
    }

    public function setInventoryLocationChkKey(?string $inventoryLocationChkKey): static
    {
        $this->inventoryLocationChkKey = $inventoryLocationChkKey;

        return $this;
    }

    public function getInventoryPalletidChkKey(): ?string
    {
        return $this->inventoryPalletidChkKey;
    }

    public function setInventoryPalletidChkKey(?string $inventoryPalletidChkKey): static
    {
        $this->inventoryPalletidChkKey = $inventoryPalletidChkKey;

        return $this;
    }

    public function getScanningMode(): ?string
    {
        return $this->scanningMode;
    }

    public function setScanningMode(?string $scanningMode): static
    {
        $this->scanningMode = $scanningMode;

        return $this;
    }

    public function getMultiplePalletPerLoc(): ?string
    {
        return $this->multiplePalletPerLoc;
    }

    public function setMultiplePalletPerLoc(?string $multiplePalletPerLoc): static
    {
        $this->multiplePalletPerLoc = $multiplePalletPerLoc;

        return $this;
    }

    public function getValidateSuppVsItemPlant(): ?string
    {
        return $this->validateSuppVsItemPlant;
    }

    public function setValidateSuppVsItemPlant(?string $validateSuppVsItemPlant): static
    {
        $this->validateSuppVsItemPlant = $validateSuppVsItemPlant;

        return $this;
    }

    public function getSuppliercodeAutoKey1(): ?string
    {
        return $this->suppliercodeAutoKey1;
    }

    public function setSuppliercodeAutoKey1(?string $suppliercodeAutoKey1): static
    {
        $this->suppliercodeAutoKey1 = $suppliercodeAutoKey1;

        return $this;
    }

    public function getManualChangeScanningMode(): ?string
    {
        return $this->manualChangeScanningMode;
    }

    public function setManualChangeScanningMode(?string $manualChangeScanningMode): static
    {
        $this->manualChangeScanningMode = $manualChangeScanningMode;

        return $this;
    }

    public function getIssMastKey3(): ?string
    {
        return $this->issMastKey3;
    }

    public function setIssMastKey3(?string $issMastKey3): static
    {
        $this->issMastKey3 = $issMastKey3;

        return $this;
    }

    public function getIssMastKey4(): ?string
    {
        return $this->issMastKey4;
    }

    public function setIssMastKey4(?string $issMastKey4): static
    {
        $this->issMastKey4 = $issMastKey4;

        return $this;
    }

    public function getIssKey3(): ?string
    {
        return $this->issKey3;
    }

    public function setIssKey3(?string $issKey3): static
    {
        $this->issKey3 = $issKey3;

        return $this;
    }

    public function getIssKey4(): ?string
    {
        return $this->issKey4;
    }

    public function setIssKey4(?string $issKey4): static
    {
        $this->issKey4 = $issKey4;

        return $this;
    }

    public function getIssKey3Label(): ?string
    {
        return $this->issKey3Label;
    }

    public function setIssKey3Label(?string $issKey3Label): static
    {
        $this->issKey3Label = $issKey3Label;

        return $this;
    }

    public function getIssKey4Label(): ?string
    {
        return $this->issKey4Label;
    }

    public function setIssKey4Label(?string $issKey4Label): static
    {
        $this->issKey4Label = $issKey4Label;

        return $this;
    }

    public function getIssPartialKeyseqInOrder(): ?string
    {
        return $this->issPartialKeyseqInOrder;
    }

    public function setIssPartialKeyseqInOrder(?string $issPartialKeyseqInOrder): static
    {
        $this->issPartialKeyseqInOrder = $issPartialKeyseqInOrder;

        return $this;
    }

    public function getIssAllowDraftPicklist(): ?string
    {
        return $this->issAllowDraftPicklist;
    }

    public function setIssAllowDraftPicklist(?string $issAllowDraftPicklist): static
    {
        $this->issAllowDraftPicklist = $issAllowDraftPicklist;

        return $this;
    }

    public function getIssMastKey5(): ?string
    {
        return $this->issMastKey5;
    }

    public function setIssMastKey5(?string $issMastKey5): static
    {
        $this->issMastKey5 = $issMastKey5;

        return $this;
    }

    public function getIssKey5(): ?string
    {
        return $this->issKey5;
    }

    public function setIssKey5(?string $issKey5): static
    {
        $this->issKey5 = $issKey5;

        return $this;
    }

    public function getIssKey5Label(): ?string
    {
        return $this->issKey5Label;
    }

    public function setIssKey5Label(?string $issKey5Label): static
    {
        $this->issKey5Label = $issKey5Label;

        return $this;
    }

    public function getIssMastKey6(): ?string
    {
        return $this->issMastKey6;
    }

    public function setIssMastKey6(?string $issMastKey6): static
    {
        $this->issMastKey6 = $issMastKey6;

        return $this;
    }

    public function getIssKey6(): ?string
    {
        return $this->issKey6;
    }

    public function setIssKey6(?string $issKey6): static
    {
        $this->issKey6 = $issKey6;

        return $this;
    }

    public function getIssKey6Label(): ?string
    {
        return $this->issKey6Label;
    }

    public function setIssKey6Label(?string $issKey6Label): static
    {
        $this->issKey6Label = $issKey6Label;

        return $this;
    }

    public function getIssMastKey7(): ?string
    {
        return $this->issMastKey7;
    }

    public function setIssMastKey7(?string $issMastKey7): static
    {
        $this->issMastKey7 = $issMastKey7;

        return $this;
    }

    public function getIssKey7(): ?string
    {
        return $this->issKey7;
    }

    public function setIssKey7(?string $issKey7): static
    {
        $this->issKey7 = $issKey7;

        return $this;
    }

    public function getIssKey7Label(): ?string
    {
        return $this->issKey7Label;
    }

    public function setIssKey7Label(?string $issKey7Label): static
    {
        $this->issKey7Label = $issKey7Label;

        return $this;
    }

    public function getIssMastKey8(): ?string
    {
        return $this->issMastKey8;
    }

    public function setIssMastKey8(?string $issMastKey8): static
    {
        $this->issMastKey8 = $issMastKey8;

        return $this;
    }

    public function getIssKey8(): ?string
    {
        return $this->issKey8;
    }

    public function setIssKey8(?string $issKey8): static
    {
        $this->issKey8 = $issKey8;

        return $this;
    }

    public function getIssKey8Label(): ?string
    {
        return $this->issKey8Label;
    }

    public function setIssKey8Label(?string $issKey8Label): static
    {
        $this->issKey8Label = $issKey8Label;

        return $this;
    }

    public function getIssMastKey9(): ?string
    {
        return $this->issMastKey9;
    }

    public function setIssMastKey9(?string $issMastKey9): static
    {
        $this->issMastKey9 = $issMastKey9;

        return $this;
    }

    public function getIssKey9(): ?string
    {
        return $this->issKey9;
    }

    public function setIssKey9(?string $issKey9): static
    {
        $this->issKey9 = $issKey9;

        return $this;
    }

    public function getIssKey9Label(): ?string
    {
        return $this->issKey9Label;
    }

    public function setIssKey9Label(?string $issKey9Label): static
    {
        $this->issKey9Label = $issKey9Label;

        return $this;
    }

    public function getIssDefaultDoc3(): ?string
    {
        return $this->issDefaultDoc3;
    }

    public function setIssDefaultDoc3(?string $issDefaultDoc3): static
    {
        $this->issDefaultDoc3 = $issDefaultDoc3;

        return $this;
    }

    public function getRecDefaultDoc3(): ?string
    {
        return $this->recDefaultDoc3;
    }

    public function setRecDefaultDoc3(?string $recDefaultDoc3): static
    {
        $this->recDefaultDoc3 = $recDefaultDoc3;

        return $this;
    }

    public function getStorerKey(): ?string
    {
        return $this->storerKey;
    }

    public function setStorerKey(?string $storerKey): static
    {
        $this->storerKey = $storerKey;

        return $this;
    }

    public function getRecAutofillDetail(): ?string
    {
        return $this->recAutofillDetail;
    }

    public function setRecAutofillDetail(?string $recAutofillDetail): static
    {
        $this->recAutofillDetail = $recAutofillDetail;

        return $this;
    }

    public function getRptIssueInvoice(): ?string
    {
        return $this->rptIssueInvoice;
    }

    public function setRptIssueInvoice(?string $rptIssueInvoice): static
    {
        $this->rptIssueInvoice = $rptIssueInvoice;

        return $this;
    }

    public function getRptPackingList(): ?string
    {
        return $this->rptPackingList;
    }

    public function setRptPackingList(?string $rptPackingList): static
    {
        $this->rptPackingList = $rptPackingList;

        return $this;
    }

    public function getRecdPrice(): ?string
    {
        return $this->recdPrice;
    }

    public function setRecdPrice(?string $recdPrice): static
    {
        $this->recdPrice = $recdPrice;

        return $this;
    }

    public function getRptBillChrgs(): ?string
    {
        return $this->rptBillChrgs;
    }

    public function setRptBillChrgs(?string $rptBillChrgs): static
    {
        $this->rptBillChrgs = $rptBillChrgs;

        return $this;
    }

    public function getOrdAllowExtraQty(): ?string
    {
        return $this->ordAllowExtraQty;
    }

    public function setOrdAllowExtraQty(?string $ordAllowExtraQty): static
    {
        $this->ordAllowExtraQty = $ordAllowExtraQty;

        return $this;
    }

    public function getRptConsoCustomsInvoice(): ?string
    {
        return $this->rptConsoCustomsInvoice;
    }

    public function setRptConsoCustomsInvoice(?string $rptConsoCustomsInvoice): static
    {
        $this->rptConsoCustomsInvoice = $rptConsoCustomsInvoice;

        return $this;
    }

    public function getIsCommCodeRequired(): ?string
    {
        return $this->isCommCodeRequired;
    }

    public function setIsCommCodeRequired(?string $isCommCodeRequired): static
    {
        $this->isCommCodeRequired = $isCommCodeRequired;

        return $this;
    }

    public function getIssBatchNumAutoFill(): ?string
    {
        return $this->issBatchNumAutoFill;
    }

    public function setIssBatchNumAutoFill(?string $issBatchNumAutoFill): static
    {
        $this->issBatchNumAutoFill = $issBatchNumAutoFill;

        return $this;
    }

    public function getOrdRequireItemsChecking(): ?string
    {
        return $this->ordRequireItemsChecking;
    }

    public function setOrdRequireItemsChecking(?string $ordRequireItemsChecking): static
    {
        $this->ordRequireItemsChecking = $ordRequireItemsChecking;

        return $this;
    }

    public function getRecPutawayControlItem(): ?string
    {
        return $this->recPutawayControlItem;
    }

    public function setRecPutawayControlItem(?string $recPutawayControlItem): static
    {
        $this->recPutawayControlItem = $recPutawayControlItem;

        return $this;
    }

    public function getRecDoc2AutoKey7(): ?string
    {
        return $this->recDoc2AutoKey7;
    }

    public function setRecDoc2AutoKey7(?string $recDoc2AutoKey7): static
    {
        $this->recDoc2AutoKey7 = $recDoc2AutoKey7;

        return $this;
    }

    public function getIssMastPrice(): ?string
    {
        return $this->issMastPrice;
    }

    public function setIssMastPrice(?string $issMastPrice): static
    {
        $this->issMastPrice = $issMastPrice;

        return $this;
    }

    public function getRecDoc3AutoKey9(): ?string
    {
        return $this->recDoc3AutoKey9;
    }

    public function setRecDoc3AutoKey9(?string $recDoc3AutoKey9): static
    {
        $this->recDoc3AutoKey9 = $recDoc3AutoKey9;

        return $this;
    }

    public function getIssAutoManualPickQty(): ?string
    {
        return $this->issAutoManualPickQty;
    }

    public function setIssAutoManualPickQty(?string $issAutoManualPickQty): static
    {
        $this->issAutoManualPickQty = $issAutoManualPickQty;

        return $this;
    }

    public function getIssDoc3Editable(): ?string
    {
        return $this->issDoc3Editable;
    }

    public function setIssDoc3Editable(?string $issDoc3Editable): static
    {
        $this->issDoc3Editable = $issDoc3Editable;

        return $this;
    }

    public function getIssDoc4Editable(): ?string
    {
        return $this->issDoc4Editable;
    }

    public function setIssDoc4Editable(?string $issDoc4Editable): static
    {
        $this->issDoc4Editable = $issDoc4Editable;

        return $this;
    }

    public function getIssDisAPickManualNtAllow(): ?string
    {
        return $this->issDisAPickManualNtAllow;
    }

    public function setIssDisAPickManualNtAllow(?string $issDisAPickManualNtAllow): static
    {
        $this->issDisAPickManualNtAllow = $issDisAPickManualNtAllow;

        return $this;
    }

    public function getAuditFieldsDetail(): ?string
    {
        return $this->auditFieldsDetail;
    }

    public function setAuditFieldsDetail(?string $auditFieldsDetail): static
    {
        $this->auditFieldsDetail = $auditFieldsDetail;

        return $this;
    }

    public function getAuditFieldsHeader(): ?string
    {
        return $this->auditFieldsHeader;
    }

    public function setAuditFieldsHeader(?string $auditFieldsHeader): static
    {
        $this->auditFieldsHeader = $auditFieldsHeader;

        return $this;
    }

    public function getIssAutoAddAcct(): ?string
    {
        return $this->issAutoAddAcct;
    }

    public function setIssAutoAddAcct(?string $issAutoAddAcct): static
    {
        $this->issAutoAddAcct = $issAutoAddAcct;

        return $this;
    }

    public function getBatchNumRegex(): ?string
    {
        return $this->batchNumRegex;
    }

    public function setBatchNumRegex(?string $batchNumRegex): static
    {
        $this->batchNumRegex = $batchNumRegex;

        return $this;
    }

    public function getIssPickingListSorting(): ?string
    {
        return $this->issPickingListSorting;
    }

    public function setIssPickingListSorting(?string $issPickingListSorting): static
    {
        $this->issPickingListSorting = $issPickingListSorting;

        return $this;
    }

    public function getIssAllowInsuffQty(): ?string
    {
        return $this->issAllowInsuffQty;
    }

    public function setIssAllowInsuffQty(?string $issAllowInsuffQty): static
    {
        $this->issAllowInsuffQty = $issAllowInsuffQty;

        return $this;
    }

    public function getRptIssueExcel(): ?string
    {
        return $this->rptIssueExcel;
    }

    public function setRptIssueExcel(?string $rptIssueExcel): static
    {
        $this->rptIssueExcel = $rptIssueExcel;

        return $this;
    }

    public function getIssPickQtyOptimization(): ?string
    {
        return $this->issPickQtyOptimization;
    }

    public function setIssPickQtyOptimization(?string $issPickQtyOptimization): static
    {
        $this->issPickQtyOptimization = $issPickQtyOptimization;

        return $this;
    }

    public function getRptDoGroupBy(): ?string
    {
        return $this->rptDoGroupBy;
    }

    public function setRptDoGroupBy(?string $rptDoGroupBy): static
    {
        $this->rptDoGroupBy = $rptDoGroupBy;

        return $this;
    }

    public function getRptScLotnoExcel(): ?string
    {
        return $this->rptScLotnoExcel;
    }

    public function setRptScLotnoExcel(?string $rptScLotnoExcel): static
    {
        $this->rptScLotnoExcel = $rptScLotnoExcel;

        return $this;
    }

    public function getRptScLotnoPortrait(): ?string
    {
        return $this->rptScLotnoPortrait;
    }

    public function setRptScLotnoPortrait(?string $rptScLotnoPortrait): static
    {
        $this->rptScLotnoPortrait = $rptScLotnoPortrait;

        return $this;
    }

    public function getRptScLotnoLandscape(): ?string
    {
        return $this->rptScLotnoLandscape;
    }

    public function setRptScLotnoLandscape(?string $rptScLotnoLandscape): static
    {
        $this->rptScLotnoLandscape = $rptScLotnoLandscape;

        return $this;
    }

    public function getRptScProductLandscape(): ?string
    {
        return $this->rptScProductLandscape;
    }

    public function setRptScProductLandscape(?string $rptScProductLandscape): static
    {
        $this->rptScProductLandscape = $rptScProductLandscape;

        return $this;
    }

    public function getRptScProductPortrait(): ?string
    {
        return $this->rptScProductPortrait;
    }

    public function setRptScProductPortrait(?string $rptScProductPortrait): static
    {
        $this->rptScProductPortrait = $rptScProductPortrait;

        return $this;
    }

    public function getIssConfirmValidateDoc3(): ?string
    {
        return $this->issConfirmValidateDoc3;
    }

    public function setIssConfirmValidateDoc3(?string $issConfirmValidateDoc3): static
    {
        $this->issConfirmValidateDoc3 = $issConfirmValidateDoc3;

        return $this;
    }

    public function getTransferAutoQtyOnHand(): ?string
    {
        return $this->transferAutoQtyOnHand;
    }

    public function setTransferAutoQtyOnHand(?string $transferAutoQtyOnHand): static
    {
        $this->transferAutoQtyOnHand = $transferAutoQtyOnHand;

        return $this;
    }

    public function getIsAllowPrintRecNote(): ?string
    {
        return $this->isAllowPrintRecNote;
    }

    public function setIsAllowPrintRecNote(string $isAllowPrintRecNote): static
    {
        $this->isAllowPrintRecNote = $isAllowPrintRecNote;

        return $this;
    }

    public function getRptDoKeySeq(): ?string
    {
        return $this->rptDoKeySeq;
    }

    public function setRptDoKeySeq(?string $rptDoKeySeq): static
    {
        $this->rptDoKeySeq = $rptDoKeySeq;

        return $this;
    }

    public function getRptBillBySuppExcel(): ?string
    {
        return $this->rptBillBySuppExcel;
    }

    public function setRptBillBySuppExcel(?string $rptBillBySuppExcel): static
    {
        $this->rptBillBySuppExcel = $rptBillBySuppExcel;

        return $this;
    }

    public function getIssEditEtaDate(): ?string
    {
        return $this->issEditEtaDate;
    }

    public function setIssEditEtaDate(?string $issEditEtaDate): static
    {
        $this->issEditEtaDate = $issEditEtaDate;

        return $this;
    }

    public function getRptBillBySuppWithLoc(): ?string
    {
        return $this->rptBillBySuppWithLoc;
    }

    public function setRptBillBySuppWithLoc(?string $rptBillBySuppWithLoc): static
    {
        $this->rptBillBySuppWithLoc = $rptBillBySuppWithLoc;

        return $this;
    }

    public function getImpRecAutoAddNewItem(): ?string
    {
        return $this->impRecAutoAddNewItem;
    }

    public function setImpRecAutoAddNewItem(?string $impRecAutoAddNewItem): static
    {
        $this->impRecAutoAddNewItem = $impRecAutoAddNewItem;

        return $this;
    }

    public function getPutAllowBatchNo(): ?string
    {
        return $this->putAllowBatchNo;
    }

    public function setPutAllowBatchNo(?string $putAllowBatchNo): static
    {
        $this->putAllowBatchNo = $putAllowBatchNo;

        return $this;
    }

    public function getPutMastBatchNo(): ?string
    {
        return $this->putMastBatchNo;
    }

    public function setPutMastBatchNo(?string $putMastBatchNo): static
    {
        $this->putMastBatchNo = $putMastBatchNo;

        return $this;
    }

    public function getIssImportInboundClassName(): ?string
    {
        return $this->issImportInboundClassName;
    }

    public function setIssImportInboundClassName(?string $issImportInboundClassName): static
    {
        $this->issImportInboundClassName = $issImportInboundClassName;

        return $this;
    }

    public function getIssImportOutboundClassName(): ?string
    {
        return $this->issImportOutboundClassName;
    }

    public function setIssImportOutboundClassName(?string $issImportOutboundClassName): static
    {
        $this->issImportOutboundClassName = $issImportOutboundClassName;

        return $this;
    }

    public function getRptInboundDetailExcel(): ?string
    {
        return $this->rptInboundDetailExcel;
    }

    public function setRptInboundDetailExcel(?string $rptInboundDetailExcel): static
    {
        $this->rptInboundDetailExcel = $rptInboundDetailExcel;

        return $this;
    }

    public function getRptOutboundDetailExcel(): ?string
    {
        return $this->rptOutboundDetailExcel;
    }

    public function setRptOutboundDetailExcel(?string $rptOutboundDetailExcel): static
    {
        $this->rptOutboundDetailExcel = $rptOutboundDetailExcel;

        return $this;
    }

    public function getRecBatchNoRegex(): ?string
    {
        return $this->recBatchNoRegex;
    }

    public function setRecBatchNoRegex(?string $recBatchNoRegex): static
    {
        $this->recBatchNoRegex = $recBatchNoRegex;

        return $this;
    }

    public function getIssCustomInvCurr(): ?string
    {
        return $this->issCustomInvCurr;
    }

    public function setIssCustomInvCurr(?string $issCustomInvCurr): static
    {
        $this->issCustomInvCurr = $issCustomInvCurr;

        return $this;
    }

    public function getRecPutKey2NullAutoDate(): ?string
    {
        return $this->recPutKey2NullAutoDate;
    }

    public function setRecPutKey2NullAutoDate(?string $recPutKey2NullAutoDate): static
    {
        $this->recPutKey2NullAutoDate = $recPutKey2NullAutoDate;

        return $this;
    }

    public function getIssLookupbatch(): ?string
    {
        return $this->issLookupbatch;
    }

    public function setIssLookupbatch(string $issLookupbatch): static
    {
        $this->issLookupbatch = $issLookupbatch;

        return $this;
    }

    public function getRptbarcode(): ?string
    {
        return $this->rptbarcode;
    }

    public function setRptbarcode(?string $rptbarcode): static
    {
        $this->rptbarcode = $rptbarcode;

        return $this;
    }

    public function getRptIssBarcode(): ?string
    {
        return $this->rptIssBarcode;
    }

    public function setRptIssBarcode(?string $rptIssBarcode): static
    {
        $this->rptIssBarcode = $rptIssBarcode;

        return $this;
    }

    public function getIsSameLoccode(): ?string
    {
        return $this->isSameLoccode;
    }

    public function setIsSameLoccode(string $isSameLoccode): static
    {
        $this->isSameLoccode = $isSameLoccode;

        return $this;
    }

    public function getIsRptTakeUom(): ?string
    {
        return $this->isRptTakeUom;
    }

    public function setIsRptTakeUom(string $isRptTakeUom): static
    {
        $this->isRptTakeUom = $isRptTakeUom;

        return $this;
    }

    public function getItemImportClassName(): ?string
    {
        return $this->itemImportClassName;
    }

    public function setItemImportClassName(?string $itemImportClassName): static
    {
        $this->itemImportClassName = $itemImportClassName;

        return $this;
    }

    public function getRptCplSqlSorting(): ?string
    {
        return $this->rptCplSqlSorting;
    }

    public function setRptCplSqlSorting(?string $rptCplSqlSorting): static
    {
        $this->rptCplSqlSorting = $rptCplSqlSorting;

        return $this;
    }

    public function getRptCplPdf(): ?string
    {
        return $this->rptCplPdf;
    }

    public function setRptCplPdf(?string $rptCplPdf): static
    {
        $this->rptCplPdf = $rptCplPdf;

        return $this;
    }

    public function getMobilePutawayMode(): ?string
    {
        return $this->mobilePutawayMode;
    }

    public function setMobilePutawayMode(?string $mobilePutawayMode): static
    {
        $this->mobilePutawayMode = $mobilePutawayMode;

        return $this;
    }

    public function getRecReceiptPartialRetrieve(): ?string
    {
        return $this->recReceiptPartialRetrieve;
    }

    public function setRecReceiptPartialRetrieve(?string $recReceiptPartialRetrieve): static
    {
        $this->recReceiptPartialRetrieve = $recReceiptPartialRetrieve;

        return $this;
    }

    public function getIssIsReferenceItemDesc(): ?string
    {
        return $this->issIsReferenceItemDesc;
    }

    public function setIssIsReferenceItemDesc(?string $issIsReferenceItemDesc): static
    {
        $this->issIsReferenceItemDesc = $issIsReferenceItemDesc;

        return $this;
    }

    public function getRptBarcodeProduct(): ?string
    {
        return $this->rptBarcodeProduct;
    }

    public function setRptBarcodeProduct(?string $rptBarcodeProduct): static
    {
        $this->rptBarcodeProduct = $rptBarcodeProduct;

        return $this;
    }

    public function getMobileDirectRec(): ?string
    {
        return $this->mobileDirectRec;
    }

    public function setMobileDirectRec(?string $mobileDirectRec): static
    {
        $this->mobileDirectRec = $mobileDirectRec;

        return $this;
    }

    public function getMobilePrinter(): ?string
    {
        return $this->mobilePrinter;
    }

    public function setMobilePrinter(?string $mobilePrinter): static
    {
        $this->mobilePrinter = $mobilePrinter;

        return $this;
    }

    public function getIsImportApi(): ?string
    {
        return $this->isImportApi;
    }

    public function setIsImportApi(?string $isImportApi): static
    {
        $this->isImportApi = $isImportApi;

        return $this;
    }

    public function getRptStockAgingExcel(): ?string
    {
        return $this->rptStockAgingExcel;
    }

    public function setRptStockAgingExcel(?string $rptStockAgingExcel): static
    {
        $this->rptStockAgingExcel = $rptStockAgingExcel;

        return $this;
    }

    public function getScAllowPurge(): ?string
    {
        return $this->scAllowPurge;
    }

    public function setScAllowPurge(?string $scAllowPurge): static
    {
        $this->scAllowPurge = $scAllowPurge;

        return $this;
    }

    public function getScAllowReconcilation(): ?string
    {
        return $this->scAllowReconcilation;
    }

    public function setScAllowReconcilation(?string $scAllowReconcilation): static
    {
        $this->scAllowReconcilation = $scAllowReconcilation;

        return $this;
    }

    public function getPrintReceiptLabel(): ?string
    {
        return $this->printReceiptLabel;
    }

    public function setPrintReceiptLabel(?string $printReceiptLabel): static
    {
        $this->printReceiptLabel = $printReceiptLabel;

        return $this;
    }

    public function getRptPickingNoteSummaryExcel(): ?string
    {
        return $this->rptPickingNoteSummaryExcel;
    }

    public function setRptPickingNoteSummaryExcel(?string $rptPickingNoteSummaryExcel): static
    {
        $this->rptPickingNoteSummaryExcel = $rptPickingNoteSummaryExcel;

        return $this;
    }

    public function getRptPickingNoteSummary(): ?string
    {
        return $this->rptPickingNoteSummary;
    }

    public function setRptPickingNoteSummary(?string $rptPickingNoteSummary): static
    {
        $this->rptPickingNoteSummary = $rptPickingNoteSummary;

        return $this;
    }

    public function getRptPsc(): ?string
    {
        return $this->rptPsc;
    }

    public function setRptPsc(?string $rptPsc): static
    {
        $this->rptPsc = $rptPsc;

        return $this;
    }

    public function getIsIssImpByFeild(): ?string
    {
        return $this->isIssImpByFeild;
    }

    public function setIsIssImpByFeild(?string $isIssImpByFeild): static
    {
        $this->isIssImpByFeild = $isIssImpByFeild;

        return $this;
    }

    public function getIssImpFeildClassName(): ?string
    {
        return $this->issImpFeildClassName;
    }

    public function setIssImpFeildClassName(?string $issImpFeildClassName): static
    {
        $this->issImpFeildClassName = $issImpFeildClassName;

        return $this;
    }

    public function getImpOrderByTextHaed(): ?string
    {
        return $this->impOrderByTextHaed;
    }

    public function setImpOrderByTextHaed(?string $impOrderByTextHaed): static
    {
        $this->impOrderByTextHaed = $impOrderByTextHaed;

        return $this;
    }

    public function getIsLocationByScan(): ?string
    {
        return $this->isLocationByScan;
    }

    public function setIsLocationByScan(?string $isLocationByScan): static
    {
        $this->isLocationByScan = $isLocationByScan;

        return $this;
    }

    public function getIsPutawayScanItemValidate(): ?string
    {
        return $this->isPutawayScanItemValidate;
    }

    public function setIsPutawayScanItemValidate(?string $isPutawayScanItemValidate): static
    {
        $this->isPutawayScanItemValidate = $isPutawayScanItemValidate;

        return $this;
    }

    public function getRecCustPoEqualBatchNo(): ?string
    {
        return $this->recCustPoEqualBatchNo;
    }

    public function setRecCustPoEqualBatchNo(?string $recCustPoEqualBatchNo): static
    {
        $this->recCustPoEqualBatchNo = $recCustPoEqualBatchNo;

        return $this;
    }

    public function getIssDirectConfirm(): ?string
    {
        return $this->issDirectConfirm;
    }

    public function setIssDirectConfirm(?string $issDirectConfirm): static
    {
        $this->issDirectConfirm = $issDirectConfirm;

        return $this;
    }

    public function getRecImpUpFeildClassName(): ?string
    {
        return $this->recImpUpFeildClassName;
    }

    public function setRecImpUpFeildClassName(?string $recImpUpFeildClassName): static
    {
        $this->recImpUpFeildClassName = $recImpUpFeildClassName;

        return $this;
    }

    public function getImpUpRecByTextHaed(): ?string
    {
        return $this->impUpRecByTextHaed;
    }

    public function setImpUpRecByTextHaed(?string $impUpRecByTextHaed): static
    {
        $this->impUpRecByTextHaed = $impUpRecByTextHaed;

        return $this;
    }

    public function getIsRecImpUpByFeild(): ?string
    {
        return $this->isRecImpUpByFeild;
    }

    public function setIsRecImpUpByFeild(?string $isRecImpUpByFeild): static
    {
        $this->isRecImpUpByFeild = $isRecImpUpByFeild;

        return $this;
    }

    public function getCustomMonthlyRptExcelNew(): ?string
    {
        return $this->customMonthlyRptExcelNew;
    }

    public function setCustomMonthlyRptExcelNew(?string $customMonthlyRptExcelNew): static
    {
        $this->customMonthlyRptExcelNew = $customMonthlyRptExcelNew;

        return $this;
    }

    public function getIsAutoPutawayPreLocCode(): ?string
    {
        return $this->isAutoPutawayPreLocCode;
    }

    public function setIsAutoPutawayPreLocCode(?string $isAutoPutawayPreLocCode): static
    {
        $this->isAutoPutawayPreLocCode = $isAutoPutawayPreLocCode;

        return $this;
    }

    public function getRptIssExportExcel(): ?string
    {
        return $this->rptIssExportExcel;
    }

    public function setRptIssExportExcel(?string $rptIssExportExcel): static
    {
        $this->rptIssExportExcel = $rptIssExportExcel;

        return $this;
    }

    public function getRptDetailTransByItemExcel(): ?string
    {
        return $this->rptDetailTransByItemExcel;
    }

    public function setRptDetailTransByItemExcel(?string $rptDetailTransByItemExcel): static
    {
        $this->rptDetailTransByItemExcel = $rptDetailTransByItemExcel;

        return $this;
    }

    public function getRptProductListingExcel(): ?string
    {
        return $this->rptProductListingExcel;
    }

    public function setRptProductListingExcel(?string $rptProductListingExcel): static
    {
        $this->rptProductListingExcel = $rptProductListingExcel;

        return $this;
    }

    public function getRptWhseStorageExcel(): ?string
    {
        return $this->rptWhseStorageExcel;
    }

    public function setRptWhseStorageExcel(?string $rptWhseStorageExcel): static
    {
        $this->rptWhseStorageExcel = $rptWhseStorageExcel;

        return $this;
    }

    public function getIssScanByPickingRetrieve(): ?string
    {
        return $this->issScanByPickingRetrieve;
    }

    public function setIssScanByPickingRetrieve(?string $issScanByPickingRetrieve): static
    {
        $this->issScanByPickingRetrieve = $issScanByPickingRetrieve;

        return $this;
    }

    public function getRetrieveIssueTargetCust(): ?string
    {
        return $this->retrieveIssueTargetCust;
    }

    public function setRetrieveIssueTargetCust(?string $retrieveIssueTargetCust): static
    {
        $this->retrieveIssueTargetCust = $retrieveIssueTargetCust;

        return $this;
    }

    public function getIsMultipleRetrieveIssue(): ?string
    {
        return $this->isMultipleRetrieveIssue;
    }

    public function setIsMultipleRetrieveIssue(?string $isMultipleRetrieveIssue): static
    {
        $this->isMultipleRetrieveIssue = $isMultipleRetrieveIssue;

        return $this;
    }

    public function getRptIssueDetailNote(): ?string
    {
        return $this->rptIssueDetailNote;
    }

    public function setRptIssueDetailNote(?string $rptIssueDetailNote): static
    {
        $this->rptIssueDetailNote = $rptIssueDetailNote;

        return $this;
    }

    public function getIsAllowPalletidAdj(): ?string
    {
        return $this->isAllowPalletidAdj;
    }

    public function setIsAllowPalletidAdj(?string $isAllowPalletidAdj): static
    {
        $this->isAllowPalletidAdj = $isAllowPalletidAdj;

        return $this;
    }

    public function getIsChkOrderPostalCode(): ?string
    {
        return $this->isChkOrderPostalCode;
    }

    public function setIsChkOrderPostalCode(?string $isChkOrderPostalCode): static
    {
        $this->isChkOrderPostalCode = $isChkOrderPostalCode;

        return $this;
    }

    public function getIsExportIssApi(): ?string
    {
        return $this->isExportIssApi;
    }

    public function setIsExportIssApi(?string $isExportIssApi): static
    {
        $this->isExportIssApi = $isExportIssApi;

        return $this;
    }

    public function getIsExportRecApi(): ?string
    {
        return $this->isExportRecApi;
    }

    public function setIsExportRecApi(?string $isExportRecApi): static
    {
        $this->isExportRecApi = $isExportRecApi;

        return $this;
    }

    public function getRptOrderExternalList(): ?string
    {
        return $this->rptOrderExternalList;
    }

    public function setRptOrderExternalList(?string $rptOrderExternalList): static
    {
        $this->rptOrderExternalList = $rptOrderExternalList;

        return $this;
    }

    public function getIsIssPrintInvCups(): ?string
    {
        return $this->isIssPrintInvCups;
    }

    public function setIsIssPrintInvCups(?string $isIssPrintInvCups): static
    {
        $this->isIssPrintInvCups = $isIssPrintInvCups;

        return $this;
    }

    public function getIsKey1VsExpiry(): ?string
    {
        return $this->isKey1VsExpiry;
    }

    public function setIsKey1VsExpiry(?string $isKey1VsExpiry): static
    {
        $this->isKey1VsExpiry = $isKey1VsExpiry;

        return $this;
    }

    public function getImpRecProductMatchCategory(): ?string
    {
        return $this->impRecProductMatchCategory;
    }

    public function setImpRecProductMatchCategory(?string $impRecProductMatchCategory): static
    {
        $this->impRecProductMatchCategory = $impRecProductMatchCategory;

        return $this;
    }

    public function getIsRmDoFileToArch(): ?string
    {
        return $this->isRmDoFileToArch;
    }

    public function setIsRmDoFileToArch(?string $isRmDoFileToArch): static
    {
        $this->isRmDoFileToArch = $isRmDoFileToArch;

        return $this;
    }

    public function getOrdPickingLooseAlert(): ?string
    {
        return $this->ordPickingLooseAlert;
    }

    public function setOrdPickingLooseAlert(?string $ordPickingLooseAlert): static
    {
        $this->ordPickingLooseAlert = $ordPickingLooseAlert;

        return $this;
    }

    public function getIsIssShelfLifeByAcct(): ?string
    {
        return $this->isIssShelfLifeByAcct;
    }

    public function setIsIssShelfLifeByAcct(?string $isIssShelfLifeByAcct): static
    {
        $this->isIssShelfLifeByAcct = $isIssShelfLifeByAcct;

        return $this;
    }

    public function getDsnReportType(): ?string
    {
        return $this->dsnReportType;
    }

    public function setDsnReportType(?string $dsnReportType): static
    {
        $this->dsnReportType = $dsnReportType;

        return $this;
    }

    public function getTnetApiUrlPrintLabel(): ?string
    {
        return $this->tnetApiUrlPrintLabel;
    }

    public function setTnetApiUrlPrintLabel(?string $tnetApiUrlPrintLabel): static
    {
        $this->tnetApiUrlPrintLabel = $tnetApiUrlPrintLabel;

        return $this;
    }

    public function getRptDetailTransTruckExcel(): ?string
    {
        return $this->rptDetailTransTruckExcel;
    }

    public function setRptDetailTransTruckExcel(?string $rptDetailTransTruckExcel): static
    {
        $this->rptDetailTransTruckExcel = $rptDetailTransTruckExcel;

        return $this;
    }

    public function getTrExportViewType(): ?string
    {
        return $this->trExportViewType;
    }

    public function setTrExportViewType(?string $trExportViewType): static
    {
        $this->trExportViewType = $trExportViewType;

        return $this;
    }

    public function getIsIssShelfLifeByItem(): ?string
    {
        return $this->isIssShelfLifeByItem;
    }

    public function setIsIssShelfLifeByItem(?string $isIssShelfLifeByItem): static
    {
        $this->isIssShelfLifeByItem = $isIssShelfLifeByItem;

        return $this;
    }

    public function getRptIsWmpickTmp(): ?string
    {
        return $this->rptIsWmpickTmp;
    }

    public function setRptIsWmpickTmp(?string $rptIsWmpickTmp): static
    {
        $this->rptIsWmpickTmp = $rptIsWmpickTmp;

        return $this;
    }

    public function getAdjImpClassname(): ?string
    {
        return $this->adjImpClassname;
    }

    public function setAdjImpClassname(?string $adjImpClassname): static
    {
        $this->adjImpClassname = $adjImpClassname;

        return $this;
    }

    public function getRptDelivDetailByItemGroup(): ?string
    {
        return $this->rptDelivDetailByItemGroup;
    }

    public function setRptDelivDetailByItemGroup(?string $rptDelivDetailByItemGroup): static
    {
        $this->rptDelivDetailByItemGroup = $rptDelivDetailByItemGroup;

        return $this;
    }

    public function getIssManualPickKey1(): ?string
    {
        return $this->issManualPickKey1;
    }

    public function setIssManualPickKey1(?string $issManualPickKey1): static
    {
        $this->issManualPickKey1 = $issManualPickKey1;

        return $this;
    }

    public function getImpApiOutboundUrl(): ?string
    {
        return $this->impApiOutboundUrl;
    }

    public function setImpApiOutboundUrl(?string $impApiOutboundUrl): static
    {
        $this->impApiOutboundUrl = $impApiOutboundUrl;

        return $this;
    }

    public function getImportApiLoginCredential(): ?string
    {
        return $this->importApiLoginCredential;
    }

    public function setImportApiLoginCredential(?string $importApiLoginCredential): static
    {
        $this->importApiLoginCredential = $importApiLoginCredential;

        return $this;
    }

    public function getImportApiKeycode(): ?string
    {
        return $this->importApiKeycode;
    }

    public function setImportApiKeycode(?string $importApiKeycode): static
    {
        $this->importApiKeycode = $importApiKeycode;

        return $this;
    }

    public function getIsImportRecApi(): ?string
    {
        return $this->isImportRecApi;
    }

    public function setIsImportRecApi(?string $isImportRecApi): static
    {
        $this->isImportRecApi = $isImportRecApi;

        return $this;
    }

    public function getWhseCodeApi(): ?string
    {
        return $this->whseCodeApi;
    }

    public function setWhseCodeApi(?string $whseCodeApi): static
    {
        $this->whseCodeApi = $whseCodeApi;

        return $this;
    }

    public function getIsTrfReason(): ?string
    {
        return $this->isTrfReason;
    }

    public function setIsTrfReason(?string $isTrfReason): static
    {
        $this->isTrfReason = $isTrfReason;

        return $this;
    }

    public function getIsTrfTranscode(): ?string
    {
        return $this->isTrfTranscode;
    }

    public function setIsTrfTranscode(?string $isTrfTranscode): static
    {
        $this->isTrfTranscode = $isTrfTranscode;

        return $this;
    }

    public function getIssAutoAddAcctType(): ?string
    {
        return $this->issAutoAddAcctType;
    }

    public function setIssAutoAddAcctType(?string $issAutoAddAcctType): static
    {
        $this->issAutoAddAcctType = $issAutoAddAcctType;

        return $this;
    }

    public function getIssFutureExpiryDate(): ?string
    {
        return $this->issFutureExpiryDate;
    }

    public function setIssFutureExpiryDate(?string $issFutureExpiryDate): static
    {
        $this->issFutureExpiryDate = $issFutureExpiryDate;

        return $this;
    }

    public function getIssExportViewType(): ?string
    {
        return $this->issExportViewType;
    }

    public function setIssExportViewType(?string $issExportViewType): static
    {
        $this->issExportViewType = $issExportViewType;

        return $this;
    }

    public function getRecPutawayExportViewType(): ?string
    {
        return $this->recPutawayExportViewType;
    }

    public function setRecPutawayExportViewType(?string $recPutawayExportViewType): static
    {
        $this->recPutawayExportViewType = $recPutawayExportViewType;

        return $this;
    }

    public function getRptWhseStockTransExcel(): ?string
    {
        return $this->rptWhseStockTransExcel;
    }

    public function setRptWhseStockTransExcel(?string $rptWhseStockTransExcel): static
    {
        $this->rptWhseStockTransExcel = $rptWhseStockTransExcel;

        return $this;
    }

    public function getTrAutoFillLocCode(): ?string
    {
        return $this->trAutoFillLocCode;
    }

    public function setTrAutoFillLocCode(?string $trAutoFillLocCode): static
    {
        $this->trAutoFillLocCode = $trAutoFillLocCode;

        return $this;
    }

    public function getTrAutoFillQty(): ?string
    {
        return $this->trAutoFillQty;
    }

    public function setTrAutoFillQty(?string $trAutoFillQty): static
    {
        $this->trAutoFillQty = $trAutoFillQty;

        return $this;
    }

    public function getIsAdjExportEdi(): ?string
    {
        return $this->isAdjExportEdi;
    }

    public function setIsAdjExportEdi(?string $isAdjExportEdi): static
    {
        $this->isAdjExportEdi = $isAdjExportEdi;

        return $this;
    }

    public function getAdjExportClassName(): ?string
    {
        return $this->adjExportClassName;
    }

    public function setAdjExportClassName(?string $adjExportClassName): static
    {
        $this->adjExportClassName = $adjExportClassName;

        return $this;
    }

    public function getRptDetailTranExceldetails(): ?string
    {
        return $this->rptDetailTranExceldetails;
    }

    public function setRptDetailTranExceldetails(?string $rptDetailTranExceldetails): static
    {
        $this->rptDetailTranExceldetails = $rptDetailTranExceldetails;

        return $this;
    }

    public function getIssBatchnumDateLabel(): ?string
    {
        return $this->issBatchnumDateLabel;
    }

    public function setIssBatchnumDateLabel(?string $issBatchnumDateLabel): static
    {
        $this->issBatchnumDateLabel = $issBatchnumDateLabel;

        return $this;
    }

    public function getIsImpCheckDuplicateDetail(): ?string
    {
        return $this->isImpCheckDuplicateDetail;
    }

    public function setIsImpCheckDuplicateDetail(?string $isImpCheckDuplicateDetail): static
    {
        $this->isImpCheckDuplicateDetail = $isImpCheckDuplicateDetail;

        return $this;
    }

    public function getImprecNotAllowRemove(): ?string
    {
        return $this->imprecNotAllowRemove;
    }

    public function setImprecNotAllowRemove(?string $imprecNotAllowRemove): static
    {
        $this->imprecNotAllowRemove = $imprecNotAllowRemove;

        return $this;
    }

    public function getImpChkFullPallet(): ?string
    {
        return $this->impChkFullPallet;
    }

    public function setImpChkFullPallet(?string $impChkFullPallet): static
    {
        $this->impChkFullPallet = $impChkFullPallet;

        return $this;
    }

    public function getDisableColDefaultAsrsLoc(): ?string
    {
        return $this->disableColDefaultAsrsLoc;
    }

    public function setDisableColDefaultAsrsLoc(?string $disableColDefaultAsrsLoc): static
    {
        $this->disableColDefaultAsrsLoc = $disableColDefaultAsrsLoc;

        return $this;
    }

    public function getDefaultAsrsLoc(): ?string
    {
        return $this->defaultAsrsLoc;
    }

    public function setDefaultAsrsLoc(?string $defaultAsrsLoc): static
    {
        $this->defaultAsrsLoc = $defaultAsrsLoc;

        return $this;
    }

    public function getRetFromIssueAllowExport(): ?string
    {
        return $this->retFromIssueAllowExport;
    }

    public function setRetFromIssueAllowExport(?string $retFromIssueAllowExport): static
    {
        $this->retFromIssueAllowExport = $retFromIssueAllowExport;

        return $this;
    }

    public function getIssMovetypeExpissue(): ?string
    {
        return $this->issMovetypeExpissue;
    }

    public function setIssMovetypeExpissue(?string $issMovetypeExpissue): static
    {
        $this->issMovetypeExpissue = $issMovetypeExpissue;

        return $this;
    }

    public function getImpOrderSendmailRecipient(): ?string
    {
        return $this->impOrderSendmailRecipient;
    }

    public function setImpOrderSendmailRecipient(?string $impOrderSendmailRecipient): static
    {
        $this->impOrderSendmailRecipient = $impOrderSendmailRecipient;

        return $this;
    }

    public function getImpOrderEmail(): ?string
    {
        return $this->impOrderEmail;
    }

    public function setImpOrderEmail(?string $impOrderEmail): static
    {
        $this->impOrderEmail = $impOrderEmail;

        return $this;
    }

    public function getIssImportOrderValidate(): ?string
    {
        return $this->issImportOrderValidate;
    }

    public function setIssImportOrderValidate(?string $issImportOrderValidate): static
    {
        $this->issImportOrderValidate = $issImportOrderValidate;

        return $this;
    }

    public function getTrManualExportEdi(): ?string
    {
        return $this->trManualExportEdi;
    }

    public function setTrManualExportEdi(?string $trManualExportEdi): static
    {
        $this->trManualExportEdi = $trManualExportEdi;

        return $this;
    }

    public function getTrExportClassName(): ?string
    {
        return $this->trExportClassName;
    }

    public function setTrExportClassName(?string $trExportClassName): static
    {
        $this->trExportClassName = $trExportClassName;

        return $this;
    }

    public function getTrExportEdi(): ?string
    {
        return $this->trExportEdi;
    }

    public function setTrExportEdi(?string $trExportEdi): static
    {
        $this->trExportEdi = $trExportEdi;

        return $this;
    }

    public function getTrImportClassName(): ?string
    {
        return $this->trImportClassName;
    }

    public function setTrImportClassName(?string $trImportClassName): static
    {
        $this->trImportClassName = $trImportClassName;

        return $this;
    }

    public function getRecMastRefQtyMovetype(): ?string
    {
        return $this->recMastRefQtyMovetype;
    }

    public function setRecMastRefQtyMovetype(?string $recMastRefQtyMovetype): static
    {
        $this->recMastRefQtyMovetype = $recMastRefQtyMovetype;

        return $this;
    }


}
