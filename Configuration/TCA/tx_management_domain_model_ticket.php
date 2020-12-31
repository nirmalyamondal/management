<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket',
        'label' => 'passcode',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,passcode,note',
        'iconfile' => 'EXT:management/Resources/Public/Icons/tx_management_domain_model_ticket.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, customer, product, technician, type, priority, status, place, name, passcode, address, note',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, customer, product, technician, type, priority, status, place, name, passcode, address, note, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_management_domain_model_ticket',
                'foreign_table_where' => 'AND {#tx_management_domain_model_ticket}.{#pid}=###CURRENT_PID### AND {#tx_management_domain_model_ticket}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'customer' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.customer',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'foreign_table_where' => ' AND fe_users.pid=2',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'product' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.product',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_management_domain_model_product',
                'foreign_table_where' => ' AND tx_management_domain_model_product.sys_language_uid=0',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'technician' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.technician',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'fe_users',
                'foreign_table_where' => ' AND fe_users.pid=26',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_management_domain_model_type',
                'foreign_table_where' => ' AND tx_management_domain_model_type.sys_language_uid=0',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'priority' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.priority',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_management_domain_model_priority',
                'foreign_table_where' => ' AND tx_management_domain_model_priority.sys_language_uid=0',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.status',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_management_domain_model_status',
                'foreign_table_where' => ' AND tx_management_domain_model_status.sys_language_uid=0',
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'place' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.place',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Carry In - Service Center', 1],
                    ['Onsite - Home Service', 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'passcode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.passcode',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 6,
                'eval' => 'int,trim,nospace,required',
                'range' => [
				    'lower' => 100000,
				    'upper' => 999999
				],
            ],
        ],
        'address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'note' => [
            'exclude' => true,
            'label' => 'LLL:EXT:management/Resources/Private/Language/locallang_db.xlf:tx_management_domain_model_ticket.note',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'crdate' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    
    ],
];
