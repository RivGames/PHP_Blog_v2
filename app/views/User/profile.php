<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<link rel="stylesheet" href="\public\css\main.css">
</head>
<body>
<img src="\<?= $avatar ?>" class="avatar">
<form method="POST" action="/public/user/uploadAvatar" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlFile1">Выберите картинку</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить файл" />
  </div>
</form>
<h2>Профиль</h2>
<h3>Ваш Логин:<?= ($login)?></h3>
<h3>Ваше Имя:<?= ($name)?></h3>
<h3>Дата регистрации:<?= ($date)?></h3>
<div class="d-grid gap-2">
<?php if($_SESSION['user']['role'] == 3): ?>
<a class = "btn btn-dark" href="/public/admin/user">Админка</a>
<?php endif?>
<a class="btn btn-info" href="/public/post/myPosts" role="button">Мои посты</a>
<a class="btn btn-success" href="/public/user/changePassword" role="button">Изменить пароль</a>
<a class="btn btn-danger" href="/public/user/delete" role="button">Удалить аккаунт</a>
</div>
</body>
</html>