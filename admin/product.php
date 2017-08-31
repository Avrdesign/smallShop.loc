<?php
session_start();
require_once ("../models/Product.php");
require_once ("../utils/DB.php");
require_once ("../repositories/ProductsRepository.php");
define("IMG_PATH", "../src/img/");
$productRepository = new ProductsRepository();
$product = $productRepository->getProductByProductId($_GET["id"]);

include_once 'adminViews/header.php'; ?>
    <main class="main">
        <?php include_once 'adminViews/nav.php'; ?>
        <?php include_once 'adminViews/product.php'; ?>
    </main>
<?php include_once 'adminViews/footer.php'; ?>