<?php
namespace Itechnology\Detaktawebsite\ViewHelpers\Page;
 use TYPO3\CMS\Core\Utility\GeneralUtility;
 use TYPO3\CMS\Core\Database\ConnectionPool;
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Sven Wappler <typo3YYYY@wappler.systems>, WapplerSystems
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
* ************************************************************* */

/**
 * ViewHelper for rendering TYPO3 menus in Fluid
 * Require the extension static_info_table
 *
 * @author Sven Wappler, WapplerSystems
 * @package ws_t3bootstrap
 * @subpackage ViewHelpers/Page
 */
class LanguageMenuViewHelper extends TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

	/**
	 * @var array
	 */
	protected $languageMenu = array();

	/**
	 * @var integer
	 */
	protected $defaultLangUid = 0;

	/**
	 * @var string
	 */
	protected $tagName = 'ul';

	/**
	 * @var	\TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
	 */
	protected $cObj;

	/**
	 * Initialize
	 * @return void
	 */
	public function initializeArguments() {

		$this->registerUniversalTagAttributes();
		$this->registerArgument('tagName', 'string', 'Tag name to use for enclosing container, list and flags (not finished) only', FALSE, 'ul');
		$this->registerArgument('tagNameChildren', 'string', 'Tag name to use for child nodes surrounding links, list and flags only', FALSE, 'li');
		$this->registerArgument('defaultIsoFlag', 'string', 'ISO code of the default flag', FALSE, 'gb');
		$this->registerArgument('defaultLanguageLabel', 'string', 'Label for the default language', FALSE, 'English');
		$this->registerArgument('order', 'mixed', 'Orders the languageIds after this list', FALSE, '');
		$this->registerArgument('labelOverwrite', 'mixed', 'Overrides language labels', FALSE, '');
		$this->registerArgument('hideNotTranslated', 'boolean', 'Hides languageIDs which are not translated', FALSE, FALSE);
		$this->registerArgument('layout', 'string', 'How to render links when using autorendering. Possible selections: name,flag - use fx "name" or "flag,name" or "name,flag"', FALSE, 'flag,name');
		$this->registerArgument('useCHash', 'boolean', 'Use cHash for typolink', FALSE, TRUE);
		$this->registerArgument('hideCurrent', 'boolean', 'Hide current link', FALSE, FALSE);
		$this->registerArgument('flagPath', 'string', 'Overwrites the path to the flag folder', FALSE, 'fileadmin/Resources/Public/Images/flags/');
		$this->registerArgument('flagImageType', 'string', 'Sets type of flag image: png, gif, jpeg, svg', FALSE, 'png');
		$this->registerArgument('linkCurrent', 'boolean', 'Sets flag to link current language or not', FALSE, TRUE);
		$this->registerArgument('classCurrent', 'string', 'Sets the class, by which the current language will be marked', FALSE, 'current');
		$this->registerArgument('as', 'string', 'If used, stores the menu pages as an array in a variable named according to this value and renders the tag content - which means automatic rendering is disabled if this attribute is used', FALSE, 'languageMenu');
		$this->registerArgument('imageWidth', 'string', 'Breite in der das SVG dargestellt werden soll', FALSE, '16');
        $this->registerArgument('imageHeight', 'string', 'Höhe in der das SVG dargestellt werden soll', FALSE, '11');

	}

	/**
	 * Render method
	 *
	 * @return string
	 */
	public function render() {
	    /*
		if (FALSE === is_object($GLOBALS['TSFE']->sys_page)) {
			return NULL;
		}
	    */
		$this->cObj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');
		$this->tagName = $this->arguments['tagName'];

		// to set the tagName we should call initialize()
		$this->initialize();

		$this->languageMenu = $this->parseLanguageMenu($this->arguments['order'], $this->arguments['labelOverwrite']);
		$this->templateVariableContainer->add($this->arguments['as'], $this->languageMenu);
		$content = $this->renderChildren();
		$this->templateVariableContainer->remove($this->arguments['as']);
		if (strlen(trim($content)) === 0) {
			$content = $this->autoRender($this->languageMenu);
		}
		return $content;
	}

	/**
	 * Automatically render a language menu
	 *
	 * @return string
	 */
	protected function autoRender() {
		$content = $this->getLanguageMenu();
		$content = trim($content);
		if (FALSE === empty($content)) {
			$this->tag->setContent($content);
			$content = $this->tag->render();
		}
		return $content;
	}

	/**
	 * Get layout 0 (default): list
	 *
	 * @return	string
	 */
	protected function getLanguageMenu() {

		$tagName = $this->arguments['tagNameChildren'];
		$html = array();
		$itemCount = count($this->languageMenu);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($itemCount);
		foreach ($this->languageMenu as $index => $var) {
			$class = '';
			$classes = array();
			if (TRUE === (boolean) $var['inactive']) {
				$classes[] = 'inactive';
			} elseif (TRUE === (boolean) $var['current']) {
				$classes[] = $this->arguments['classCurrent'];
			}
			if (0 === $index) {
				$classes[] = 'first';
			} elseif (($itemCount - 1) === $index) {
				$classes[] = 'last';
			}
			if (0 < count($classes)) {
				$class = ' class="' . implode(' ', $classes) .'" ';
			}
			if (TRUE === (boolean) $var['current'] && FALSE === (boolean) $this->arguments['linkCurrent']) {
				$html[] = '<' . $tagName . $class . '>' . $this->getLayout($var) . '</' . $tagName . '>';
			} else {
				$html[] = '<' . $tagName . $class . '><a href="' . htmlspecialchars($var['url']) . '">' . $this->getLayout($var) . '</a></' . $tagName . '>';
			}
		}
		return implode(LF, $html);
	}

	/**
	 * Returns the flag source
	 *
	 * @param string $iso
	 * @return string
	 */
	protected function getLanguageFlagSrc($iso) {

        //$iso = strtoupper($iso);
		$path = trim($this->arguments['flagPath']);
		$imgType = trim($this->arguments['flagImageType']);

		$img = $path . $iso . '.' . $imgType;
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($img);
		return $img;
	}

	/**
	 * Return the layout: flag & text, flags only or text only
	 *
	 * @param array $language
	 * @return string
	 */
	protected function getLayout(array $language) {
		$flagImage = FALSE !== stripos($this->arguments['layout'], 'flag') ? $this->getFlagImage($language) : '';
		$label = $language['label'];
		switch ($this->arguments['layout']) {
			case 'flag':
				$html = $flagImage;
				break;
			case 'name':
				$html = $label;
				break;
			case 'name,flag':
				$html = $label;
				if ($flagImage) {
					$html .= '&nbsp;' . $flagImage;
				}
				break;
			case 'flag,name':
			default:
				if ($flagImage) {
					$html = $flagImage . '&nbsp;' . $label;
				} else {
					$html = $label;
				}
		}
		return $html;
	}

	/**
	 * Render the flag image for autorenderer
	 *
	 * @param array $language
	 * @return string
	 */
	protected function getFlagImage(array $language) {

        $conf = array(
			'file' => $language['flagSrc'],
			'altText' => $language['label'] ,
			'titleText' => $language['label'],
		);
		//return $this->cObj->IMAGE($conf);
		return $this->cObj->cObjGetSingle('IMAGE', $conf);;
		//return null;
	}

	/**
	 * Sets all parameter for langMenu
	 *
	 * @return array
	 */
	protected function parseLanguageMenu() {
		$order = ($this->arguments['order']) ? \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->arguments['order']) : '';
		$labelOverwrite = ($this->arguments['labelOverwrite']) ? \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->arguments['labelOverwrite']) : '';

		$tempArray = $languageMenu = array();

		$tempArray[0] = array(
			'label' => $this->arguments['defaultLanguageLabel'],
			'flag' => $this->arguments['defaultIsoFlag']
		);

//		$select = 'uid, title, flag';
//		$from = 'sys_language';
//		$where = '1=1' . $this->cObj->enableFields('sys_language');
		//$sysLanguage = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows($select, $from, $where);
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('sys_language');
        $queryBuilder
            ->select('uid', 'title', 'flag')
            ->from('sys_news')
            ->execute();
		foreach ($queryBuilder as $value) {
			$tempArray[$value['uid']] = array(
				'label' => $value['title'],
				'flag' => $value['flag'],
			);
		}

			// reorders languageMenu
		if (!empty($order)) {
			foreach ($order as $value) {
				$languageMenu[$value] = $tempArray[$value];
			}
		} else {
			$languageMenu = $tempArray;
		}

			// overwrite of label
		if (!empty($labelOverwrite)) {
			$i = 0;
			foreach ($languageMenu as $key => $value) {
				$languageMenu[$key]['label'] = $labelOverwrite[$i] ;
				$i++;
			}
		}

			// Select all pages_language_overlay records on the current page. Each represents a possibility for a language.
		$pageArray = array();
//		$table = 'pages_language_overlay';
//		$whereClause = 'pid=' . $GLOBALS['TSFE']->id . ' ';
//		$whereClause .= $GLOBALS['TSFE']->sys_page->enableFields($table);
//		$sysLang = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('DISTINCT sys_language_uid', $table, $whereClause);
//		$sysLang = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('DISTINCT sys_language_uid', $table, $whereClause);
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('pages_language_overlay');
        $queryBuilder
            ->select('DISTINCT sys_language_uid')
            ->from('pages_language_overlay')
            ->where($queryBuilder->expr()->eq('pid', $GLOBALS['TSFE']->id))
            ->execute();

		if (!empty($queryBuilder)) {
			foreach ($queryBuilder as $val) {
				$pageArray[$val['sys_language_uid']] = $val['sys_language_uid'];
			}
		}
		
		
//		$table = 'pages';
//		$whereClause = 'uid=' . $GLOBALS['TSFE']->id . ' ';
//		$whereClause .= $GLOBALS['TSFE']->sys_page->enableFields($table);
//		$hideDefaultLangResult = $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('l18n_cfg', $table, $whereClause);
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('pages');
        $queryBuilder
            ->select('*')
            ->from('pages')
            ->where($queryBuilder->expr()->eq('uid', $GLOBALS['TSFE']->id))
            ->execute();

		$hideDefaultLang = ($queryBuilder['l18n_cfg'] == 1) ? 1 : 0;
		

		foreach ($languageMenu as $key => $value) {
            $languageAspect = GeneralUtility::makeInstance(Context::class)->getAspect('language');
            // (previously known as TSFE->sys_language_uid)
//            $languageAspect->getId();
			$current = ($languageAspect->getId() == $key) ? 1 : 0;
//            $dd = $GLOBALS['TSFE']->sys_language_uid;
			$inactive = ($pageArray[$key] || $key == $this->defaultLangUid) ? 0 : 1;
			$languageMenu[$key]['current'] = $current;
			$languageMenu[$key]['inactive'] = $inactive;
			$languageMenu[$key]['url'] = ($current) ? \TYPO3\CMS\Core\Utility\GeneralUtility::getIndpEnv('REQUEST_URI') : $this->getLanguageUrl($key, $inactive);
			$languageMenu[$key]['flagSrc'] = $this->getLanguageFlagSrc($value['flag']);
			$languageMenu[$key]['imageWidth'] = $imageWidth;
			$languageMenu[$key]['imageHeight'] = $imageHeight;
			$languageMenu[$key]['flagSrc'] = $this->getLanguageFlagSrc($value['flag']);

			if ($this->arguments['hideNotTranslated'] && $inactive) {
				unset($languageMenu[$key]);
			}
			if ($this->arguments['hideCurrent'] && $current) {
				unset($languageMenu[$key]);
			}
			if ($hideDefaultLang && $key == $this->defaultLangUid) {
				unset($languageMenu[$key]);
			}
		}

		return $languageMenu;
	}

	/**
	 * Get link of language menu entry
	 *
	 * @param $uid
	 * @return string
	 */
	protected function getLanguageUrl($uid) {
		$getValues = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET();
		$getValues['L'] = $uid;
		$currentPage =  $GLOBALS['TSFE']->id;
		unset($getValues['id']);
		unset($getValues['cHash']);
		$addParams = http_build_query($getValues);
		$config = array(
			'parameter' => $currentPage,
			'returnLast' => 'url',
			'additionalParams' => '&' . $addParams,
			'useCacheHash' => $this->arguments['useCHash']
		);
		return $this->cObj->typoLink('', $config);
	}

}
