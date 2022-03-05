<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<title></title>
</head>
<body>
<h2>Регистрация</h2>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/public/user/signup">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
            <label for="password"></label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Пароль">
            </div>
            <div class="form-group">
            <label for="confirmPassword"></label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Подтвердите пароль">
            </div>
            <button type="submit" class="btn btn-default">Зарегистрироватся</button>
        </form>
    </div>
</div>
</body>
</html>