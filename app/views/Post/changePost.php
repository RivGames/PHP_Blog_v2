<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<link rel="stylesheet" href="\public\css\post.css">
<title></title>
</head>
<body>
<h2>Изменить пост</h2>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/public/post/changePost">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="content">Содержимое</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
            <input type="submit" name="button" class="btn btn-warning" value="Сохранить">
        </form>
    </div>
</div>
</body>
</html>