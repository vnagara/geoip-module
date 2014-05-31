#README

##PROLOGUE

My project demands on detecting and storing accessed IP data.  
So I found geoip/geoip package. And everything else is to store it.  
The best way is serialize or create record in DB. The second way with Doctrine 2 is very slow as appeared in my experience.

###Why not geoip2/geoip2 or MaxMind-DB-Reader-php with .mmdb
Really? It contains wished class Record for serialization already but:
As experiment showed:

-   Record Object has all Country name translations what I do with internalization library.
-   Record Object is too huge so Its serialization take too long string.
-   __It much SLOWLY then geoip1 with sqlite db.__ In 2-3 times. (Tested on about 2500 IPs)

So I decided to create alternate Record object that will utilize fast geoip sqlite db and fit to  
now-day Object using. It easily can be extended to Doctrine Entity or Document.

##How to install
Install it by composer.
~~~
{
    "require": {
        "vnagara/geoip-module": "1.*"
    }
}
~~~
Download geoip sql DB to _data/GeoLiteCity.dat_ or set another path in configuration file.  
On linux with wget you can use this command (inside project root):
~~~
    wget -O - http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz | gzip -dc > data/GeoLiteCity.dat
~~~

In _application.config.php_ enable __GeoipModule__ module.


##New methods:
  1. In view helpers: __geoipRecord($ipAddress)__ will return GeoipRecord.
  2. There is new service __geoip__. So in controller it is accessible by:
~~~
    /** @var \GeoipModule\Service\Geoip */
    $geoip = $this->getServiceLocator()->get('geoip');

    /** @var \GeoipModule\Object\Record */
    $recordOfSomeIpAddress = $geoip->find('184.154.227.14');
    $city = $recordOfSomeIpAddress->getCity();  // Chicago

    // The same:
    $recordOfSomeIpAddress = $geoip->lookup('184.154.227.14');

    // To use ip from $_SERVER['REMOTE_ADDR']
    $record = $geoip->find();
~~~


##Doctrine ORM
Template of Entity with annotation lays by path: __src/GeoipModule/Entity/Record.php__