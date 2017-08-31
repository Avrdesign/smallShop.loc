<?php

/**
 * Created by PhpStorm.
 * User: Dmitri Avramets
 * Date: 03.08.2017
 * Time: 18:55
 */
class OrderItemRelation
{
    const TABLE_NAME = 'OrderItem';

    public function getAllItemsByOrderId($OrderId)
    { //Возвращает массив объектов заказа по OrderId
        $array = DB::getDB()->getArrayFromTableWhere(self::TABLE_NAME, 'orderId', $OrderId);
        $items = array();
        foreach ($array as $item) {
            $order_item = new OrderItem;
            $order_item->setId($item[0]["id"]);
            $order_item->setProduct($item[0]["pizzaId"]);
            $order_item->setOrder($item[0]["orderId"]);
            $order_item->setCount($item[0]["count"]);

            $items[] = $order_item;

        }
        // return $items;
        return $array;
    }
}

