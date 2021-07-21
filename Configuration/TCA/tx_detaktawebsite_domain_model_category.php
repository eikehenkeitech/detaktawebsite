<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category',
        'label' => 'name',
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
		'searchFields' => 'name,headline,description,image,viewname,dirshortcut,hasdatasheet,nameforplugin,articles',
        'iconfile' => 'EXT:detaktawebsite/Resources/Public/Icons/tx_detaktawebsite_domain_model_category.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, headline, description, image, viewname, dirshortcut, hasdatasheet, nameforplugin, articles',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, headline, description, image, viewname, dirshortcut, hasdatasheet, nameforplugin, articles, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
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
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_detaktawebsite_domain_model_category',
                'foreign_table_where' => 'AND tx_detaktawebsite_domain_model_category.pid=###CURRENT_PID### AND tx_detaktawebsite_domain_model_category.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
		't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
		'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
		'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'renderType' => 'inputDateTime',
            ]
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'renderType' => 'inputDateTime',
            ],
        ],
        'name' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'headline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.headline',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'description' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.description',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
	    'image' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.image',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'viewname' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.viewname',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'dirshortcut' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.dirshortcut',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'hasdatasheet' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.hasdatasheet',
	        'config' => [
			    'type' => 'check',
			    'items' => [
			        '1' => [
			            '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
			        ]
			    ],
			    'default' => 0
			]
	    ],
	    'nameforplugin' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.nameforplugin',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'articles' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_category.articles',
	        'config' => [
			    'type' => 'inline',
			    'foreign_table' => 'tx_detaktawebsite_domain_model_article',
			    'foreign_field' => 'category',
				'foreign_sortby' => 'position',
			    'maxitems' => 9999,
			    'appearance' => [
			        'collapseAll' => 0,
			        'levelLinksPosition' => 'top',
			        'showSynchronizationLink' => 1,
			        'showPossibleLocalizationRecords' => 1,
			        'showAllLocalizationLink' => 1
			    ],
			],
	    ],
    ],
];
