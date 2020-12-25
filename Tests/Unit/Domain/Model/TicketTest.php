<?php
namespace AshokaTree\Management\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Nirmalya Mondal <nirmalya.mondal@gmail.com>
 */
class TicketTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AshokaTree\Management\Domain\Model\Ticket
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AshokaTree\Management\Domain\Model\Ticket();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
    public function getProductReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getProduct()
        );
    }

    /**
     * @test
     */
    public function setProductForIntSetsProduct()
    {
        $this->subject->setProduct(12);

        self::assertAttributeEquals(
            12,
            'product',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTechnicianReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTechnician()
        );
    }

    /**
     * @test
     */
    public function setTechnicianForIntSetsTechnician()
    {
        $this->subject->setTechnician(12);

        self::assertAttributeEquals(
            12,
            'technician',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForIntSetsType()
    {
        $this->subject->setType(12);

        self::assertAttributeEquals(
            12,
            'type',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPriorityReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPriority()
        );
    }

    /**
     * @test
     */
    public function setPriorityForIntSetsPriority()
    {
        $this->subject->setPriority(12);

        self::assertAttributeEquals(
            12,
            'priority',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStatus()
        );
    }

    /**
     * @test
     */
    public function setStatusForIntSetsStatus()
    {
        $this->subject->setStatus(12);

        self::assertAttributeEquals(
            12,
            'status',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPlaceReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPlace()
        );
    }

    /**
     * @test
     */
    public function setPlaceForIntSetsPlace()
    {
        $this->subject->setPlace(12);

        self::assertAttributeEquals(
            12,
            'place',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPasscodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPasscode()
        );
    }

    /**
     * @test
     */
    public function setPasscodeForStringSetsPasscode()
    {
        $this->subject->setPasscode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'passcode',
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
