<?php
namespace krimDok\Module\Config;

$config = array(
    'controllers' => [
        'invokables' => [
            'help' => 'krimDok\Controller\HelpController',
        ],
    ],
);

$recordRoutes = array();
$dynamicRoutes = array();
$staticRoutes = array();

$routeGenerator = new \VuFind\Route\RouteGenerator();
$routeGenerator->addRecordRoutes($config, $recordRoutes);
$routeGenerator->addDynamicRoutes($config, $dynamicRoutes);
$routeGenerator->addStaticRoutes($config, $staticRoutes);

return $config;
