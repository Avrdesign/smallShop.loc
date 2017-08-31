<?php
require_once '../../utils/DB.php';

const TABLE_NAME = 'orderTable';

$id = $_POST["orderId"];

$array = ["status" => 1];
$where =["orderId" => $id];
DB::getDB()->update(TABLE_NAME, $array, $where);

echo json_encode(array("status"=>"ok"));