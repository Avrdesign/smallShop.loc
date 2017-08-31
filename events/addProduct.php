<?php
session_start();
require_once '../utils/DB.php';
require_once '../utils/ImageFileLoader.php';
require_once '../utils/ParsePizza.php';
const TABLE_NAME = 'pizza';

$imageLoader = new ImageFileLoader();

$message = "Ошибка!";
$status = "danger";

if(isset($_POST["default"])){
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $array = null;
    if (empty($name)){
        $message = "Название не должно быть пустым";
        echo $message;
    }else if (empty($price)){
        $message = "Цена не должна быть пустой";
        echo $message;
    }else {
        $imageName = $imageLoader->uploadImageFromFile('file', '../src/img/');
        $array = [
            "name" => $name,
            "description" => $description,
            "prise" => $price,
            "icon" => $imageName
        ];

        DB::getDB()->insert(TABLE_NAME, $array);
        $message = "Успех!";
        $status = "success";
    }
}else if(isset($_POST["parse"])){
    $parseLoader = new ParsePizza();
    $url = $_POST["url"];
    $type = $_POST["type"];
    $number = $_POST["number"];
    $array = null;
    switch ($type){
        case "1":
            $array = $parseLoader->parseFromPizzaMario($url,$number);
            $imageName = $imageLoader->uploadImageByUrl($array["src"],'../src/img/');
            unset($array["src"]);
            $array["icon"] = $imageName;
            $array["prise"] = 0;
            break;
        case "2":
            $array = $parseLoader->parseFromPizzaTempo($url,$number);
            $imageName = $imageLoader->uploadImageByUrl($array["src"],'../src/img/');
            unset($array["src"]);
            $array["icon"] = $imageName;
            $array["prise"] = 0;
            break;
        default:
            break;
    }

    if($array){
        if (DB::getDB()->insert(TABLE_NAME, $array)){
            $message = "Успех!";
            $status = "success";
        }
    }
}

$_SESSION["message"] = array(
    "status"    =>  $status,
    "text"      =>  $message
);
header('Location: /admin/products.php');