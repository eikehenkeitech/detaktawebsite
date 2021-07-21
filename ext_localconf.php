<?php
defined('TYPO3_MODE') || die('Access denied.');
$extKey = 'detaktawebsite';
$_EXTKEY = 'detaktawebsite';
$EXTKEY = 'detaktawebsite';
//$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:detaktawebsite/Resources/Private/Language/locallang.xlf'][] = 'EXT:detaktawebsite/Resources/Private/Language/locallang.xlf';
//$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:detaktawebsite/Resources/Private/Language/de.locallang.xlf'][] = 'EXT:ndetaktawebsite/Resources/Private/Language/de.locallang.xlf';
//$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['en']['EXT:detaktawebsite/Resources/Private/Language/en.locallang.xlf'][] = 'EXT:ndetaktawebsite/Resources/Private/Language/en.locallang.xlf';

$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['detakta'] = 'EXT:detaktawebsite/Configuration/RTE/Detakta.yaml';

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Itechnology.Detaktawebsite',
            'Articletables',
            [
                'Category' => 'list, show, showcatname',
                'Article' => 'list'
            ],
            // non-cacheable actions
            [
                'Category' => 'list, show, showcatname',
                'Article' => 'list'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					articletables {
						icon = ../' . \TYPO3\CMS\Core\Utility\PathUtility::stripPathSitePrefix(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey)) . 'Resources/Public/Icons/user_plugin_articletables.svg
						title = LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_articletables
						description = LLL:EXT:detaktawebsite/Resources/Private/Language/locallang_db.xlf:tx_detaktawebsite_domain_model_articletables.description
						tt_content_defValues {
							CType = list
							list_type = detaktawebsite_articletables
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
