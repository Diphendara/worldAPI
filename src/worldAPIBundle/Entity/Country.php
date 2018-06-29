<?php

namespace worldAPIBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="Country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="Code", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=52, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=26, nullable=false)
     */
    private $region = '';

    /**
     * @var float
     *
     * @ORM\Column(name="SurfaceArea", type="float", precision=10, scale=2, nullable=false)
     */
    private $surfacearea = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="IndepYear", type="smallint", nullable=true)
     */
    private $indepyear;

    /**
     * @var integer
     *
     * @ORM\Column(name="Population", type="integer", nullable=false)
     */
    private $population = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="LifeExpectancy", type="float", precision=3, scale=1, nullable=true)
     */
    private $lifeexpectancy;

    /**
     * @var float
     *
     * @ORM\Column(name="GNP", type="float", precision=10, scale=2, nullable=true)
     */
    private $gnp;

    /**
     * @var float
     *
     * @ORM\Column(name="GNPOld", type="float", precision=10, scale=2, nullable=true)
     */
    private $gnpold;

    /**
     * @var string
     *
     * @ORM\Column(name="LocalName", type="string", length=45, nullable=false)
     */
    private $localname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="GovernmentForm", type="string", length=45, nullable=false)
     */
    private $governmentform = '';

    /**
     * @var string
     *
     * @ORM\Column(name="HeadOfState", type="string", length=60, nullable=true)
     */
    private $headofstate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Capital", type="integer", nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="Code2", type="string", length=2, nullable=false)
     */
    private $code2 = '';



    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Country
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set surfacearea
     *
     * @param float $surfacearea
     *
     * @return Country
     */
    public function setSurfacearea($surfacearea)
    {
        $this->surfacearea = $surfacearea;

        return $this;
    }

    /**
     * Get surfacearea
     *
     * @return float
     */
    public function getSurfacearea()
    {
        return $this->surfacearea;
    }

    /**
     * Set indepyear
     *
     * @param integer $indepyear
     *
     * @return Country
     */
    public function setIndepyear($indepyear)
    {
        $this->indepyear = $indepyear;

        return $this;
    }

    /**
     * Get indepyear
     *
     * @return integer
     */
    public function getIndepyear()
    {
        return $this->indepyear;
    }

    /**
     * Set population
     *
     * @param integer $population
     *
     * @return Country
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set lifeexpectancy
     *
     * @param float $lifeexpectancy
     *
     * @return Country
     */
    public function setLifeexpectancy($lifeexpectancy)
    {
        $this->lifeexpectancy = $lifeexpectancy;

        return $this;
    }

    /**
     * Get lifeexpectancy
     *
     * @return float
     */
    public function getLifeexpectancy()
    {
        return $this->lifeexpectancy;
    }

    /**
     * Set gnp
     *
     * @param float $gnp
     *
     * @return Country
     */
    public function setGnp($gnp)
    {
        $this->gnp = $gnp;

        return $this;
    }

    /**
     * Get gnp
     *
     * @return float
     */
    public function getGnp()
    {
        return $this->gnp;
    }

    /**
     * Set gnpold
     *
     * @param float $gnpold
     *
     * @return Country
     */
    public function setGnpold($gnpold)
    {
        $this->gnpold = $gnpold;

        return $this;
    }

    /**
     * Get gnpold
     *
     * @return float
     */
    public function getGnpold()
    {
        return $this->gnpold;
    }

    /**
     * Set localname
     *
     * @param string $localname
     *
     * @return Country
     */
    public function setLocalname($localname)
    {
        $this->localname = $localname;

        return $this;
    }

    /**
     * Get localname
     *
     * @return string
     */
    public function getLocalname()
    {
        return $this->localname;
    }

    /**
     * Set governmentform
     *
     * @param string $governmentform
     *
     * @return Country
     */
    public function setGovernmentform($governmentform)
    {
        $this->governmentform = $governmentform;

        return $this;
    }

    /**
     * Get governmentform
     *
     * @return string
     */
    public function getGovernmentform()
    {
        return $this->governmentform;
    }

    /**
     * Set headofstate
     *
     * @param string $headofstate
     *
     * @return Country
     */
    public function setHeadofstate($headofstate)
    {
        $this->headofstate = $headofstate;

        return $this;
    }

    /**
     * Get headofstate
     *
     * @return string
     */
    public function getHeadofstate()
    {
        return $this->headofstate;
    }

    /**
     * Set capital
     *
     * @param integer $capital
     *
     * @return Country
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return integer
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set code2
     *
     * @param string $code2
     *
     * @return Country
     */
    public function setCode2($code2)
    {
        $this->code2 = $code2;

        return $this;
    }

    /**
     * Get code2
     *
     * @return string
     */
    public function getCode2()
    {
        return $this->code2;
    }
}
