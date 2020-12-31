<?php
namespace AshokaTree\Management\Controller;

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
 * ProductController
 */
class ProductController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
     * productRepository
     * 
     * @var \AshokaTree\Management\Domain\Repository\ProductRepository
     */
    protected $productRepository = null;

    /**
     * @param \AshokaTree\Management\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(\AshokaTree\Management\Domain\Repository\ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $customerAll          = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        foreach($customerAll as $customerObj) {  $customerArray[$customerObj->getUid()] = $customerObj->getName().' - '.$customerObj->getUsername(); }
        $categoryAll          = $this->categoryRepository->findAll();
        foreach($categoryAll as $categoryObj) {  $categoryArray[$categoryObj->getUid()] = $categoryObj->getName(); }
        $brandAll          = $this->brandRepository->findAll();
        foreach($brandAll as $brandObj) {  $brandArray[$brandObj->getUid()] = $brandObj->getName(); }
        $products = $this->productRepository->findAll();
        //$this->view->assign('products', $products);
        $newProducts = [];
        foreach ($products as $product) {
            //print_r($product->getInvoice()); die();
            $newObj = new \stdClass();
            $newObj->uid = $product->getUid();
            $newObj->invoice = $product->getInvoice();
            $newObj->customer = $customerArray[$product->getCustomer()];
            $newObj->category = $categoryArray[$product->getCategory()];
            $newObj->brand = $brandArray[$product->getBrand()];
            $newObj->serial = $product->getSerial();
            $newObj->amcexpire = $product->getAmcexpire();
            $newProducts[] = $newObj;
        }
        $this->view->assign('products', $newProducts);
    }

    /**
     * action show
     * 
     * @param \AshokaTree\Management\Domain\Model\Product $product
     * @return void
     */
    public function showAction(\AshokaTree\Management\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
        $customerDetail = $this->customerRepository->findByUid($product->getCustomer());
        $this->view->assign('customerDetail', $customerDetail);
        $categoryDetail = $this->categoryRepository->findByUid($product->getCategory());
        $this->view->assign('categoryDetail', $categoryDetail);
        $brandDetail = $this->brandRepository->findByUid($product->getBrand());
        $this->view->assign('brandDetail', $brandDetail);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
        $categoryAll          = $this->categoryRepository->findAll();
        $this->view->assign('categoryAllProcess', $this->auxCategoryBrandObjectProcess($categoryAll));
        $brandAll          = $this->brandRepository->findAll();
        $this->view->assign('brandAllProcess', $this->auxCategoryBrandObjectProcess($brandAll));
        $customerAll          = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        $this->view->assign('customerAllProcess', $this->auxCustomerTechnicianObjectProcess($customerAll));
    }

    /**
     * action create
     * 
     * @param \AshokaTree\Management\Domain\Model\Product $newProduct
     * @return void
     */
    public function createAction(\AshokaTree\Management\Domain\Model\Product $newProduct)
    {
        $this->addFlashMessage('Product was created.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->add($newProduct);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \AshokaTree\Management\Domain\Model\Product $product
     * @ignorevalidation $product
     * @return void
     */
    public function editAction(\AshokaTree\Management\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
        $customerAll  = $this->customerRepository->findAllByPid($this->settings['customerPid']);
        $this->view->assign('customerAllProcess', $this->auxCustomerTechnicianObjectProcess($customerAll));
        $categoryAll          = $this->categoryRepository->findAll();
        $this->view->assign('categoryAllProcess', $this->auxCategoryBrandObjectProcess($categoryAll));
        $brandAll          = $this->brandRepository->findAll();
        $this->view->assign('brandAllProcess', $this->auxCategoryBrandObjectProcess($brandAll));
    }

    /**
     * action update
     * 
     * @param \AshokaTree\Management\Domain\Model\Product $product
     * @return void
     */
    public function updateAction(\AshokaTree\Management\Domain\Model\Product $product)
    {
        $this->addFlashMessage('Product was updated.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->update($product);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \AshokaTree\Management\Domain\Model\Product $product
     * @return void
     */
    public function deleteAction(\AshokaTree\Management\Domain\Model\Product $product)
    {
        $this->addFlashMessage('Product was deleted.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->remove($product);
        $this->redirect('list');
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


    public function auxCategoryBrandObjectProcess($objectAll) {
        $newObjects = [];
        foreach ($objectAll as $object) {
            $newObj = new \stdClass();
            $newObj->key = $object->getUid();
            $newObj->value = $object->getName();
            $newObjects[] = $newObj;
        }
    return $newObjects;
    }

    /**
     * initialize create action
     *
     * @param void
     */
    public function initializeCreateAction() {
        //$amcstart = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_management_product')['newProduct']['amcstart'];
        $this->arguments->getArgument('newProduct')
            ->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('newProduct')
            ->getPropertyMappingConfiguration()->forProperty('amcstart')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('newProduct')
            ->getPropertyMappingConfiguration()->forProperty('amcexpire')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y'); 
    }

    /**
     * initialize edit action
     *
     * @param void
     */
    public function initializeEditAction() {
        //$amcstart = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_management_product')['product']['amcstart'];
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('amcstart')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('amcexpire')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y'); 
    }

    /**
     * initialize edit action
     *
     * @param void
     */
    public function initializeUpdateAction() {
        //$amcstart = \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_management_product')['product']['amcstart'];
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('pdate')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('amcstart')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y');
        $this->arguments->getArgument('product')
            ->getPropertyMappingConfiguration()->forProperty('amcexpire')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d-m-Y'); 
    }

}
