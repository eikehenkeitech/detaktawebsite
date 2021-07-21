<?php
namespace Itechnology\Detaktawebsite\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Eike Lars Henke <eike.henke@itechnology.de>
 */
class ArticleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Itechnology\Detaktawebsite\Domain\Model\Article
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Itechnology\Detaktawebsite\Domain\Model\Article();
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
    public function getPartReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setPartForIntSetsPart()
    {
    }

    /**
     * @test
     */
    public function getPositionReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getPosition()
        );

    }

    /**
     * @test
     */
    public function setPositionForFloatSetsPosition()
    {
        $this->subject->setPosition(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'position',
            $this->subject,
            '',
            0.000000001
        );

    }

    /**
     * @test
     */
    public function getApprovalReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getApproval()
        );

    }

    /**
     * @test
     */
    public function setApprovalForStringSetsApproval()
    {
        $this->subject->setApproval('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'approval',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getAnnexReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAnnex()
        );

    }

    /**
     * @test
     */
    public function setAnnexForStringSetsAnnex()
    {
        $this->subject->setAnnex('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'annex',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getTemperatureReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTemperature()
        );

    }

    /**
     * @test
     */
    public function setTemperatureForStringSetsTemperature()
    {
        $this->subject->setTemperature('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'temperature',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDiacstrengthReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDiacstrength()
        );

    }

    /**
     * @test
     */
    public function setDiacstrengthForStringSetsDiacstrength()
    {
        $this->subject->setDiacstrength('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'diacstrength',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDimensionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDimension()
        );

    }

    /**
     * @test
     */
    public function setDimensionForStringSetsDimension()
    {
        $this->subject->setDimension('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'dimension',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStandardsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStandards()
        );

    }

    /**
     * @test
     */
    public function setStandardsForStringSetsStandards()
    {
        $this->subject->setStandards('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'standards',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getRemarkReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getRemark()
        );

    }

    /**
     * @test
     */
    public function setRemarkForStringSetsRemark()
    {
        $this->subject->setRemark('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'remark',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDatasheetReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDatasheet()
        );

    }

    /**
     * @test
     */
    public function setDatasheetForStringSetsDatasheet()
    {
        $this->subject->setDatasheet('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'datasheet',
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
    public function getSeparatlineReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getSeparatline()
        );

    }

    /**
     * @test
     */
    public function setSeparatlineForBoolSetsSeparatline()
    {
        $this->subject->setSeparatline(true);

        self::assertAttributeEquals(
            true,
            'separatline',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDesconlyReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDesconly()
        );

    }

    /**
     * @test
     */
    public function setDesconlyForBoolSetsDesconly()
    {
        $this->subject->setDesconly(true);

        self::assertAttributeEquals(
            true,
            'desconly',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getIgnorenameReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getIgnorename()
        );

    }

    /**
     * @test
     */
    public function setIgnorenameForBoolSetsIgnorename()
    {
        $this->subject->setIgnorename(true);

        self::assertAttributeEquals(
            true,
            'ignorename',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getSpecialtypeReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setSpecialtypeForIntSetsSpecialtype()
    {
    }

    /**
     * @test
     */
    public function getAddclassReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddclass()
        );

    }

    /**
     * @test
     */
    public function setAddclassForStringSetsAddclass()
    {
        $this->subject->setAddclass('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'addclass',
            $this->subject
        );

    }
}
