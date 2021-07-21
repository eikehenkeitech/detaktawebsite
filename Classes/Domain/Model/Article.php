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
 * Article
 */
class Article extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     * @Extbase\Validate(validator="NotEmpty")
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * temperature
     *
     * @var string
     */
    protected $temperature = '';

    /**
     * part
     *
     * @var int
     */
    protected $part = 0;

    /**
     * position
     *
     * @var float
     */
    protected $position = 0.0;

    /**
     * approval
     *
     * @var string
     */
    protected $approval = '';

    /**
     * annex
     *
     * @var string
     */
    protected $annex = '';

    /**
     * diacstrength
     *
     * @var string
     */
    protected $diacstrength = '';

    /**
     * dimension
     *
     * @var string
     */
    protected $dimension = '';

    /**
     * standards
     *
     * @var string
     */
    protected $standards = '';

    /**
     * remark
     *
     * @var string
     */
    protected $remark = '';

    /**
     * datasheet
     *
     * @var string
     */
    protected $datasheet = '';

    /**
     * image
     *
     * @var string
     */
    protected $image = '';

    /**
     * separatline
     *
     * @var bool
     */
    protected $separatline = false;

    /**
     * desconly
     *
     * @var bool
     */
    protected $desconly = false;

    /**
     * ignorename
     *
     * @var bool
     */
    protected $ignorename = false;

    /**
     * specialtype
     *
     * @var int
     */
    protected $specialtype = 0;

    /**
     * addclass
     *
     * @var string
     */
    protected $addclass = '';

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
     * Returns the temperature
     *
     * @return string $temperature
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * Sets the temperature
     *
     * @param string $temperature
     * @return void
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * Returns the part
     *
     * @return int $part
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Sets the part
     *
     * @param int $part
     * @return void
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * Returns the position
     *
     * @return float $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param float $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the approval
     *
     * @return string $approval
     */
    public function getApproval()
    {
        return $this->approval;
    }

    /**
     * Sets the approval
     *
     * @param string $approval
     * @return void
     */
    public function setApproval($approval)
    {
        $this->approval = $approval;
    }

    /**
     * Returns the annex
     *
     * @return string $annex
     */
    public function getAnnex()
    {
        return $this->annex;
    }

    /**
     * Sets the annex
     *
     * @param string $annex
     * @return void
     */
    public function setAnnex($annex)
    {
        $this->annex = $annex;
    }

    /**
     * Returns the diacstrength
     *
     * @return string $diacstrength
     */
    public function getDiacstrength()
    {
        return $this->diacstrength;
    }

    /**
     * Sets the diacstrength
     *
     * @param string $diacstrength
     * @return void
     */
    public function setDiacstrength($diacstrength)
    {
        $this->diacstrength = $diacstrength;
    }

    /**
     * Returns the dimension
     *
     * @return string $dimension
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Sets the dimension
     *
     * @param string $dimension
     * @return void
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
    }

    /**
     * Returns the standards
     *
     * @return string $standards
     */
    public function getStandards()
    {
        return $this->standards;
    }

    /**
     * Sets the standards
     *
     * @param string $standards
     * @return void
     */
    public function setStandards($standards)
    {
        $this->standards = $standards;
    }

    /**
     * Returns the remark
     *
     * @return string $remark
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Sets the remark
     *
     * @param string $remark
     * @return void
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * Returns the datasheet
     *
     * @return string $datasheet
     */
    public function getDatasheet()
    {
        return $this->datasheet;
    }

    /**
     * Sets the datasheet
     *
     * @param string $datasheet
     * @return void
     */
    public function setDatasheet($datasheet)
    {
        $this->datasheet = $datasheet;
    }

    /**
     * Returns the image
     *
     * @return string $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param string $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
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
     * Returns the separatline
     *
     * @return bool $separatline
     */
    public function getSeparatline()
    {
        return $this->separatline;
    }

    /**
     * Sets the separatline
     *
     * @param bool $separatline
     * @return void
     */
    public function setSeparatline($separatline)
    {
        $this->separatline = $separatline;
    }

    /**
     * Returns the boolean state of separatline
     *
     * @return bool
     */
    public function isSeparatline()
    {
        return $this->separatline;
    }

    /**
     * Returns the desconly
     *
     * @return bool $desconly
     */
    public function getDesconly()
    {
        return $this->desconly;
    }

    /**
     * Sets the desconly
     *
     * @param bool $desconly
     * @return void
     */
    public function setDesconly($desconly)
    {
        $this->desconly = $desconly;
    }

    /**
     * Returns the boolean state of desconly
     *
     * @return bool
     */
    public function isDesconly()
    {
        return $this->desconly;
    }

    /**
     * Returns the ignorename
     *
     * @return bool $ignorename
     */
    public function getIgnorename()
    {
        return $this->ignorename;
    }

    /**
     * Sets the ignorename
     *
     * @param bool $ignorename
     * @return void
     */
    public function setIgnorename($ignorename)
    {
        $this->ignorename = $ignorename;
    }

    /**
     * Returns the boolean state of ignorename
     *
     * @return bool
     */
    public function isIgnorename()
    {
        return $this->ignorename;
    }

    /**
     * Returns the specialtype
     *
     * @return int $specialtype
     */
    public function getSpecialtype()
    {
        return $this->specialtype;
    }

    /**
     * Sets the specialtype
     *
     * @param int $specialtype
     * @return void
     */
    public function setSpecialtype($specialtype)
    {
        $this->specialtype = $specialtype;
    }

    /**
     * Returns the addclass
     *
     * @return string $addclass
     */
    public function getAddclass()
    {
        return $this->addclass;
    }

    /**
     * Sets the addclass
     *
     * @param string $addclass
     * @return void
     */
    public function setAddclass($addclass)
    {
        $this->addclass = $addclass;
    }
}
