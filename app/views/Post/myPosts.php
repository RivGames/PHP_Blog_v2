<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
</head>
<body>
    <h1>Выберите посты которые вы хотите удалить или изменить</h1>
    <h2>Ваших постов: <?= $total ?></h2>
    <?php foreach($myposts as $post): ?>
    <form action="/public/post/actPost" method="POST">
        <li><?= $post['title']?>
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="submit" name="button" class="btn btn-danger" value="Удалить">
    </form>
    <form action="/public/post/changePost" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <input type="submit" name="button" class="btn btn-warning" value="Редактировать">
    </form>
    <?php endforeach ?>
</body>
</html>