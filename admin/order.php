<?php include_once 'adminViews/header.php';
require_once '../utils/DB.php';
require_once '../models/Product.php';
require_once '../repositories/ProductsRepository.php';
require_once '../models/OrderItem.php';
require_once '../repositories/OrderItemRelation.php';
require_once '../models/Order.php';
require_once '../repositories/OrderRepository.php';

error_reporting(1);
$idOrder = $_GET["id"];
$order = (new OrderRepository())->getOrderTableByOrderId($idOrder);
?>
    <main class="main">
        <?php include_once 'adminViews/nav.php'; ?>
        <?php include_once 'adminViews/order.php'; ?>
    </main>
<?php include_once 'adminViews/footer.php'; ?>