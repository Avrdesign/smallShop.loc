<?php

/**
 * Created by PhpStorm.
 * User: Dmitri Avramets
 * Date: 03.08.2017
 * Time: 18:58
 */
class User
{
    private $userId;
    private $name;
    private $email;
    private $password;
    private $mtsPhone;
    private $velcomPhone;
    private $title;
    private $description;
    private $h1;

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
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
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $mtsPhone
     */
    public function setMtsPhone($mtsPhone)
    {
        $this->mtsPhone = $mtsPhone;
    }

    /**
     * @return mixed
     */
    public function getMtsPhone()
    {
        return $this->mtsPhone;
    }

    /**
     * @param mixed $velcomPhone
     */
    public function setVelcomPhone($velcomPhone)
    {
        $this->velcomPhone = $velcomPhone;
    }

    /**
     * @return mixed
     */
    public function getVelcomPhone()
    {
        return $this->velcomPhone;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
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

    /**
     * @param mixed $h1
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;
    }

    /**
     * @return mixed
     */
    public function getH1()
    {
        return $this->h1;
    }
}