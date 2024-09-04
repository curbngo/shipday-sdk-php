<?php

namespace Hyperzod\ShipdaySdkPhp\Service;

use Hyperzod\ShipdaySdkPhp\Enums\HttpMethodEnum;

class OrderService extends AbstractService
{
   /**
    * Create an order
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
    * Fetch an order
    * 
    * @param string $order_number
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function fetch($order_number)
   {
      return $this->request(HttpMethodEnum::GET, "/orders/$order_number", []);
   }

   /**
    * Edit an order
    * 
    * @param string $orderId
    * @param array $params
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function edit($orderId, array $params)
   {
      return $this->request(HttpMethodEnum::PUT, "/orders/edit/$orderId", $params);
   }

   /**
    * Retrieve active orders
    * 
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function retrieveActiveOrders()
   {
      return $this->request(HttpMethodEnum::GET, '/orders', []);
   }

   /**
    * Query orders
    * 
    * @param array $params
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function queryOrders(array $params)
   {
      return $this->request(HttpMethodEnum::POST, '/orders/query', $params);
   }

   /**
    * Delete an order
    * 
    * @param string $orderId
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function delete($orderId)
   {
      return $this->request(HttpMethodEnum::DELETE, "/orders/$orderId", []);
   }

   /**
    * Assign an order to a driver
    *
    * @param string $orderId
    * @param string $carrierId
    *
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    *
    */
   public function assignToDriver($orderId, $carrierId)
   {
      return $this->request(HttpMethodEnum::PUT, "/orders/assign/$orderId/$carrierId", []);
   }

   /**
    * Unassign an order from a driver
    * 
    * @param string $orderId
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function unassignFromDriver($orderId)
   {
      return $this->request(HttpMethodEnum::PUT, "/orders/unassign/$orderId", []);
   }

   /**
    * Update the status of an order
    * 
    * @param string $orderId
    * @param array $params
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function updateStatus($orderId, array $params)
   {
      return $this->request(HttpMethodEnum::PUT, "/orders/$orderId/status", $params);
   }

   /**
    * Mark order as ready to pickup
    * 
    * @param string $orderId
    * @param array $params
    * 
    * @throws \Hyperzod\ShipdaySdkPhp\Exception\ApiErrorException if the request fails
    * 
    */
   public function readyToPickup($orderId, array $params)
   {
      return $this->request(HttpMethodEnum::PUT, "/orders/$orderId/meta", $params);
   }
}
