<?php

/**
 * Created by PhpStorm.
 * User: st
 * Date: 03.08.2017
 * Time: 18:55
 */
class Product
{
    private $productId;
    private $name;
    private $icons;
    private $price;
    private $description;

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }
    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $icons
     */
    public function setIcons($icons)
    {
        $this->icons = $icons;
    }
    /**
     * @return mixed
     */
    public function getIcons()
    {
        return $this->icons;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }


    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

}