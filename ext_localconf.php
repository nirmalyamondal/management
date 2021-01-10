<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'AshokaTree.Management',
            'Customer',
            [
                'Customer' => 'list, new, create, show, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Customer' => 'list, new, create, show, edit, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'AshokaTree.Management',
            'Product',
            [
                'Product' => 'list, new, create, show, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Product' => 'list, new, create, show, edit, update, delete'
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'AshokaTree.Management',
            'Ticket',
            [
                'Ticket' => 'list, new, create, show, edit, update, delete, createMessage'
            ],
            // non-cacheable actions
            [
                'Ticket' => 'list, new, create, show, edit, update, delete, createMessage'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        customer {
                            iconIdentifier = management-plugin-customer
                            title = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_customer.name
                            description = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_customer.description
                            tt_content_defValues {
                                CType = list
                                list_type = management_customer
                            }
                        }
                        product {
                            iconIdentifier = management-plugin-product
                            title = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_product.name
                            description = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_product.description
                            tt_content_defValues {
                                CType = list
                                list_type = management_product
                            }
                        }
                        ticket {
                            iconIdentifier = management-plugin-ticket
                            title = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_ticket.name
                            description = LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_ticket.description
                            tt_content_defValues {
                                CType = list
                                list_type = management_ticket
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'management-plugin-customer',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:management/Resources/Public/Icons/user_plugin_customer.svg']
			);
		
			$iconRegistry->registerIcon(
				'management-plugin-product',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:management/Resources/Public/Icons/user_plugin_product.svg']
			);
		
			$iconRegistry->registerIcon(
				'management-plugin-ticket',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:management/Resources/Public/Icons/user_plugin_ticket.svg']
			);
		
    }
);
