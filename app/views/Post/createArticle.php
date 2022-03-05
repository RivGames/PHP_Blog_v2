<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<link rel="stylesheet" href="\public\css\post.css">
<title></title>
</head>
<body>
<h2>Создать статью</h2>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="/public/post/createArticle">
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Название">
            </div>
            <div class="form-group">
                <label for="content">Содержимое</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Создать</button>
        </form>
    </div>
</div>
</body>
</html>