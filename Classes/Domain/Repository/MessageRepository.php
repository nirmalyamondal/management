<?php
namespace AshokaTree\Management\Domain\Repository;


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
 * The repository for Message
 */
class MessageRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
	
	// Order by date
	protected $defaultOrderings = [
		'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	];

    // Status repository settings
    public function initializeObject() {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        // go for $defaultQuerySettings = $this->createQuery()->getQuerySettings(); if you want to make use of the TS persistence.storagePid with defaultQuerySettings(), see #51529 for details
        // don't add the pid constraint
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }


    /**
     * Find all records by ticket
     * @param $int
     * @return boolean|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult 
     */
    public function findByTicket($ticket) {
        $query = $this->createQuery();        
        $query->setOrderings(
            [
                'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
            ]
        );
        $result = $query->matching($query->equals('ticket',$ticket))->setLimit(999)->execute();
        if($query->count()) {
            return $result;
        } else {
            return false;
        }
    }
}
