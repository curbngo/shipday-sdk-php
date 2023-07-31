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
}
