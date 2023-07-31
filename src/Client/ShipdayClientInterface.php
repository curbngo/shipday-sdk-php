<?php

namespace Hyperzod\ShipdaySdkPhp\Client;

/**
 * Interface for a Shipday client.
 */
interface ShipdayClientInterface extends BaseShipdayClientInterface
{
   /**
    * Sends a request to Shipday's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */
   public function request($method, $path, $params);
}
