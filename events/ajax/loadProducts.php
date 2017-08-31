<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 10.08.2017
 * Time: 19:30
 */
require_once '../../utils/DB.php';



if(isset($_POST["products"])){
    $prods = $_POST["products"];
    $result = DB::getDB()->getItemsByArrayIds("pizza",$prods);
    echo json_encode($result);
}else{
    echo json_encode(["status"=>0]);
}

