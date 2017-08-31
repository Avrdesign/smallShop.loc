<?php
session_start();
require_once '../utils/DB.php';
const TABLE_NAME = 'pizza';
$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];

$message = "Ошибка!";
$status = "danger";

if (empty($name)){
    $message = "Название не должно быть пустым";
}else if (empty($price)){
    $message = "Цена не должна быть пустой";
}else {
    $array = [
        "id" => $id,
        "name" => $name,
        "description" => $description,
        "prise" => $price
    ];
    $where =[
        "id" => $id
    ];
    DB::getDB()->update(TABLE_NAME, $array, $where);

       $message = "Успех!";
       $status = "success";
    }
$_SESSION["message"] = array(
    "status"    =>  $status,
    "text"      =>  $message
);

header('Location: /admin/product.php?id='.$id);