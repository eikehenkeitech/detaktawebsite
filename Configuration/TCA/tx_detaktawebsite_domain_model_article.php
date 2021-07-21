<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
		'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
        'sortby' => 'uid',
		'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
		'searchFields' => 'name,description,part,position,approval,annex,temperature,diacstrength,dimension,standards,remark,datasheet,image,separatline,desconly,ignorename,specialtype,addclass',
        'iconfile' => 'EXT:detaktawebsite/Resources/Public/Icons/tx_detaktawebsite_domain_model_article.gif'
    ],
    'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, part, position, approval, annex, temperature, diacstrength, dimension, standards, remark, datasheet, image, separatline, desconly, ignorename, specialtype, addclass',
    ],
    'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, part, position, approval, annex, temperature, diacstrength, dimension, standards, remark, datasheet, image, separatline, desconly, ignorename, specialtype, addclass, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_detaktawebsite_domain_model_article',
                'foreign_table_where' => 'AND tx_detaktawebsite_domain_model_article.pid=###CURRENT_PID### AND tx_detaktawebsite_domain_model_article.sys_language_uid IN (-1,0)',
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
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.name',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	    ],
	    'description' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.description',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'part' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.part',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	    'position' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.position',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'double2'
			]
	    ],
	    'approval' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.approval',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'annex' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.annex',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'temperature' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.temperature',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'diacstrength' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.diacstrength',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'dimension' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.dimension',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'standards' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.standards',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'remark' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.remark',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	    ],
	    'datasheet' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.datasheet',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'image' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.image',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
	    'separatline' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.separatline',
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
	    'desconly' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.desconly',
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
	    'ignorename' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.ignorename',
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
	    'specialtype' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.specialtype',
	        'config' => [
			    'type' => 'input',
			    'size' => 4,
			    'eval' => 'int'
			]
	    ],
	    'addclass' => [
	        'exclude' => true,
	        'label' => 'LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_article.addclass',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	    ],
        'category' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
