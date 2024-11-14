<?php

namespace App\Entity\oracle\WMS_TN;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * MasterDocument
 *
 * @ORM\Table(name="master_document")
 * @ORM\Entity
 */
class MasterDocument
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
     * @ORM\Column(name="MODULE_KEY", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $moduleKey;

    /**
     * @var string
     *
     * @ORM\Column(name="TRANS_TYPE", type="string", length=5, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $transType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="PREFIX", type="string", length=5, nullable=true)
     */
    private $prefix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SURFIX", type="string", length=5, nullable=true)
     */
    private $surfix;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CURR_NO", type="integer", nullable=true)
     */
    private $currNo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="NEXT_NO", type="integer", nullable=true)
     */
    private $nextNo;

    /**
     * @var int|null
     *
     * @ORM\Column(name="INCREMENTOR", type="integer", nullable=true, options={"default"="1"})
     */
    private $incrementor = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ACTIVE", type="string", length=1, nullable=true, options={"default"="N","fixed"=true})
     */
    private $active = 'N';

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC_1", type="string", length=50, nullable=true)
     */
    private $doc1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC_2", type="string", length=50, nullable=true)
     */
    private $doc2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC_3", type="string", length=50, nullable=true)
     */
    private $doc3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DOC_4", type="string", length=50, nullable=true)
     */
    private $doc4;

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
     * @ORM\Column(name="RESERVE_LOCK", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $reserveLock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RESERVE_HST", type="string", length=40, nullable=true)
     */
    private $reserveHst;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RESERVE_COPY", type="integer", nullable=true)
     */
    private $reserveCopy;

     
    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    public function setCompanyCode($companyCode)
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    public function getBranchCode()
    {
        return $this->branchCode;
    }

    public function setBranchCode($branchCode)
    {
        $this->branchCode = $branchCode;
        return $this;
    }

    public function getWhseCode()
    {
        return $this->whseCode;
    }

    public function setWhseCode($whseCode)
    {
        $this->whseCode = $whseCode;
        return $this;
    }

    public function getCustCode()
    {
        return $this->custCode;
    }

    public function setCustCode($custCode)
    {
        $this->custCode = $custCode;
        return $this;
    }

    public function getModuleKey()
    {
        return $this->moduleKey;
    }

    public function setModuleKey($moduleKey)
    {
        $this->moduleKey = $moduleKey;
        return $this;
    }

    public function getTransType()
    {
        return $this->transType;
    }

    public function setTransType($transType)
    {
        $this->transType = $transType;
        return $this;
    }

    public function getPrefix()
    {
        return $this->prefix;
    }

    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function getSurfix()
    {
        return $this->surfix;
    }

    public function setSurfix($surfix)
    {
        $this->surfix = $surfix;
        return $this;
    }

    public function getCurrNo()
    {
        return $this->currNo;
    }

    public function setCurrNo($currNo)
    {
        $this->currNo = $currNo;
        return $this;
    }

    public function getNextNo()
    {
        return $this->nextNo;
    }

    public function setNextNo($nextNo)
    {
        $this->nextNo = $nextNo;
        return $this;
    }

    public function getIncrementor()
    {
        return $this->incrementor;
    }

    public function setIncrementor($incrementor)
    {
        $this->incrementor = $incrementor;
        return $this;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    public function getDoc1()
    {
        return $this->doc1;
    }

    public function setDoc1($doc1)
    {
        $this->doc1 = $doc1;
        return $this;
    }

    public function getDoc2()
    {
        return $this->doc2;
    }

    public function setDoc2($doc2)
    {
        $this->doc2 = $doc2;
        return $this;
    }

    public function getDoc3()
    {
        return $this->doc3;
    }

    public function setDoc3($doc3)
    {
        $this->doc3 = $doc3;
        return $this;
    }

    public function getDoc4()
    {
        return $this->doc4;
    }

    public function setDoc4($doc4)
    {
        $this->doc4 = $doc4;
        return $this;
    }

    public function getUserCreatedDatetime()
    {
        return $this->userCreatedDatetime;
    }

    public function setUserCreatedDatetime($userCreatedDatetime)
    {
        $this->userCreatedDatetime = $userCreatedDatetime;
        return $this;
    }

    public function getUserUpdateDatetime()
    {
        return $this->userUpdateDatetime;
    }

    public function setUserUpdateDatetime($userUpdateDatetime)
    {
        $this->userUpdateDatetime = $userUpdateDatetime;
        return $this;
    }

    public function getUserCreatedId()
    {
        return $this->userCreatedId;
    }

    public function setUserCreatedId($userCreatedId)
    {
        $this->userCreatedId = $userCreatedId;
        return $this;
    }

    public function getUserUpdateId()
    {
        return $this->userUpdateId;
    }

    public function setUserUpdateId($userUpdateId)
    {
        $this->userUpdateId = $userUpdateId;
        return $this;
    }

    public function getReserveLock()
    {
        return $this->reserveLock;
    }

    public function setReserveLock($reserveLock)
    {
        $this->reserveLock = $reserveLock;
        return $this;
    }

    public function getReserveHst()
    {
        return $this->reserveHst;
    }

    public function setReserveHst($reserveHst)
    {
        $this->reserveHst = $reserveHst;
        return $this;
    }

    public function getReserveCopy()
    {
        return $this->reserveCopy;
    }

    public function setReserveCopy($reserveCopy)
    {
        $this->reserveCopy = $reserveCopy;
        return $this;
    }


}
