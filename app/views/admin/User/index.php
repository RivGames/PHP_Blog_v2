
<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<title><?= $title ?></title>
</head>
<body>
    <h1>Посты:</h1>
    <?php foreach($posts as $post): ?>
        <b><?= $post['title'] ?></b>
    <form action="/public/post/actPost" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="submit" name="button" class="btn btn-danger" value="Удалить">
    </form>
    <?php endforeach?>
    <h1>Пользователи</h1>
    <?php foreach($users as $user): ?>
        <b><?= $user['login'] ?></b>
    <form action="/public/admin/user/ban" method="POST">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input type="submit" name="button" class="btn btn-danger" value="Забанить">
    </form>
    <?php endforeach?>
    <h2>Забаненые пользователи</h2>
    <?php foreach($banned_users as $banned_user): ?>
        <b><?= $banned_user['login'] ?></b>
    <form action="/public/admin/user/unBan" method="POST">
        <input type="hidden" name="id" value="<?= $banned_user['id'] ?>">
        <input type="submit" name="button" class="btn btn-danger" value="Розбанить">
    </form>
    <?php endforeach?>

</body>
</html>