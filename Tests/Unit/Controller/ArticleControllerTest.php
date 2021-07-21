<?php
namespace Itechnology\Detaktawebsite\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Eike Lars Henke <eike.henke@itechnology.de>
 */
class ArticleControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Itechnology\Detaktawebsite\Controller\ArticleController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Itechnology\Detaktawebsite\Controller\ArticleController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllArticlesFromRepositoryAndAssignsThemToView()
    {

        $allArticles = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $articleRepository = $this->getMockBuilder(\Itechnology\Detaktawebsite\Domain\Repository\ArticleRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $articleRepository->expects(self::once())->method('findAll')->will(self::returnValue($allArticles));
        $this->inject($this->subject, 'articleRepository', $articleRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('articles', $allArticles);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
