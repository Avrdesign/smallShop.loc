<?php

/**
 * Created by PhpStorm.
 * User: Dmitri Avramets
 * Date: 03.08.2017
 * Time: 19:37
 */
class OrderItem
{
    private $id;
    private $order;
    private $product;
    private $count;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }
    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

}