<?php
namespace AshokaTree\Management\Controller;

use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
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
 * TicketController
 */
class TicketController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    var $placeArray = [1 => 'Carry In - Service Center', 2 => 'Onsite - Home Service'];

    /**
     * ticketRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\TicketRepository
     */
    protected $ticketRepository = null;

    /**
     * @param \AshokaTree\Management\Domain\Repository\TicketRepository $ticketRepository
     */
    public function injectTicketRepository(\AshokaTree\Management\Domain\Repository\TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    /**
     * statusRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\StatusRepository
     * @inject
     */
    protected $statusRepository = null;

    /**
     * Inject a Status repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\StatusRepository $statusRepository
     */
    public function injectStatusRepository(\AshokaTree\Management\Domain\Repository\StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * priorityRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\PriorityRepository
     * @inject
     */
    protected $priorityRepository = null;

    /**
     * Inject a Priority repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\PriorityRepository $priorityRepository
     */
    public function injectPriorityRepository(\AshokaTree\Management\Domain\Repository\PriorityRepository $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }

    /**
     * typeRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\TypeRepository
     * @inject
     */
    protected $typeRepository = null;

    /**
     * Inject a Type repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\TypeRepository $typeRepository
     */
    public function injectTypeRepository(\AshokaTree\Management\Domain\Repository\TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    /**
     * customerRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\CustomerRepository
     * @inject
     */
    protected $customerRepository = null;

    /**
     * Inject a Customer repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\CustomerRepository $customerRepository
     */
    public function injectCustomerRepository(\AshokaTree\Management\Domain\Repository\CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * productRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = null;

    /**
     * Inject a Product repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(\AshokaTree\Management\Domain\Repository\ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * technicianRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\TechnicianRepository
     * @inject
     */
    protected $technicianRepository = null;

    /**
     * Inject a Technician repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\TechnicianRepository $technicianRepository
     */
    public function injectTechnicianRepository(\AshokaTree\Management\Domain\Repository\TechnicianRepository $technicianRepository)
    {
        $this->technicianRepository = $technicianRepository;
    }

    /**
     * categoryRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = null;

    /**
     * Inject a Technician repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(\AshokaTree\Management\Domain\Repository\CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * brandRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\BrandRepository
     * @inject
     */
    protected $brandRepository = null;

    /**
     * Inject a Technician repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\BrandRepository $brandRepository
     */
    public function injectBrandRepository(\AshokaTree\Management\Domain\Repository\BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * messageRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\MessageRepository
     * @inject
     */
    protected $messageRepository = null;

    /**
     * Inject a Message repository to enable DI
     *
     * @param \AshokaTree\Management\Domain\Repository\MessageRepository $messageRepository
     */
    public function injectMessageRepository(\AshokaTree\Management\Domain\Repository\MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $tickets = $this->ticketRepository->findAll();
        $customerAll          = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        foreach($customerAll as $customerObj) {  $customerArray[$customerObj->getUid()] = $customerObj->getName().'<br/>'.$customerObj->getUsername(); }
        $statusAll          = $this->statusRepository->findAll();
        foreach($statusAll as $statusObj) {  $statusArray[$statusObj->getUid()] = $statusObj->getName(); }
        $typeAll          = $this->typeRepository->findAll();
        foreach($typeAll as $typeObj) {  $typeArray[$typeObj->getUid()] = $typeObj->getName(); }
        $priorityAll          = $this->priorityRepository->findAll();
        foreach($priorityAll as $priorityObj) {  $priorityArray[$priorityObj->getUid()] = $priorityObj->getName(); }
        $categoryAll          = $this->categoryRepository->findAll();
        foreach($categoryAll as $categoryObj) {  $categoryArray[$categoryObj->getUid()] = $categoryObj->getName(); }
        $brandAll          = $this->brandRepository->findAll();
        foreach($brandAll as $brandObj) {  $brandArray[$brandObj->getUid()] = $brandObj->getName(); }
        $technicianAll       = $this->technicianRepository->findAllByPid($this->settings['technicianPid']);
        foreach($technicianAll as $technicianObj) { 
            $technicianArray[$technicianObj->getUid()] = $technicianObj->getName().'<br/>'.$technicianObj->getUsername(); 
        }
        $productAll          = $this->productRepository->findAll();
        foreach($productAll as $productObj) {  
            $puid = $productObj->getUid();
            $pserial = $productObj->getSerial();
            $pcategory = $productObj->getCategory();
            $pbrand = $productObj->getBrand();
            $productArray[$puid] = $pserial.'<br/>'.$categoryArray[$pcategory].' - '.$brandArray[$pbrand]; 
        }
        $newTickets = [];
        foreach ($tickets as $ticket) {
            $newObj = new \stdClass();
            $newObj->uid = $ticket->getUid();
            $newObj->customer = $customerArray[$ticket->getCustomer()];
            $newObj->product = $productArray[$ticket->getProduct()];
            $newObj->technician = $technicianArray[$ticket->getTechnician()];
            $newObj->type = $typeArray[$ticket->getType()];
            $newObj->priority = $priorityArray[$ticket->getPriority()];
            $newObj->status = $statusArray[$ticket->getStatus()];
            $newObj->passcode = $ticket->getPasscode();
            $newTickets[] = $newObj;
        }
        $this->view->assign('tickets', $newTickets);
    }

    /**
     * action show
     * 
     * @param \AshokaTree\Management\Domain\Model\Ticket $ticket
     * @return void
     */
    public function showAction(\AshokaTree\Management\Domain\Model\Ticket $ticket)
    {
        $this->view->assign('ticket', $ticket);
        $statusDetail = $this->statusRepository->findByUid($ticket->getStatus());
        $this->view->assign('statusDetail', $statusDetail);        
        $typeDetail = $this->typeRepository->findByUid($ticket->getType());
        $this->view->assign('typeDetail', $typeDetail);
        $priorityDetail = $this->priorityRepository->findByUid($ticket->getPriority());
        $this->view->assign('priorityDetail', $priorityDetail);
        $customerDetail = $this->customerRepository->findByUid($ticket->getCustomer());
        $this->view->assign('customerDetail', $customerDetail);
        $technicianDetail = $this->technicianRepository->findByUid($ticket->getTechnician());
        $this->view->assign('technicianDetail', $technicianDetail);
        $productDetail = $this->productRepository->findByUid($ticket->getProduct());
        $this->view->assign('productDetail', $productDetail);
        $categoryDetail = $this->categoryRepository->findByUid($productDetail->getCategory());
        $this->view->assign('categoryDetail', $categoryDetail);
        $brandDetail = $this->brandRepository->findByUid($productDetail->getBrand());
        $this->view->assign('brandDetail', $brandDetail);
        $this->view->assign('placeDetail', $this->placeArray[$ticket->getPlace()]);
        $messages = $this->messageRepository->findByTicket($ticket->getUid());
        $newMessages = [];
        if($messages && count($messages) > 0) {
           foreach($messages as $message) {
                $newObj = new \stdClass();
                $newObj->uid = $message->getUid();
                $newObj->user = $this->customerRepository->findByUid($message->getUser());
                $newObj->message = $message->getMessage();
                $newObj->date = $message->getDate();
                $newMessages[] = $newObj;
            }
            $this->view->assign('messages', $newMessages);
        }
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        $statusAll          = $this->statusRepository->findAll();
        $this->view->assign('statusAllProcess', $this->auxStatusTypePriorityObjectProcess($statusAll));
        $typeAll          = $this->typeRepository->findAll();
        $this->view->assign('typeAllProcess', $this->auxStatusTypePriorityObjectProcess($typeAll));
        $priorityAll          = $this->priorityRepository->findAll();
        $this->view->assign('priorityAllProcess', $this->auxStatusTypePriorityObjectProcess($priorityAll));
        $customerAll          = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        $this->view->assign('customerAllProcess', $this->auxCustomerTechnicianObjectProcess($customerAll));
        $technicianAll          = $this->technicianRepository->findAllByPid($this->settings['technicianPid']);
        $this->view->assign('technicianAllProcess', $this->auxCustomerTechnicianObjectProcess($technicianAll));
        $productAll          = $this->productRepository->findAll();
        $categoryAllObj          = $this->categoryRepository->findAll();
        foreach($categoryAllObj as $categoryObj) {  $categoryArr[$categoryObj->getUid()] = $categoryObj->getName(); }
        $brandAllObj          = $this->brandRepository->findAll();
        foreach($brandAllObj as $brandObj) {  $brandArr[$brandObj->getUid()] = $brandObj->getName(); }
        $this->view->assign('productAllProcess', $this->auxProductObjectProcess($productAll,$categoryArr,$brandArr));
        $this->view->assign('passcode', mt_rand(100000,999999));
    }

    /**
     * action create
     * 
     * @param \AshokaTree\Management\Domain\Model\Ticket $newTicket
     * @return void
     */
    public function createAction(\AshokaTree\Management\Domain\Model\Ticket $newTicket)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ticketRepository->add($newTicket);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \AshokaTree\Management\Domain\Model\Ticket $ticket
     * @ignorevalidation $ticket
     * @return void
     */
    public function editAction(\AshokaTree\Management\Domain\Model\Ticket $ticket)
    {
        $this->view->assign('ticket', $ticket);
        $statusAll          = $this->statusRepository->findAll();
        $this->view->assign('statusAllProcess', $this->auxStatusTypePriorityObjectProcess($statusAll));
        $typeAll          = $this->typeRepository->findAll();
        $this->view->assign('typeAllProcess', $this->auxStatusTypePriorityObjectProcess($typeAll));
        $priorityAll          = $this->priorityRepository->findAll();
        $this->view->assign('priorityAllProcess', $this->auxStatusTypePriorityObjectProcess($priorityAll));
        $customerAll          = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        $this->view->assign('customerAllProcess', $this->auxCustomerTechnicianObjectProcess($customerAll));
        $technicianAll          = $this->technicianRepository->findAllByPid($this->settings['technicianPid']);
        $this->view->assign('technicianAllProcess', $this->auxCustomerTechnicianObjectProcess($technicianAll));
        $productAll          = $this->productRepository->findAll();
        $categoryAllObj          = $this->categoryRepository->findAll();
        foreach($categoryAllObj as $categoryObj) {  $categoryArr[$categoryObj->getUid()] = $categoryObj->getName(); }
        $brandAllObj          = $this->brandRepository->findAll();
        foreach($brandAllObj as $brandObj) {  $brandArr[$brandObj->getUid()] = $brandObj->getName(); }
        $this->view->assign('productAllProcess', $this->auxProductObjectProcess($productAll,$categoryArr,$brandArr));
    }

    /**
     * action update
     * 
     * @param \AshokaTree\Management\Domain\Model\Ticket $ticket
     * @return void
     */
    public function updateAction(\AshokaTree\Management\Domain\Model\Ticket $ticket)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ticketRepository->update($ticket);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \AshokaTree\Management\Domain\Model\Ticket $ticket
     * @return void
     */
    public function deleteAction(\AshokaTree\Management\Domain\Model\Ticket $ticket)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->ticketRepository->remove($ticket);
        $this->redirect('list');
    }


    public function auxStatusTypePriorityObjectProcess($objectAll) {
        $newObjects = [];
        foreach ($objectAll as $object) {
            $newObj = new \stdClass();
            $newObj->key = $object->getUid();
            $newObj->value = $object->getName();
            $newObjects[] = $newObj;
        }
    return $newObjects;
    }
    
    public function auxCustomerTechnicianObjectProcess($objectAll) {
        $newObjects = [];
        foreach ($objectAll as $object) {
            $newObj = new \stdClass();
            $newObj->key = $object->getUid();
            $newObj->value = $object->getUsername().' - '.$object->getName();
            $newObjects[] = $newObj;
        }
    return $newObjects;
    }

    public function auxProductObjectProcess($objectAll,$categoryArr,$brandArr) {
        $newObjects = [];
        foreach ($objectAll as $object) {
            $newObj = new \stdClass();
            $newObj->key = $object->getUid();
            $newObj->value = $object->getSerial().' - '.$categoryArr[$object->getCategory()].' - '.$brandArr[$object->getBrand()];
            //$newObj->value = LocalizationUtility::translate('newObj.' . $object->getName(), 'management');
            $newObjects[] = $newObj;
        }
    return $newObjects;
    }

    public function auxMessageObjectProcess($objectAll,$userArr) {
        $newObjects = [];
        foreach ($objectAll as $object) {
            $newObj = new \stdClass();
            $newObj->key = $object->getUid();
            $newObj->value = $object->getSerial().' - '.$categoryArr[$object->getCategory()].' - '.$brandArr[$object->getBrand()];
            //$newObj->value = LocalizationUtility::translate('newObj.' . $object->getName(), 'management');
            $newObjects[] = $newObj;
        }
    return $newObjects;
    }

}
