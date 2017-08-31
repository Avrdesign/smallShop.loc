<?php

/**
 * Created by PhpStorm.
 * User: st
 * Date: 08.08.2017
 * Time: 20:43
 */
class UserRelation
{
    const TABLE_NAME = 'users';

    public function getUserById($userId)
    { //Возвращает массив полей пользователя по $userId
        $array = DB::getDB()->getArrayFromTableWhere(self::TABLE_NAME, 'userId', $userId);
        $items = array();
        foreach ($array as $item) {
            $order_item = new OrderItem;
            $order_item->setId($item[0]["id"]);
            $order_item->setProductId($item[0]["pizzaId"]);
            $order_item->setOrderId($item[0]["orderId"]);
            $order_item->setCount($item[0]["count"]);

            $items[] = $order_item;

        }
        // return $items;
        return $array;
    }
}