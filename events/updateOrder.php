<?php
session_start();

require_once '../DB.php';

const TABLE_NAME = 'orderTable';

$orderStatus = $_POST["orderStatus"];
$id = $_POST["orderId"];

$message = "Ошибка!";
$status = "danger";

if ($orderStatus){

    $array = [
        "status" => $orderStatus
    ];
    $where =[
        "orderId" => $_POST["orderId"]
    ];

    DB::getDB()->update(TABLE_NAME, $array, $where);

    $message = "Успех!";
    $status = "success";
}else{

    $message = "Что-то пошло не так!";
    $status = "danger!";
}
$_SESSION["message"] = array(
    "status"    =>  $status,
    "text"      =>  $message
);

header('Location: index.php');