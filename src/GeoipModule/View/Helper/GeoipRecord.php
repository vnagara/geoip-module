<?php

namespace GeoipModule\View\Helper;

use GeoipModule\Service\Geoip;

use Zend\View\Helper\AbstractHelper;

/**
 * Description of Geoip
 *
 * @author duke
 */
class GeoipRecord extends AbstractHelper
{
    /**
     * @var \GeoipModule\Service\Geoip
     */
    protected $geoip;

    public function __invoke($ipAddress = null)
    {
        return $this->geoip->lookup($ipAddress);
    }

    public function setGeoip(Geoip $geoip)
    {
        $this->geoip = $geoip;
    }
}
