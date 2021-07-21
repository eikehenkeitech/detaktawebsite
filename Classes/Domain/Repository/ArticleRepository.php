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
 * The repository for Articles
 */
class ArticleRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    // Order by BE sorting
    protected $defaultOrderings = array(
        'position' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    public function initializeObject() {
        $query = $this->createQuery();
        $query->setOrderings(array("position" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $queryParser = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser::class);


//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('DUMP Query');
//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($queryParser->convertQueryToDoctrineQueryBuilder($query)->getSQL());
//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump('ArticleRepository Initialized');


        return $query->execute();

    }



    public function findSorted() {
        $query = $this->createQuery();
        $query->setOrderings(array("tstamp" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));

        return $query->execute();
    }


    public function findByCategoryAndLanguageSorted() {
        $query = $this->createQuery();
        $query->setOrderings(array("tstamp" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));

        $query = $query->execute();
    }

  public function findByCategory($category) {
        $query = $this->createQuery();
        $query->matching($query->equals('category', $category, false));
      $query->setOrderings(array("position" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        return $query->execute();
    }


    }
