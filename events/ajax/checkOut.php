<?php
/**
 * Created by PhpStorm.
 * User: st
 * Date: 10.08.2017
 * Time: 20:55
 */

require_once "../../utils/DB.php";


$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$orderItems = $_POST["orderItems"];
if(isset($name,$address,$phone,$orderItems)){
    $totalPrice = 0;
    $idProducts = array();
    foreach ($orderItems as $item){
        $idProducts[] = $item["id"];
    }
    $products = DB::getDB()->getProductsFromTableWhere($idProducts);

    for ($i =0; $i<count($orderItems); $i++){
        $totalPrice  += $orderItems[$i]["count"] * getProductPrice($orderItems[$i]["id"],$products);
    }


    DB::getDB()->insert("orderTable",["userName"=>$name,"userAddress"=>$address,"userPhone"=>$phone,"status"=>0, "totalPrice"=>$totalPrice]);
    $orderId = DB::getDB()->getMaxId("orderTable");
    if(!$orderId){
        $orderId = 10;
    }
    DB::getDB()->insertOrderItems("OrderItem",$orderItems,$orderId);
    echo json_encode(["status"=>1, "order"=>$orderId]);
}else{
    echo json_encode(["status"=>0]);
}


function getProductPrice($id, $products){
    foreach ($products as $product) {
        if ($id == $product["id"]) {
            return $product["prise"];
        }
    }
    return null;
}
