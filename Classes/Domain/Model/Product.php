<?php
namespace AshokaTree\Management\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***
 *
 * This file is part of the "Management" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Nirmalya Mondal <nirmalya.mondal@gmail.com>, https://ashokatree.net/
 *
 ***/
/**
 * Product
 */
class Product extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * invoice
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @DatabaseField("\TYPO3\CMS\Extbase\Domain\Model\FileReference")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $invoice = null;

    /**
     * customer
     * 
     * @var int
     */
    protected $customer = 0;

    /**
     * category
     * 
     * @var int
     */
    protected $category = 0;

    /**
     * brand
     * 
     * @var int
     */
    protected $brand = 0;

    /**
     * serial
     * 
     * @var string
     */
    protected $serial = '';

    /**
     * pdate
     * 
     * @var \DateTime
     */
    protected $pdate = null;

    /**
     * amcstart
     * 
     * @var \DateTime
     */
    protected $amcstart = null;

    /**
     * amcexpire
     * 
     * @var \DateTime
     */
    protected $amcexpire = null;

    /**
     * note
     * 
     * @var string
     */
    protected $note = '';

    /**
     * Build up the object.
     */
    public function __construct()
    {
        $this->invoice = new ObjectStorage();
    }

    /**
     * Returns the invoice
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Sets the invoice
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $invoice
     * @return void
     */
    public function setInvoice(\TYPO3\CMS\Extbase\Domain\Model\FileReference $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Returns the customer
     * 
     * @return int $customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets the customer
     * 
     * @param int $customer
     * @return void
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Returns the category
     * 
     * @return int $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     * 
     * @param int $category
     * @return void
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns the brand
     * 
     * @return int $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets the brand
     * 
     * @param int $brand
     * @return void
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * Returns the serial
     * 
     * @return string $serial
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Sets the serial
     * 
     * @param string $serial
     * @return void
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * Returns the pdate
     * 
     * @return \DateTime $pdate
     */
    public function getPdate()
    {
        return $this->pdate;
    }

    /**
     * Sets the pdate
     * 
     * @param \DateTime $pdate
     * @return void
     */
    public function setPdate(\DateTime $pdate = null)
    {
        $this->pdate = $pdate;
    }

    /**
     * Returns the amcstart
     * 
     * @return \DateTime $amcstart
     */
    public function getAmcstart()
    {
        return $this->amcstart;
    }

    /**
     * Sets the amcstart
     * 
     * @param \DateTime $amcstart
     * @return void
     */
    public function setAmcstart(\DateTime $amcstart = null)
    {
        $this->amcstart = $amcstart;
    }

    /**
     * Returns the amcexpire
     * 
     * @return \DateTime $amcexpire
     */
    public function getAmcexpire()
    {
        return $this->amcexpire;
    }

    /**
     * Sets the amcexpire
     * 
     * @param \DateTime $amcexpire
     * @return void
     */
    public function setAmcexpire(\DateTime $amcexpire = null)
    {
        $this->amcexpire = $amcexpire;
    }

    /**
     * Returns the note
     * 
     * @return string $note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets the note
     * 
     * @param string $note
     * @return void
     */
    public function setNote($note)
    {
        $this->note = $note;
    }
}
