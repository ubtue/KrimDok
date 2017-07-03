<?php

namespace krimDok\RecordDriver;
use VuFind\Exception\LoginRequired as LoginRequiredException;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class SolrMarc extends \TueLib\RecordDriver\SolrMarc
{
    public function canUseTAD($userId)
    {
        return $this->getDbTable('IxTheoUser')->canUseTAD($userId);
    }
}
