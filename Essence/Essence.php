<?php

namespace Kayue\EssenceBundle\Essence;

use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\ArrayCache;

class Essence extends \Essence\Essence
{
    protected $essence;

    public function __construct($cacheDriver)
    {
        $this->essence = \Essence\Essence::instance(array(
            'Cache' => new Cache($this->getCache($cacheDriver)),
        ));
    }

    public function getInstance()
    {
        return $this->essence;
    }

    private function getCache($name)
    {
        switch($name) {
            case 'apc':
                return new ApcCache();
            default:
                return new ArrayCache();
        }
    }
}
