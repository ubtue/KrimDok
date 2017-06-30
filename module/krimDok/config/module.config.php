<?php
namespace krimDok\Module\Config;

$config = array(
    'controllers' => [
        'invokables' => [
            'help' => 'krimDok\Controller\HelpController',
            'fidsystematik' => 'krimDok\Controller\FIDSystematikController',
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
