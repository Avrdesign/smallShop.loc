<?php require_once "utils/DB.php" ?>
<?php require_once "models/Product.php" ?>
<?php require_once "repositories/ProductsRepository.php" ?>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <!--<link rel="stylesheet" type="text/css" href="src/css/style.css">-->
    <link rel="stylesheet" type="text/css" href="src/css/font-awesome-4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="src/css/main.css">
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="header-top">
                    <div class="col-sm-2 col-xs-6 text-center">
                        <img src="src/img/logo.png" alt="LOGO" class="logo">
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="info">
                                    Доставка заказов: 45 минут<br>
                                    с 11:00 до 23:00
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="info">
                                    Бесплатная доставка пиццы<br>
                                    при заказе от 14р.
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="info">
                                    Оплата наличными<br>
                                    или картой
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-6 text-center">
                        <div onclick="loadItems();"  class="cart-block" data-toggle="modal" data-target="#cart">
                            <img src="src/img/cart.png" class="cart">
                            <span class="cart-count" id="cartCount">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="row">
                <?php
                $products = new ProductsRepository();
                foreach ($products->getAllProducts() as $product) { ?>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="thumbnail">
                            <img src="src/img/<?php echo $product->getIcons(); ?>" alt="">
                            <div class="caption">
                                <h3><?php echo $product->getName(); ?></h3>
                                <p><?php echo $product->getDescription(); ?></p>
                                <p class="product-price"><?php echo $product->getPrice(); ?><span>руб.</span></p>
                                <p><button data-id="<?php echo $product->getProductId(); ?>" class="add btn-lg btn-success" role="button">Заказать</button></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <div id="cart" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ваш заказ</h4>
                </div>
                <form class="form order" id="order">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                            <th>Изображение</th>
                            <th>Название</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th>Удалить</th>
                            </thead>
                            <tbody id="tableProducts"></tbody>
                        </table>
                        <h2 class="pull-right total-summ" id="totalSumm">18<span>руб.</span></h2>

                        <div class="order-info">
                            <h4 class="text-center">Заполните форму:</h4>
                            <div class="form-group">
                                <label for="order1">Имя</label>
                                <input type="text" class="form-control" id="name" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <label for="order2">Адрес</label>
                                <input type="text" class="form-control" id="address" placeholder="Адрес">
                            </div>
                            <div class="form-group">
                                <label for="order3">Телефон</label>
                                <input type="text" class="form-control" id="phone" placeholder="Телефон">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="checkOut();" type="button" class="btn-lg btn-success" data-dismiss="modal">Заказать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>Designed and built with all the love in the world by @zankoTeam</p>
    </footer>
</div>


<script src="src/js/script.js"></script>

</body>
</html>
