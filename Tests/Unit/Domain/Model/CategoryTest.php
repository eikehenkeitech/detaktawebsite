<?php
namespace Itechnology\Detaktawebsite\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Eike Lars Henke <eike.henke@itechnology.de>
 */
class CategoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Itechnology\Detaktawebsite\Domain\Model\Category
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Itechnology\Detaktawebsite\Domain\Model\Category();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );

    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getHeadlineReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getHeadline()
        );

    }

    /**
     * @test
     */
    public function setHeadlineForStringSetsHeadline()
    {
        $this->subject->setHeadline('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'headline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );

    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getImage()
        );

    }

    /**
     * @test
     */
    public function setImageForStringSetsImage()
    {
        $this->subject->setImage('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'image',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getViewnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getViewname()
        );

    }

    /**
     * @test
     */
    public function setViewnameForStringSetsViewname()
    {
        $this->subject->setViewname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'viewname',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDirshortcutReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDirshortcut()
        );

    }

    /**
     * @test
     */
    public function setDirshortcutForStringSetsDirshortcut()
    {
        $this->subject->setDirshortcut('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'dirshortcut',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getHasdatasheetReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getHasdatasheet()
        );

    }

    /**
     * @test
     */
    public function setHasdatasheetForBoolSetsHasdatasheet()
    {
        $this->subject->setHasdatasheet(true);

        self::assertAttributeEquals(
            true,
            'hasdatasheet',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getNameforpluginReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameforplugin()
        );

    }

    /**
     * @test
     */
    public function setNameforpluginForStringSetsNameforplugin()
    {
        $this->subject->setNameforplugin('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameforplugin',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getArticlesReturnsInitialValueForArticle()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getArticles()
        );

    }

    /**
     * @test
     */
    public function setArticlesForObjectStorageContainingArticleSetsArticles()
    {
        $article = new \Itechnology\Detaktawebsite\Domain\Model\Article();
        $objectStorageHoldingExactlyOneArticles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneArticles->attach($article);
        $this->subject->setArticles($objectStorageHoldingExactlyOneArticles);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneArticles,
            'articles',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addArticleToObjectStorageHoldingArticles()
    {
        $article = new \Itechnology\Detaktawebsite\Domain\Model\Article();
        $articlesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $articlesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($article));
        $this->inject($this->subject, 'articles', $articlesObjectStorageMock);

        $this->subject->addArticle($article);
    }

    /**
     * @test
     */
    public function removeArticleFromObjectStorageHoldingArticles()
    {
        $article = new \Itechnology\Detaktawebsite\Domain\Model\Article();
        $articlesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $articlesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($article));
        $this->inject($this->subject, 'articles', $articlesObjectStorageMock);

        $this->subject->removeArticle($article);

    }
}
