<?php

namespace GeoipModule\Object;

interface RecordInterface
{
    public function getCountryCode();
    public function setCountryCode($countryCode);
    public function getCountryCode3();
    public function setCountryCode3($countryCode3);
    public function getCountryName();
    public function setCountryName($countryName);
    public function getRegion();
    public function setRegion($region);
    public function getCity();
    public function setCity($city);
    public function getPostalCode();
    public function setPostalCode($postalCode);
    public function getLatitude();
    public function setLatitude($latitude);
    public function getLongitude();
    public function setLongitude($longitude);
    public function getAreaCode();
    public function setAreaCode($areaCode);
    public function getDmaCode();
    public function setDmaCode($dmaCode);
    public function getMetroCode();
    public function setMetroCode($metroCode);
    public function getContinentCode();
    public function setContinentCode($continentCode);
}
