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

##New methods:
In view helpers: __geoipRecord($ipAddress)__ will return GeoipRecord.