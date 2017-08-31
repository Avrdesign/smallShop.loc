<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 8/14/17
 * Time: 4:18 PM
 */

require_once '../utils/DB.php';

const TABLE_NAME = 'orderTable';
const TABLE_NAME_ITEMS = 'OrderItem';

$id = $_POST["orderId"];
$where = ["orderId"=>$id];

DB::getDB()->delete(TABLE_NAME_ITEMS, $where);
DB::getDB()->delete(TABLE_NAME, $where);
header('Location: /admin/index.php');