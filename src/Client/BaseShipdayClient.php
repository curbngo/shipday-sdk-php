<?php

namespace Hyperzod\ShipdaySdkPhp\Client;

use Exception;
use GuzzleHttp\Client;
use Hyperzod\ShipdaySdkPhp\Exception\InvalidArgumentException;

class BaseShipdayClient implements ShipdayClientInterface
{

   /** @var string default base URL for Shipday's API */

   const PRODUCTION_API_BASE = 'https://api.shipday.com';

   /** @var array<string, mixed> */
   private $config;

   /**
    * Initializes a new instance of the {@link BaseShipdayClient} class.
    *
    * The constructor takes two arguments.
    * @param string $api_key the API key of the client
    */

   public function __construct($api_key)
   {
      $config = $this->validateConfig(array(
         "api_key" => $api_key
      ));

      //Set the base URL
      $config['api_base'] = self::PRODUCTION_API_BASE;

      $this->config = $config;
   }

   /**
    * Gets the API key used by the client to send requests.
    *
    * @return null|string the API key used by the client to send requests
    */
   public function getApiKey()
   {
      return $this->config['api_key'];
   }

   /**
    * Gets the base URL for Shipday's API.
    *
    * @return string the base URL for Shipday's API
    */
   public function getApiBase()
   {
      return $this->config['api_base'];
   }

   /**
    * Sends a request to Shipday's API.
    *
    * @param string $method the HTTP method
    * @param string $path the path of the request
    * @param array $params the parameters of the request
    */

   public function request($method, $path, $params)
   {
      $client = new Client([
         'headers' => [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'Authorization' => 'Basic ' . $this->getApiKey()
         ]
      ]);

      $api = $this->getApiBase() . $path;

      $response = $client->request($method, $api, [
         'http_errors' => true,
         'body' => json_encode($params)
      ]);

      return $this->validateResponse($response);
   }

   /**
    * @param array<string, mixed> $config
    *
    * @throws InvalidArgumentException
    */
   private function validateConfig($config)
   {
      // api_key
      if (!isset($config['api_key'])) {
         throw new InvalidArgumentException('api_key field is required');
      }

      if (!is_string($config['api_key'])) {
         throw new InvalidArgumentException('api_key must be a string');
      }

      if ('' === $config['api_key']) {
         throw new InvalidArgumentException('api_key cannot be an empty string');
      }

      if (preg_match('/\s/', $config['api_key'])) {
         throw new InvalidArgumentException('api_key cannot contain whitespace');
      }

      return [
         "api_key" => $config['api_key']
      ];
   }

   private function validateResponse($response)
   {
      $status_code = $response->getStatusCode();

      if ($status_code >= 200 && $status_code < 300) {
         $response = json_decode($response->getBody(), true);
         return $response;
      } else {
         throw new Exception("Error in server response. Status code: $status_code");
      }
   }
}
