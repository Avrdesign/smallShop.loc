<?php

/**
 * Created by PhpStorm.
 * User: Dmitri Avramets
 * Date: 03.08.2017
 * Time: 18:55
 */
class OrderRepository
{

    const TABLE_NAME = 'orderTable';


    public function getOrders()
    {
        $orders = array();
        $ordersArray = DB::getDB()->getAllData(self::TABLE_NAME, "orderId");
        foreach ($ordersArray as $item) {
            $order = new Order();
            $order->setOrderId($item["orderId"]);
            $order->setDateCreate($item["dateCreate"]);
            $order->setStatus($item["status"]);
            $order->setTotalPrice($item["totalPrice"]);
            $order->setUserName($item["userName"]);
            $order->setUserPhone($item["userPhone"]);
            $order->setUserAddress($item["userAddress"]);
            $orders[] = $order;
        }

        return $orders;
    }

    public function getOrderTableByOrderId($productId){
        $items = DB::getDB()->getOrderById($productId);
        $order = null;
        $orderItems = array();
        foreach ($items as $item){
            if(empty($order)){
                $order = new Order();
                $order->setOrderId($productId);
                $order->setDateCreate($item["dateCreate"]);
                $order->setStatus($item["status"]);
                $order->setTotalPrice($item["totalPrice"]);
                $order->setUserName($item["userName"]);
                $order->setUserPhone($item["userPhone"]);
                $order->setUserAddress($item["userAddress"]);

            }
            $product = $this->getProduct($item);

            $orderItem = new OrderItem();
            $orderItem->setId($item["id"]);
            $orderItem->setCount($item["count"]);
            $orderItem->setOrder($order);
            $orderItem->setProduct($product);
            $orderItems[] = $orderItem;
        }
        $order->setOrderItems($orderItems);
        return $order;
    }

    private function getProduct(array $pr){
        $product = new Product();
        $product->setProductId($pr["pizzaId"]);
        $product->setName($pr["name"]);
        $product->setDescription($pr["description"]);
        $product->setPrice($pr["prise"]);
        $product->setIcons($pr["icon"]);
        return $product;
    }


}