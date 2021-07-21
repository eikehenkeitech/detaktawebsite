<?php

$pluginSignature = 'detaktawebsite_articletables';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:detaktawebsite/Configuration/FlexForms/FF_Detaktawebsite_Articletables.xml'
);