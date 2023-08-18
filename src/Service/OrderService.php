<?php

namespace Hyperzod\ShipdaySdkPhp\Service;

use Hyperzod\ShipdaySdkPhp\Enums\HttpMethodEnum;

class OrderService extends AbstractService
{
   /**
    * Create a order on shipday
    *
    * @param array $params
    *
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function create(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/orders', $params);
   }

   /**
    * Fetch an order on shipday
    *
    * @param array $params
    *
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function fetch($order_number)
   {
      return $this->request(HttpMethodEnum::GET, "/orders/$order_number", []);
   }
}
