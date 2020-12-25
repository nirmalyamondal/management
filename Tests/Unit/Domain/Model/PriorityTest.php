<?php
namespace AshokaTree\Management\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Nirmalya Mondal <nirmalya.mondal@gmail.com>
 */
class PriorityTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AshokaTree\Management\Domain\Model\Priority
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AshokaTree\Management\Domain\Model\Priority();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
}
