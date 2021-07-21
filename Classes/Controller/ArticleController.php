<?php
namespace Itechnology\Detaktawebsite\Controller;

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
 * ArticleController
 */
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * articleRepository
     *
     * @var \Itechnology\Detaktawebsite\Domain\Repository\ArticleRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $articleRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //$articles = $this->articleRepository->findAll();
        $articles = $this->articleRepository->findSorted();
        $this->view->assign('articles', $articles);
    }
}
