<?php
namespace AshokaTree\Management\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Nirmalya Mondal <nirmalya.mondal@gmail.com>
 */
class TicketControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AshokaTree\Management\Controller\TicketController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\AshokaTree\Management\Controller\TicketController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTicketsFromRepositoryAndAssignsThemToView()
    {

        $allTickets = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository = $this->getMockBuilder(\AshokaTree\Management\Domain\Repository\TicketRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ticketRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTickets));
        $this->inject($this->subject, 'ticketRepository', $ticketRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('tickets', $allTickets);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTicketToView()
    {
        $ticket = new \AshokaTree\Management\Domain\Model\Ticket();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ticket', $ticket);

        $this->subject->showAction($ticket);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenTicketToTicketRepository()
    {
        $ticket = new \AshokaTree\Management\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\AshokaTree\Management\Domain\Repository\TicketRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('add')->with($ticket);
        $this->inject($this->subject, 'ticketRepository', $ticketRepository);

        $this->subject->createAction($ticket);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenTicketToView()
    {
        $ticket = new \AshokaTree\Management\Domain\Model\Ticket();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('ticket', $ticket);

        $this->subject->editAction($ticket);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenTicketInTicketRepository()
    {
        $ticket = new \AshokaTree\Management\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\AshokaTree\Management\Domain\Repository\TicketRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('update')->with($ticket);
        $this->inject($this->subject, 'ticketRepository', $ticketRepository);

        $this->subject->updateAction($ticket);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenTicketFromTicketRepository()
    {
        $ticket = new \AshokaTree\Management\Domain\Model\Ticket();

        $ticketRepository = $this->getMockBuilder(\AshokaTree\Management\Domain\Repository\TicketRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $ticketRepository->expects(self::once())->method('remove')->with($ticket);
        $this->inject($this->subject, 'ticketRepository', $ticketRepository);

        $this->subject->deleteAction($ticket);
    }
}
