<?php
namespace Itechnology\Detaktawebsite\Controller;

use Itechnology\Detaktawebsite\Domain\Repository\ArticleRepository;
use Itechnology\Detaktawebsite\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Core\Cache\Backend\NullBackend;
/***
 *
 * This file is part of the "Detakta Website" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Eike Lars Henke <eike.henke@itechnology.de>, iTechnology GmbH
 *
 ***/

/**
 * CategoryController
 */
class CategoryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * categoryRepository
     *
     * @var \Itechnology\Detaktawebsite\Domain\Repository\CategoryRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
//    protected $categoryRepository = null;
    private CategoryRepository $categoryRepository;

    /**
     * articleRepository
     *
     * @var \Itechnology\Detaktawebsite\Domain\Repository\ArticleRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
//    protected $articleRepository = null;
    private ArticleRepository $articleRepository;



    /**
     * @var string
     */
    protected $myPath = '';

    function initializeAction()
    {
        $this->myPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('detaktawebsite');
        $this->articleRepository = $this->objectManager->get(ArticleRepository::class);
        $this->articleRepository->setDefaultOrderings(['position' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING]);

        $this->extensionName = 'detaktawebsite';
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //$categoryname = $this->settings['category']['name'] ?: 'Isolierschlauch';
        //$categories= $this->categoryRepository->findSearchForm($categoryname);
        //$this->view->assign('categories', $categories);
        $this->redirect('showcatname');
    }

    /**
     * action show
     *
     * @param \Itechnology\Detaktawebsite\Domain\Model\Category $category
     * @return void
     */
    public function showAction(\Itechnology\Detaktawebsite\Domain\Model\Category $category)
    {
        /*
        $categoryname = $this->settings['category']['name'] ?: 'Isolierschlauch';
        $categories = $this->categoryRepository->findByName($categoryname);
        $mainCategory = $categories[0];
        $Uid = $mainCategory->getUid();
        $myCategory = $this->categoryRepository->findByUid($Uid);
        */

        $this->view->assign('category', $myCategory);
    }

    /**
     * action showByCategory
     *
     * @return void
     */
    public function showcatnameAction()
    {
        $categoryname = $this->settings['category']['name'] ?: 'Isolierschlauch';
        $mobilecols = $this->settings['category']['mobilecols'] ?: 3;
        /**
                $part   = $this->settings['category']['part'] ?: 0;
                $part = (int) $part;*
        *
        */
        /*
         * Create Standalone View for specific Category
         */
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->categoryRepository);
        $this->categoryRepository = $this->objectManager->get(CategoryRepository::class);
        $categories = $this->categoryRepository->findSearchForm($categoryname);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->categoryRepository);
        //$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);


        $category = $categories[0];
        if (!is_null($category)) {
            /*
             * Parts zusammenstellen, da im Mobile View Tabellen mit Spalten angezeigt werden.
             * Im Plugin werden die Anzahl der Spalten angegeben, die im mobile View generiert werden.
             * Saraus wird dann ein neues Array gebildet.
             */
            /** @var $request \TYPO3\CMS\Extbase\Mvc\Request */




//            $configurationManager = GeneralUtility::makeInstance(ObjectManager::class)->get(ConfigurationManager::class);
//            $configurationManager->setConfiguration(['extensionName' => 'detaktawebsite']);

            $colCollector = $category->getAllArticles($mobilecols);
            $viewNameByCategory = $category->getViewname();
            $view = $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
            $view->getRequest()->setControllerExtensionName($this->extensionName);
            $view->setLayoutRootPaths(array($this->myPath . '/Resources/Private/Layouts'));
            $view->setTemplateRootPaths(array($this->myPath . '/Resources/Private/Templates/Standalone'));
            $view->setTemplate($viewNameByCategory);
            /*
             * Category mit Anzahl der Spalten abgleichen
             * Cat_First_Col = category[0,2,4,..] -> Cat_Second_Col = category[1,3,5,..], ...
             */

            $this->view = $view;
        }
        $this->view->assign('category', $category);
        $this->view->assign('colcollector', $colCollector);
        $this->view->assign('colsWithLabel', (int) ($mobilecols + 1));
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($GLOBALS['TSFE']->sys_language_uid);
        //$this->view->assign('sysLanguageUid', $GLOBALS['TSFE']->sys_language_uid);
    }
}
