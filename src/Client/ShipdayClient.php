<?php

namespace Hyperzod\ShipdaySdkPhp\Client;

use Hyperzod\ShipdaySdkPhp\Service\CoreServiceFactory;

class ShipdayClient extends BaseShipdayClient
{
    /**
     * @var CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->__get($name);
    }
}
