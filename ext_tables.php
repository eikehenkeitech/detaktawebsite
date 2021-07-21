<?php
defined('TYPO3_MODE') || die('Access denied.');
$_EXTKEY = 'detaktawebsite';
$extKey = 'detaktawebsite';
call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Itechnology.Detaktawebsite',
            'Articletables',
            'Detakta Website - Artikel Tabellen'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Detakta Website');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_detaktawebsite_domain_model_category', 'EXT:detaktawebsite/Resources/Private/Language/locallang_csh_tx_detaktawebsite_domain_model_category.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_detaktawebsite_domain_model_category');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_detaktawebsite_domain_model_article', 'EXT:detaktawebsite/Resources/Private/Language/locallang_csh_tx_detaktawebsite_domain_model_article.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_detaktawebsite_domain_model_article');

        //# Add page TSConfig
        $pageTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey) . 'Configuration/TsConfig/Page/config.ts');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

        # Add user TSConfig
        $userTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extKey) . 'Configuration/TsConfig/User/config.ts');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig($userTsConfig);



    },
    $_EXTKEY
);



