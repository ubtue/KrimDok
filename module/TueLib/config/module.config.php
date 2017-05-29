<?php
namespace TueLib\Module\Configuration;

$config = array(
    'controllers' => array(
        'invokables' => array(
            'proxy' => 'TueLib\Controller\ProxyController',
            'static_pages' => 'TueLib\Controller\StaticPagesController',
        ),
    ),
    'controller_plugins' => [
        'factories' => [
            'newitems' => 'TueLib\Controller\Plugin\Factory::getNewItems',
        ],
    ],
    'router' => array(
        'routes' => array(
            'proxy-load' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/Proxy/Load',
                    'defaults' => array(
                        'controller' => 'Proxy',
                        'action'     => 'Load',
                    )
                )
            ),
            'static-catalogs' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/static/catalogs',
                    'defaults' => array(
                        'controller' => 'static_pages',
                        'action'     => 'catalogs',
                    )
                )
            )
        )
    ),
    'vufind' => array(
        'plugin_managers' => array(
            'ils_driver' => array(
                'factories' => array(
                    'TueLibILS' => 'TueLib\ILS\Factory::getTueLibILS'
                )
            ),
            'recorddriver' => array(
                'factories' => array(
                    'solrmarc' => 'TueLib\RecordDriver\Factory::getSolrMarc',
                )
            )
        ),
        'recorddriver_tabs' => [
            'VuFind\RecordDriver\SolrMarc' => [
                'tabs' => [
                    'Similar' => null,
                ],
            ],
        ],
    )
);

return $config;
