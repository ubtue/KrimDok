<?php
namespace krimDok\Module\Config;

$config = array(
    'controllers' => [
        'invokables' => [
            'help' => 'krimDok\Controller\HelpController',
            'fidsystematik' => 'krimDok\Controller\FIDSystematikController',
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'newitems' => 'krimDok\Controller\Plugin\Factory::getNewItems',
        ],
    ],
    'vufind' => [
        'plugin_managers' => [
            'ils_driver' => [
                'factories' => [
                    'krimDokILS' => 'krimDok\ILS\Factory::getKrimDokILS'
                ],
            ],
        ],
    ],
);

$recordRoutes = array();
$dynamicRoutes = array();
$staticRoutes = array(
    'FIDSystematik/Home',
);

$routeGenerator = new \VuFind\Route\RouteGenerator();
$routeGenerator->addRecordRoutes($config, $recordRoutes);
$routeGenerator->addDynamicRoutes($config, $dynamicRoutes);
$routeGenerator->addStaticRoutes($config, $staticRoutes);

return $config;
