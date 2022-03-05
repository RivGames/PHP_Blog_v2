<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
</head>
<body>
<h2>Профиль</h2>
<h3>Ваш Логин:<?= ($login)?></h3>
<h3>Ваше Имя:<?= ($name)?></h3>
<h3>Дата регистрации:<?= ($date)?></h3>
<div class="d-grid gap-2">
<a class="btn btn-info" href="/public/post/myPosts" role="button">Мои посты</a>
<a class="btn btn-success" href="/public/user/changePassword" role="button">Изменить пароль</a>
<a class="btn btn-danger" href="/public/user/delete" role="button">Удалить аккаунт</a>
</div>
</body>
</html>