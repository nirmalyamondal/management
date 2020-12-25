<?php
namespace AshokaTree\Management\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Nirmalya Mondal <nirmalya.mondal@gmail.com>
 */
class ProductTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AshokaTree\Management\Domain\Model\Product
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AshokaTree\Management\Domain\Model\Product();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getInvoiceReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getInvoice()
        );
    }

    /**
     * @test
     */
    public function setInvoiceForFileReferenceSetsInvoice()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setInvoice($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'invoice',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCustomerReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCustomer()
        );
    }

    /**
     * @test
     */
    public function setCustomerForIntSetsCustomer()
    {
        $this->subject->setCustomer(12);

        self::assertAttributeEquals(
            12,
            'customer',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCategoryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setCategoryForIntSetsCategory()
    {
        $this->subject->setCategory(12);

        self::assertAttributeEquals(
            12,
            'category',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBrandReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getBrand()
        );
    }

    /**
     * @test
     */
    public function setBrandForIntSetsBrand()
    {
        $this->subject->setBrand(12);

        self::assertAttributeEquals(
            12,
            'brand',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSerialReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSerial()
        );
    }

    /**
     * @test
     */
    public function setSerialForStringSetsSerial()
    {
        $this->subject->setSerial('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'serial',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPdateReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getPdate()
        );
    }

    /**
     * @test
     */
    public function setPdateForDateTimeSetsPdate()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setPdate($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'pdate',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAmcstartReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getAmcstart()
        );
    }

    /**
     * @test
     */
    public function setAmcstartForDateTimeSetsAmcstart()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setAmcstart($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'amcstart',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAmcexpireReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getAmcexpire()
        );
    }

    /**
     * @test
     */
    public function setAmcexpireForDateTimeSetsAmcexpire()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setAmcexpire($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'amcexpire',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNoteReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNote()
        );
    }

    /**
     * @test
     */
    public function setNoteForStringSetsNote()
    {
        $this->subject->setNote('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'note',
            $this->subject
        );
    }
}
