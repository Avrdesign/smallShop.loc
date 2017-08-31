<?php
/**
 * Created by PhpStorm.
 * User: alexandrzanko
 * Date: 8/15/17
 * Time: 3:27 PM
 */
require_once "../utils/DB.php";
require_once "../models/Order.php";
require_once "../repositories/OrderRepository.php";
/**
 * @var Order $order;
 */
$orders = (new OrderRepository())->getOrders();
?>
<div class="col-sm-8 col-xs-12">
    <div class="row">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>№</th>
                <th>Имя Клиента</th>
                <th>Телефон Клиента</th>
                <th>Адрес Клиента</th>
                <th>Сумма заказ</th>
                <th>Статус</th>
                <th>Дата заказ</th>
            </tr>
            </thead>
            <?php foreach ($orders as $order){ ?>
                <tbody>
                <tr>
                    <th scope="row"><a href="order.php?id=<?php echo $order->getOrderId();?>"><?php echo $order->getOrderId();?></a></th>
                    <td><?php echo $order->getUserName();?></td>
                    <td><?php echo $order->getUserPhone();?></td>
                    <td><?php echo $order->getUserAddress();?></td>
                    <td><?php echo $order->getTotalPrice();?></td>
                    <td style="color:<?php echo $order->getStatus() == 0 ? "red" : "green";?>"><?php echo $order->getStatus() == 0 ? "На обработке" : "Принят";?></td>
                    <td><?php echo $order->getDateCreate();?></td>
                </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>

