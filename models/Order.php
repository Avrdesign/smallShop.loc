<?php

/**
 * Created by PhpStorm.
 * User: st
 * Date: 03.08.2017
 * Time: 18:56
 */
class Order
{
    private $orderId;
    private $userName;
    private $userPhone;
    private $userAddress;
    private $dateCreate;
    private $status;
    private $orderItems;
    private $totalPrice;


    /**
     * @param $orderId
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param $userName
     * @return $this
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
        return $this;

    }
    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param $userPhone
     * @return $this
     */
    public function setUserPhone($userPhone)
    {
        $this->userPhone = $userPhone;
        return $this;

    }
    /**
     * @return mixed
     */
    public function getUserPhone()
    {
        return $this->userPhone;
    }


    /**
     * @param $userAddress
     * @return $this
     */
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;
        return $this;

    }
    /**
     * @return mixed
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * @param $dateCreate
     * @return $this
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
        return $this;

    }
    /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }


    /**
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;

    }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    /**
     * @param $orderItems
     * @return $this
     */
    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
        return $this;

    }
    /**
     * @return array
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }



    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
        return $this;

    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

}