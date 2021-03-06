<?php
namespace krimDok\Module\Config;

$config = array(
    'controllers' => [
        'factories' => [
            'browse' => 'krimDok\Controller\Factory::getBrowseController',
        ],
        'invokables' => [
            'acquisition_request' => 'krimDok\Controller\AcquisitionRequestController',
            'fidsystematik' => 'krimDok\Controller\FIDSystematikController',
            'help' => 'krimDok\Controller\HelpController',
            'search' => 'krimDok\Controller\SearchController',
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
                    'krimDok' => 'krimDok\ILS\Driver\Factory::getKrimDok'
                ],
            ],
            'recorddriver' => [
                'factories' => [
                    'solrmarc' => 'krimDok\RecordDriver\Factory::getSolrMarc'
                ],
            ],
            'search_params' => [
                'abstract_factories' => ['krimDok\Search\Params\PluginFactory'],
            ],
        ],
        'recorddriver_tabs' => [
            'VuFind\RecordDriver\SolrMarc' => [
                'tabs' => [
                    'Similar' => null,
                ],
            ],
        ],
    ],
);

$recordRoutes = [];
$dynamicRoutes = [];
$staticRoutes = [
    'AcquisitionRequest/Create',
    'AcquisitionRequest/Send',
    'FIDSystematik/Home',
    'Help/FAQ',
];

$routeGenerator = new \VuFind\Route\RouteGenerator();
$routeGenerator->addRecordRoutes($config, $recordRoutes);
$routeGenerator->addDynamicRoutes($config, $dynamicRoutes);
$routeGenerator->addStaticRoutes($config, $staticRoutes);

return $config;
