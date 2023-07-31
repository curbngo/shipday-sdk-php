<?php

namespace Hyperzod\ShipdaySdkPhp\Client;

/**
 * Interface for a Shipday client.
 */
interface BaseShipdayClientInterface
{
   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey();

   /**
    * Gets the base URL for Shipday's API.
    *
    * @return string the base URL for Shipday's API
    */
   public function getApiBase();
}
