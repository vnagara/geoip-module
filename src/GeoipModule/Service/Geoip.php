<?php

namespace GeoipModule\Service;

use GeoipModule\Object\Record;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of Geoip
 *
 * @author duke
 */
class Geoip
{
    /** @var string */
    protected $filename;

    /** @var int */
    protected $flag;

    /**
     * Pointer to geoip object
     * @var \GeoIP
     */
    protected $geoip;

    public function __construct($filename, $flag = GEOIP_STANDARD)
    {
        $this->filename = $filename;
        $this->flag = $flag;

        $this->geoip = geoip_open($filename, $flag);
    }

    public function __destruct()
    {
        if ($this->geoip) geoip_close($this->geoip);
    }

    /**
     *
     * @param string $ipAddress
     * @return \GeoipModule\Object\Record
     */
    public function find($ipAddress = null)
    {
        if (null === $ipAddress) $ipAddress = $_SERVER['REMOTE_ADDR'];

        $record = GeoIP_record_by_addr($this->geoip, $ipAddress);
        if ($record === null) {
            return null;
        }

        $recordObject = new Record;
        $hydrator = new ClassMethods();
        $hydrator->hydrate(get_object_vars($record), $recordObject);

        return $recordObject;
    }

    /**
     * Proxy to find()
     * @param string $ipAddress
     * @return \GeoipModule\Object\Record
     */
    public function lookup($ipAddress)
    {
        return $this->find($ipAddress);
    }
}
