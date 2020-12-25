<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'AshokaTree.Management',
            'Customer',
            'Customer Management'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'AshokaTree.Management',
            'Product',
            'Product Management'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'AshokaTree.Management',
            'Ticket',
            'Ticket Management'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('management', 'Configuration/TypoScript', 'Management');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_category', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_category');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_brand', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_brand.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_brand');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_type', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_type.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_type');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_status', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_status.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_status');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_priority', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_priority.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_priority');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_product', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_product.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_product');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_ticket', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_ticket.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_ticket');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_management_domain_model_message', 'EXT:management/Resources/Private/Language/locallang_csh_tx_management_domain_model_message.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_management_domain_model_message');

    }
);
