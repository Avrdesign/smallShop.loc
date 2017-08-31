<div class="col-sm-8 col-xs-12">
    <div class="row">

        <div class="col-xs-offset-2 col-xs-8">

            <?php if(isset($_SESSION["message"])){?>
                <div class="alert alert-<?php echo $_SESSION["message"]["status"];?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong><?php echo $_SESSION["message"]["status"] == "danger" ? "Ошибка! ":"Успех! ";?></strong><?php echo $_SESSION["message"]["text"];?>
                </div>
                <?php
                unset($_SESSION["message"]);
            }
            ?>
            <div class="thumbnail">
                <img src="<?php echo IMG_PATH.$product->getIcons();?>" alt="">
                <form action="../events/updateProduct.php" id="addItemForm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?php echo $product->getProductId();?>">
                        <div class="form-group">
                            <label for="addItemForm1">Название</label>
                            <input value="<?php echo $product->getName();?>" name="name" type="text" class="form-control" id="addItemForm1" placeholder="Название">
                        </div>
                        <div class="form-group">
                            <label for="addItemForm2">Описание</label>
                            <textarea rows="5" name="description" class="form-control" id="addItemForm2" placeholder="Описание"><?php echo $product->getDescription();?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="addItemForm2">Цена</label>
                            <input value="<?php echo $product->getPrice();?>" type="text" name="price" class="form-control" id="addItemForm2" placeholder="Цена">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" name="default" class="btn btn-primary" value="Добавить"/>
                    </div>
                </form>
                <style>
                    .gg{
                       position: absolute;
                        top:0;
                        right:0;
                        width: 40px;
                        height:40px;
                        border-radius: 50%;
                        border: 2px solid lightslategray;
                        color:white;
                        background-color: red;
                    }
                </style>
                <form action="../events/removeProduct.php"  method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product->getProductId();?>">
                    <button type="submit" class="gg pull-left">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>