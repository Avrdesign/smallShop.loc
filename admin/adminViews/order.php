<div class="col-sm-8 col-xs-12">
    <div class="row">
        <div class="col-xs-12">
            <div class="thumbnail">
               <div class="caption">
                    <h3>Заказ №<?php echo $order->getOrderId();?></h3>
                    <?php
                    /**
                     * @var Order $order;
                     * @var OrderItem $item;
                     * @var Product $product;
                     */
                    ?>
                    <p><strong>Время заказа: </strong><?php echo $order->getDateCreate();?></p>
                    <p><strong>Имя заказчика: </strong><?php echo $order->getUserName();?></p>
                    <p><strong>Номер телефона: </strong><?php echo $order->getUserPhone();?></p>
                    <p><strong>Адрес доставки: </strong><?php echo $order->getUserAddress();?></p>
                    <p><strong>Статус заказа: </strong><span class="order_status"><?php echo $order->getStatus() == 0 ? "На рассмотрении" : "Принят";?></span></p>
                    <h4>Детали заказа:</h4>

                    <?php foreach ($order->getOrderItems() as $item) {
                        $product = $item->getProduct();
                        ?>
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12">
                                        <img src="../src/img/<?php echo $product->getIcons();?>" alt="<?php echo $product->getName();?>" width="100">
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <p><strong>Продукт: </strong><?php echo $product->getName();?></p>
                                        <p><strong>Количество: </strong><?php echo $item->getCount();?></p>
                                        <p><strong>Стоимость: </strong><?php echo $item->getCount()*$product->getPrice();?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                   <?php }?>
                   <h4><span class="label label-danger">Сумма: <?php echo $order->getTotalPrice();?></span></h4>
                   <p><strong>Статус заказа: </strong><span class="order_status"><?php echo $order->getStatus() == 0 ? "На рассмотрении" : "Закрыт";?></span></p>
                   <?php if($order->getStatus() == 0) {?>
                       <div class="btn-group order_status_buttons" role="group" aria-label="...">
                           <form action="../events/removeOrder.php" method="post" class="pull-left">
                               <input type="hidden" name="orderId" value="<?php echo $order->getOrderId();?>">
                               <button type="submit" class="btn btn-warning" value="Отказано" data-id="deny">Отказать</button>
                           </form>
                           <button type="button" class="btn btn-success" value="<?php echo $order->getOrderId();?>" data-id="agree">Одобрить</button>
                       </div>
                   <?php } ?>

               </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var agreed = $('[data-id = "agree"]');
        var order_status = "Принят";
        agreed.on('click', sendData);

        function sendData() {
            var order_id = $(this).val();
            $.ajax({
                dataType: "json",
                method: 'POST',
                url: "../events/ajax/updateOrder.php",
                data: {"orderId":order_id},
                success: function() {
                    $(".order_status_buttons").css('display','none');
                    $(".order_status").html(order_status);
                },
                error: function() {
                    $(".order_status").html("Ошибка обработки данных");
                    console.log("error");
                }
            });
        }
    });
</script>