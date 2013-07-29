<?php

namespace GeoipModule;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

/**
 * Example of Module
 *
 * @author duke
 */
class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ServiceProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'geoip' => function ($serviceManager) {
                    $config = $serviceManager->get('config');
                    $options = $config['geoip_module'];
                    $geoip = new GeoipModule\Service\Geoip($options['filename'], $options['flag']);
                    return $geoip;
                }
            ),
        );
    }

}
