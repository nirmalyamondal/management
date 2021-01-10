<?php
namespace AshokaTree\Management\Domain\Model;


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
 * Ticket
 */
class Ticket extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * customer
     * 
     * @var int
     */
    protected $customer = 0;

    /**
     * product
     * 
     * @var int
     */
    protected $product = 0;

    /**
     * technician
     * 
     * @var int
     */
    protected $technician = 0;

    /**
     * type
     * 
     * @var int
     */
    protected $type = 0;

    /**
     * priority
     * 
     * @var int
     */
    protected $priority = 0;

    /**
     * status
     * 
     * @var int
     */
    protected $status = 0;

    /**
     * place
     * 
     * @var int
     */
    protected $place = 0;

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * passcode
     * 
     * @var string
     */
    protected $passcode = '';

    /**
     * address
     * 
     * @var string
     */
    protected $address = '';

    /**
     * note
     * 
     * @var string
     */
    protected $note = '';

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
     * Returns the product
     * 
     * @return int $product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Sets the product
     * 
     * @param int $product
     * @return void
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * Returns the technician
     * 
     * @return int $technician
     */
    public function getTechnician()
    {
        return $this->technician;
    }

    /**
     * Sets the technician
     * 
     * @param int $technician
     * @return void
     */
    public function setTechnician($technician)
    {
        $this->technician = $technician;
    }

    /**
     * Returns the type
     * 
     * @return int $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     * 
     * @param int $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the priority
     * 
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Sets the priority
     * 
     * @param int $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Returns the status
     * 
     * @return int $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     * 
     * @param int $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the place
     * 
     * @return int $place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Sets the place
     * 
     * @param int $place
     * @return void
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the passcode
     * 
     * @return string $passcode
     */
    public function getPasscode()
    {
        return $this->passcode;
    }

    /**
     * Sets the passcode
     * 
     * @param string $passcode
     * @return void
     */
    public function setPasscode($passcode)
    {
        $this->passcode = $passcode;
    }

    /**
     * Returns the address
     * 
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     * 
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
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

    /**
     * @var \DateTime
     */
    protected $crdate = null;

    /**
     * Returns the creation date
     *
     * @return \DateTime $crdate
     */
    public function getCrdate()
    {
        return $this->crdate;
    }
}
