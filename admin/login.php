<?php
session_start();
if (!isset($_SESSION['user'])){
    if (isset($_POST["submit"]))
    {
        $login = $_POST["login"];
        $password = $_POST["password"];
        if ($login=='admin'&&md5($password)=='a384b6463fc216a5f8ecb6670f86456a'){
            $_SESSION['user']=$login;
            header("Location: index.php");
            exit;
        }
        else{
            print "пользователь не авторизован";
        }
    };

    echo '
    <meta charset="utf-8">
    <link rel="stylesheet" href="../src/css/login.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <script src="login.js"></script>
    <div class="login_wrapper">
        <form action="login.php" class="login_wrapper__form" name="login_form" id="login_form" enctype="multipart/form-data" method="post">
            <label class="login_wrapper__form__label">Введите логин<input class="login_wrapper__form__input_margin" type="text" placeholder="Логин" name="login"></label>
            <label class="login_wrapper__form__label">Введите пароль<input class="login_wrapper__form__input_margin" type="password" placeholder="Пароль" name="password"></label>
            <input class="login_wrapper__form__button" type="submit" name="submit" id="login_submit">
        </form>
    </div>';
}
?>

