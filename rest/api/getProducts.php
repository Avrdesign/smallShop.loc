<?php
require_once '../../utils/DB.php';

const TABLE_NAME = "pizza";

$products = DB::getDB()->getAllData(TABLE_NAME);

echo json_encode($products);