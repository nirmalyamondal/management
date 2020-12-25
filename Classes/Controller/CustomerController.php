<?php
namespace AshokaTree\Management\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Connection;

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
 * CustomerController
 */
class CustomerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * customerRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\CustomerRepository
     */
    protected $customerRepository = null;

    /**
     * @param \AshokaTree\Management\Domain\Repository\CustomerRepository $customerRepository
     */
    public function injectCustomerRepository(\AshokaTree\Management\Domain\Repository\CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $customers = $this->customerRepository->findAll();
        $this->view->assign('customers', $customers);
    }

    /**
     * action show
     * 
     * @param \AshokaTree\Management\Domain\Model\Customer $customer
     * @return void
     */
    public function showAction(\AshokaTree\Management\Domain\Model\Customer $customer)
    {
        $this->view->assign('customer', $customer);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     * 
     * @param \AshokaTree\Management\Domain\Model\Customer $newCustomer
     * @return void
     */
    public function createAction(\AshokaTree\Management\Domain\Model\Customer $newCustomer)
    {    
        $newCustomer->setPid($this->settings['storagePid']);
        $newCustomer->setUsergroup($this->settings['usergroup']);
        $newCustomer->setPassword($this->settings['defaultpwd']);
        $username   = $newCustomer->getUsername();
        $userExistOrNot = $this->auxUserAlreadyExist($username);
        if($userExistOrNot) {
            $this->addFlashMessage('Username '.$username.' already exist! ', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->redirect('new');
        }
        $this->addFlashMessage('New user has been Added with username: '.$username, '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->add($newCustomer);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \AshokaTree\Management\Domain\Model\Customer $customer
     * @ignorevalidation $customer
     * @return void
     */
    public function editAction(\AshokaTree\Management\Domain\Model\Customer $customer)
    {
        $this->view->assign('customer', $customer);
    }

    /**
     * action update
     * 
     * @param \AshokaTree\Management\Domain\Model\Customer $customer
     * @return void
     */
    public function updateAction(\AshokaTree\Management\Domain\Model\Customer $customer)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->update($customer);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \AshokaTree\Management\Domain\Model\Customer $customer
     * @return void
     */
    public function deleteAction(\AshokaTree\Management\Domain\Model\Customer $customer)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->customerRepository->remove($customer);
        $this->redirect('list');
    }

    /**
     * auxiliary function
     * 
     * @param string $username
     * @return int|null
     */
    public function auxUserAlreadyExist($username) {
        $queryBuilder   = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('fe_users');
        $statement      = $queryBuilder
                               ->select('uid')
                               ->from('fe_users')
                               ->where($queryBuilder->expr()->eq('username', $queryBuilder->createNamedParameter($username, \PDO::PARAM_STR)))
                               ->execute();
        $dataRow    = $statement->fetch();
        return $dataRow['uid'];
    }
}