<?php
session_start();
require_once '../utils/DB.php';

const TABLE_NAME = 'pizza';
$id = $_POST["id"];

$message = "Ошибка!";
$status = "danger";

if (!empty($id)){
    DB::getDB()->delete(TABLE_NAME, ["id" => $id]);
    $message = "Успех!";
    $status = "success";
}
$_SESSION["message"] = array(
    "status"    =>  $status,
    "text"      =>  $message
);

header('Location: /admin/products.php');