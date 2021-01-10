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
 * The repository for Tickets
 */
class TicketRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	// Order by uid
	protected $defaultOrderings = [
		'uid' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
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
     * Find all records by technician & Status
     * @param $int
     * @return boolean|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult 
     */
    public function findByTechnicianAndStatus($technicianUid, $statusArray) {
        $query = $this->createQuery();
        $ordering = ['uid'=>\TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
        //$result = $query->matching($query->equals('technician',$technicianUid))->setLimit(999)->execute();
        $query->matching(
	        $query->logicalAnd(
	            [
	                $query->equals('technician', $technicianUid),
	                $query->in('status', $statusArray)
	                //$query->contains('status', $statusArray)
	            ]
		    )
	    );
	    $result = $query->execute();
        if($query->count()) {
            return $result;
        } else {
            return false;
        }
    }	

}
