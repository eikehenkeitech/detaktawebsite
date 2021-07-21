<?php
namespace Itechnology\Detaktawebsite\Domain\Model;
use TYPO3\CMS\Extbase\Annotation as Extbase;
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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @Extbase\Validate(validator="NotEmpty")
     */
    protected $name = '';

    /**
     * headline
     *
     * @var string
     */
    protected $headline = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * image
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $image = null;

    /**
     * viewname
     *
     * @var string
     */
    protected $viewname = '';

    /**
     * dirshortcut
     *
     * @var string
     */
    protected $dirshortcut = '';

    /**
     * hasdatasheet
     *
     * @var bool
     */
    protected $hasdatasheet = false;

    /**
     * nameforplugin
     *
     * @var string
     */
    protected $nameforplugin = '';

    /**
     * articles
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Itechnology\Detaktawebsite\Domain\Model\Article>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $articles = null;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the headline
     *
     * @return string $headline
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * Sets the headline
     *
     * @param string $headline
     * @return void
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->articles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Article
     *
     * @param \Itechnology\Detaktawebsite\Domain\Model\Article $article
     * @return void
     */
    public function addArticle(\Itechnology\Detaktawebsite\Domain\Model\Article $article)
    {
        $this->articles->attach($article);
    }

    /**
     * Removes a Article
     *
     * @param \Itechnology\Detaktawebsite\Domain\Model\Article $articleToRemove The Article to be removed
     * @return void
     */
    public function removeArticle(\Itechnology\Detaktawebsite\Domain\Model\Article $articleToRemove)
    {
        $this->articles->detach($articleToRemove);
    }

    /**
     * Returns the articles
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Itechnology\Detaktawebsite\Domain\Model\Article> $articles
     */
    public function getArticles()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->articles);
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $ArticleRepository = $objectManager->get('Itechnology\Detaktawebsite\Domain\Repository\ArticleRepository');
        $articlesToCheck = $ArticleRepository -> findByCategory($this -> getUid());
        $this->articles = $articlesToCheck;
        return $this->articles;
    }

    /**
     * Sets the articles
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Itechnology\Detaktawebsite\Domain\Model\Article> $articles
     * @return void
     */
    public function setArticles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $articles)
    {

        $this->articles = $articles;
    }

    /**
     * Returns the viewname
     *
     * @return string $viewname
     */
    public function getViewname()
    {
        return $this->viewname;
    }

    /**
     * Sets the viewname
     *
     * @param string $viewname
     * @return void
     */
    public function setViewname($viewname)
    {
        $this->viewname = $viewname;
    }

    /**
     * Returns the dirshortcut
     *
     * @return string $dirshortcut
     */
    public function getDirshortcut()
    {
        return $this->dirshortcut;
    }

    /**
     * Sets the dirshortcut
     *
     * @param string $dirshortcut
     * @return void
     */
    public function setDirshortcut($dirshortcut)
    {
        $this->dirshortcut = $dirshortcut;
    }

    /**
     * Set sys language
     *
     * @param int $sysLanguageUid
     * @return void
     */
    public function setSysLanguageUid($sysLanguageUid)
    {
        $this->_languageUid = $sysLanguageUid;
    }

    /**
     * Set l10n parent
     *
     * @param int $l10nParent
     * @return void
     */
    public function setL10nParent($l10nParent)
    {
        $this->l10nParent = $l10nParent;
    }

    /**
     * Returns the hasdatasheet
     *
     * @return bool $hasdatasheet
     */
    public function getHasdatasheet()
    {
        return $this->hasdatasheet;
    }

    /**
     * Sets the hasdatasheet
     *
     * @param bool $hasdatasheet
     * @return void
     */
    public function setHasdatasheet($hasdatasheet)
    {
        $this->hasdatasheet = $hasdatasheet;
    }

    /**
     * Returns the boolean state of hasdatasheet
     *
     * @return bool
     */
    public function isHasdatasheet()
    {
        return $this->hasdatasheet;
    }

    /**
     * Returns the nameforplugin
     *
     * @return string $nameforplugin
     */
    public function getNameforplugin()
    {
        return $this->nameforplugin;
    }

    /**
     * Sets the nameforplugin
     *
     * @param string $nameforplugin
     * @return void
     */
    public function setNameforplugin($nameforplugin)
    {
        $this->nameforplugin = $nameforplugin;
    }

    /**
     * Returns Mobile Parts
     *
     * @param integer $mobilecols
     * @return object
     */
    public function getAllArticles($mobilecols)
    {

        $tmproot = $_SERVER['DOCUMENT_ROOT'];
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->articles);
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $LocalizationUtility = $objectManager->get('TYPO3\CMS\Extbase\Utility\LocalizationUtility');
        //$translate = $LocalizationUtility -> translate('category.produkt', 'detaktawebsite', null, 'en');
        //$this -> setSysLanguageUid(0);

        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($translate);


       // \TYPO3\CMS\Extbase\Uility\LocalizationUtility::translate('category.produkt', 'detaktawebsite');

        //$mobilecols = 1;

        $viewsTypeSimple = array(
            // OK
            'Isolierschlauch',
            'gewebeschlauch',
            'Loetwasser',
            'Eisolierband',
            'Kabelschutzschlauch',
            'wlf_1',
            'wlf_2',
            'wlf_3',
            'wlf_4',
            // OK
            'schrumpfschlauch',
            'flexible',
            'starre',
            'magnetic',
            'rtv',








            );
        $specialTypes = ['rtv', 'schrumpfschlauch', 'flexible', 'starre', 'magnetic', 'keramik', 'kabel', 'techspray', 'swap', 'wipes'];



        if (!in_array($this->getNameforplugin(), $specialTypes)){
            /*
             * Normale Views
             */

            // TODO
            // Artikel über einegens Query ziehen


//            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->getArticles());


            $articleCount = count($this->getArticles());
//            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($articleCount);

//            $articleCount = count($articlesToCheck);
//            \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($articleCount);

            // Anzahl der Storages ermitteln
            $storageCount = ceil($articleCount / $mobilecols);
            for ($i = 0; $i < $storageCount; $i++) {
                $colArticles[$i] = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            }
            if ($mobilecols > 1) {
                $counter = 0;
                foreach ($this->getArticles() as $article) {
                    $subArt = floor($counter / $mobilecols);

                    $maxRowForCols = $subArt;
                    $colArticles[$subArt]->attach($article);
                    $counter++;
                }
            } elseif ($mobilecols == 1) {
                $counter = 0;
                foreach ($this->getArticles() as $article) {
                    if (!is_null($article)) {
                        $colArticles[$counter]->attach($article);
                        $maxRowForCols = $counter;
                        $counter++;
                    }
                }
            }
            $colCollector = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            for ($i = 0; $i <= $maxRowForCols; $i++) {
                if (!is_null($colArticles[$i])) {
                    $colCollector->attach($colArticles[$i]);
                    $colArrayCollector[$i] = $colArticles[$i];
                }
            }
        }
        else{
            /*
             * Views mit Specialtype
             */
            $articleCount = count($this->getArticles());



            // Anzahl der Storages ermitteln
            // Zuerst pro Artikel einen Storage anlegen

            for ($i = 0; $i < $articleCount; $i++) {
                $collectSpecial[$i] = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            }

            $specialTypeInt = -1;
            $currentCollector = -1;
            foreach ($this -> getArticles() as $article){
                if ($article->getSpecialtype() != $specialTypeInt){
                    $specialTypeInt = $article->getSpecialtype();
                    $currentCollector ++;
                }
                $collectSpecial[$currentCollector]->attach($article);
            }

            /*
             * Alle Artikel werden nach Typen getrennt, wenn der Typ sich wechselt, dann wird ein weiterer Storage attached
             *
             */


            foreach ($collectSpecial as $currentCollectorCount => $curSpecialArticlesPerType) {
                /*
                 * Jetzt werden alle Typ Gruppen durchlaufen und nach Anzahl der angegebenen Spalten aufgetrannt
                 */
                $counter = 0;

                foreach ($curSpecialArticlesPerType as $currentSpecialArticle){

                        $subArt = floor($counter / $mobilecols);
                        if (is_null($collectSpecialPerRow[$currentCollectorCount][$subArt])){
                            $collectSpecialPerRow[$currentCollectorCount][$subArt] = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
                        }
                        $maxRowForCols = $subArt;
                        $collectSpecialPerRow[$currentCollectorCount][$subArt]->attach($currentSpecialArticle);
                        $counter++;
                }
            }


            foreach ($collectSpecialPerRow as $mainGroupKey => $mainGroups){
                $collectorRows[$mainGroupKey] = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
                foreach ($mainGroups as $rowKey => $columnsArticles){
                    $collectorRows[$mainGroupKey] -> attach($columnsArticles);
                }
            }

            file_put_contents($tmproot . '/tmp/collectorRows', var_export($collectorRows, true));

            /*
             * Bis hier OK
             */

            $colCollector = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
            foreach ($collectorRows as $mainCollections){
                $colCollector->attach($mainCollections);
            }
        }

        file_put_contents($tmproot . '/tmp/colCollector', var_export($colCollector, true));

        return $colCollector;
    }

    /**
     * Returns the image
     *
     * @return string image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
}
