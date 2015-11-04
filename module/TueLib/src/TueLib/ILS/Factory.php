<?php

namespace TueLib\ILS;


use Zend\ServiceManager\ServiceManager;

class Factory extends \VuFind\ILS\Driver\Factory
{
    public static function getTueLibILS(ServiceManager $sm)
    {
        return new TueLibILS(
            $sm->getServiceLocator()->get('VuFind\RecordLoader'),
            $sm->getServiceLocator()->get('VuFind\Search')
        );
    }

}