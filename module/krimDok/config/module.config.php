<?php
namespace krimDok\Module\Config;

$config = array(
    'controllers' => [
        'invokables' => [
            'fidsystematik' => 'krimDok\Controller\FIDSystematikController',
            'help' => 'krimDok\Controller\HelpController',
            'static_pages' => 'krimDok\Controller\StaticPagesController',
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'newitems' => 'krimDok\Controller\Plugin\Factory::getNewItems',
        ],
    ],
    'router' => [
        'routes' => [
            'static-catalogs' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/static/catalogs',
                    'defaults' => [
                        'controller' => 'static_pages',
                        'action'     => 'catalogs',
                    ],
                ],
            ],
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
