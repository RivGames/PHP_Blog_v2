<!doctype html>
<html lang="en">
  <head>
    <link rel="shortcut icon" type="image/svg" href="\public\css\bitcoin.png"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $title ?></title>
  </head>
  <body>
  <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" href="/public/">Главная</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/user/signup">Регистрация</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/user/login">Авторизация</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/user/logout">Logout</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/user/profile">Профиль</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/post/createArticle">Создать пост</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/public/post/posts">Посты</a>
  </li>
</ul>
    <?php if(isset($_SESSION['error'])): ?>
      <div class="alert alert-danger">
            <?= $_SESSION['error'];?>
            <?php unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>
    
    <?php if(isset($_SESSION['success'])): ?>
      <div class="alert alert-success">
            <?= $_SESSION['success'];?>
            <?php unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['dark'])): ?>
      <div class="alert alert-dark">
            <?= $_SESSION['dark'];?>
            <?php unset($_SESSION['dark']); ?>
      </div>
    <?php endif; ?>
    <?= $content ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <footer>
      <div class="container">
        <div class="d-flex justify-content-between">
          <div class="footer-right">
            <a href="#"></a>
          </div>
          <div class="footer-left">
            <a href="#"></a>
          </div>
        </div>
      </div>
    </footer>
  </body>
  
</html>