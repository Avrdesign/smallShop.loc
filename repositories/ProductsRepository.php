<?php

/**
 * Created by PhpStorm.
 * User: Dmitri Avramets
 * Date: 03.08.2017
 * Time: 18:55
 */
class ProductsRepository
{
    const TABLE_NAME = 'pizza';

    public function getAllProducts(){ //Возвращает массив всех объектов продуктов
        $array = DB::getDB()->getAllData(self::TABLE_NAME);
        $products = array();
        foreach ($array  as  $product){
            $prod =  new Product;
            $prod->setProductId($product["id"]);
            $prod->setName($product["name"]);
            $prod->setDescription($product["description"]);
            $prod->setPrice($product["prise"]);
            $prod->setIcons($product["icon"]);

            $products[] = $prod;
        }

     return $products;
    }

    public function getProductByProductId($productId){ //Возвращает объект по id
        $array = DB::getDB()->getArrayFromTableWhere(self::TABLE_NAME,'id',$productId);
        $prod =  new Product;
        $prod->setProductId($array[0]["id"]);
        $prod->setName($array[0]["name"]);
        $prod->setIcons($array[0]["icon"]);
        $prod->setPrice($array[0]["prise"]);
        $prod->setDescription($array[0]["description"]);
        return $prod;
    }

}