<?php
namespace Itechnology\Detaktawebsite\Domain\Repository;

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
 * The repository for Categories
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @param string $categoryname
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findSearchForm($categoryname)
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($part);
        $query = $this->createQuery();
        //$query->getQuerySettings()->setLanguageUid($GLOBALS['TSFE']->tmpl->setup['config.']['sys_language_uid']);
        $query->matching($query->equals('nameforplugin', $categoryname, false));
        //$query->setOrderings(array('articles.position' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING) );
        //$queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
        return $query->execute();
    }
}
