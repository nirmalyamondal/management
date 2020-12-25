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
 * Message
 */
class Message extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * ticket
     * 
     * @var int
     */
    protected $ticket = 0;

    /**
     * user
     * 
     * @var int
     */
    protected $user = 0;

    /**
     * message
     * 
     * @var string
     */
    protected $message = '';

    /**
     * date
     * 
     * @var \DateTime
     */
    protected $date = null;

    /**
     * Returns the ticket
     * 
     * @return int $ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Sets the ticket
     * 
     * @param int $ticket
     * @return void
     */
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Returns the user
     * 
     * @return int $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user
     * 
     * @param int $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Returns the message
     * 
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the message
     * 
     * @param string $message
     * @return void
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Returns the date
     * 
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     * 
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
}
