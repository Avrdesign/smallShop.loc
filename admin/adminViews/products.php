
<div class="col-sm-8 col-xs-12">
    <button type="button" class="btn btn-info btn-lg pull-left" id="addProduct" data-toggle="modal" data-target="#myModal">Добавить товар вручную</button>
    <button type="button" class="btn btn-info btn-lg pull-right" id="showParseForm" onclick="$('#parsePage').fadeIn();">Распарсить страницу</button>

    <div class="clearfix"></div>
    <?php if(isset($_SESSION["message"])){?>
        <div class="alert alert-<?php echo $_SESSION["message"]["status"];?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo $_SESSION["message"]["status"] == "danger" ? "Ошибка! ":"Успех! ";?></strong><?php echo $_SESSION["message"]["text"];?>
        </div>
        <?php
        unset($_SESSION["message"]);
    }
    ?>

    <div class="modal fade" tabindex="-1" role="dialog" id="myModal" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Добавить товар</h4>
                </div>
                <form action="../events/addProduct.php" id="addItemForm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="addItemForm3">Изображение</label>
                                <input type="file" name="file" id="addItemForm3">
                            </div>
                            <label for="addItemForm1">Название</label>
                            <input name="name" type="text" class="form-control" id="addItemForm1" placeholder="Название">
                        </div>
                        <div class="form-group">
                            <label for="addItemForm2">Описание</label>
                            <input type="text" name="description" class="form-control" id="addItemForm2" placeholder="Описание">
                        </div>
                        <div class="form-group">
                            <label for="addItemForm2">Цена</label>
                            <input type="text" name="price" class="form-control" id="addItemForm2" placeholder="Цена">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="default" class="btn btn-primary" value="Добавить"/>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="" id="parsePage" style="display: none">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#parsePage').fadeOut();"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center">Добавить товар</h4>
                </div>
                <form method="post" action="../events/addProduct.php">
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="parsePage1">Сайт</label>
                                    <select name="type" class="form-control" id="parsePage1">
                                        <option value="1">Pizza Mario</option>
                                        <option value="2">Pizza Tempo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="parsePage3">Url</label>
                                <input type="text" name="url" class="form-control" id="parsePage3" placeholder="url">
<!--                                <p>Для <i>Pizza Tempo</i> параметр - id контейнера, для <i>Pizza Mario</i> параметр - номер элемента на странице</p>-->
                            </div>
                            <div class="form-group">
                                <label for="parsePage2">Параметр</label>
                                <input type="text" name="number" class="form-control" id="parsePage2" placeholder="Параметр">
                                <p>Для <i>Pizza Tempo</i> параметр - id контейнера, для <i>Pizza Mario</i> параметр - номер элемента на странице</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="parse" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <?php foreach ($products as $product){ ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="<?php echo IMG_PATH.$product->getIcons();?>" alt="">
                    <div class="caption">
                        <h3><?php echo $product->getName();?></h3>
                        <p><a href="product.php?id=<?php echo $product->getProductId();?> " class="btn btn-primary width-60" role="button">Перейти</a></p>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>