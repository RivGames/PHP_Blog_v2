<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<title></title>
</head>
<body>
<h2>Авторизация</h2>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/public/user/login">
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" id="login" placeholder="Login">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Авторизоватся</button>
        </form>
    </div>
</div>
</body>
</html>