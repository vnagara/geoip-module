<?php

namespace GeoipModule\Entity;

use Doctrine\ORM\Mapping as ORM;
use GeoipModule\Object\Record as GeoipRecord;

/**
 * Geoip Record
 * Example annotation class for Doctrine ORM
 * Copy it into your Entity Namespace
 *
 * @see \GeoipModule\Object\Record
 * @author duke
 *
 * @ORM\Entity
 * @ORM\Table(name="record")
 */
class Record extends GeoipRecord
{
    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="country_code", nullable=true)
     * @var string
     */
    protected $countryCode;

    /**
     * @ORM\Column(type="string", name="country_code3", nullable=true)
     * @var string
     */
    protected $countryCode3;

    /**
     * @ORM\Column(type="string", name="country_name", nullable=true)
     * @var string
     */
    protected $countryName;

    /**
     * @ORM\Column(type="string", name="region", nullable=true)
     * @var string
     */
    protected $region;

    /**
     * @ORM\Column(type="string", name="city", nullable=true)
     * @var string
     */
    protected $city;

    /**
     * @ORM\Column(type="string", name="postal_code", nullable=true)
     * @var string
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="float", name="latitude", nullable=true)
     * @var string
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float", name="logitude", nullable=true)
     * @var string
     */
    protected $longitude;

    /**
     * @ORM\Column(type="string", name="area_code", nullable=true)
     * @var string
     */
    protected $areaCode;

    /**
     * @ORM\Column(type="string", name="dma_code", nullable=true)
     * @var string
     */
    protected $dmaCode;   # metro and dma code are the same. use metro_code

    /**
     * @ORM\Column(type="string", name="metro_code", nullable=true)
     * @var string
     */
    protected $metroCode;

    /**
     * @ORM\Column(type="string", name="continent_code", nullable=true)
     * @var string
     */
    protected $continentCode;

    public function getId()
    {
        return $this->id;
    }
}
