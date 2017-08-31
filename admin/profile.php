
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Продукты</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/profil.css">
    <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container wrapper">
    <div class="row">
        <header class="header">
            <h1>Администратор</h1>
        </header>
		<div class="col-sm-4 col-xs-12">
			<div class="bs-example" data-example-id="block-btns">
				<div class="well center-block" style="max-width:400px">
					<a href="/admin" type="button" class="btn btn-primary btn-lg btn-block">Заказы</a>
					<a href="/admin/products.php" type="button" class="btn btn-primary btn-lg btn-block">Продукты</a>
					<a href="/admin/profile.php" type="button" class="btn btn-primary btn-lg btn-block">Профиль</a>
				</div>
			</div>
		</div>

	<div class="col-sm-8 col-xs-12">
		<div class="page-header">
				<h1>Профиль <small>Изменить данные пользователя</small></h1>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Изменить данные пользователя</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" method="post" action="test.php">

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Name" placeholder="neme" name = 'name'>

							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Телефон Velcom</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Velcom Phone" name = 'velcomPhone' >

							</div>
						</div>


						<div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label">Телефон MTS</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="MTS Phone" name="MTSPhone">

							</div>
						</div>

                        <div class="form-group">
                            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputH1" class="col-sm-2 control-label">H1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="H1" name="h1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Description" name="description">
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Сохранить</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Изменить пароль</h3>
			</div>
			<div class="panel-body">

				<form class="form-horizontal" method="post" action="qq.php">

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Старый пароль</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3" placeholder="Old Password" name="oldPassword">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Новый пароль</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword3" placeholder="New Password" name="newPassword">
						</div>
					</div>


					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Повторите новый пароль</label>
						<div class="col-sm-10">

							<input type="password" class="form-control" id="inputPassword3" placeholder="Repeat new Password" name="repeatNewPassword">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Сохранить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>