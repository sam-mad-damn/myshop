<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/иконка/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/иконка/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/иконка/favicon-16x16.png" />
  <link rel="manifest" href="/assets/img/иконка/site.webmanifest" />
  <title>Unifflo</title>
  <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/header.css" />
  <link rel="stylesheet" href="/assets/css/footer.css" />
  <link rel="stylesheet" href="/assets/css/<?= $link ?>.css" />
  <script src="\assets\js\bootstrap\bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="cont">
    <div class="navigation sticky-top">
      <a href="/"><img class="logo" src="/assets/img/лого.png" alt="Логотип" /></a>
      <div class="headers">
        <a href="/app/tables/collections/collections.php">
        Коллекции
        </a>
        <a href="/app/tables/products/products.php">
          Товары
        </a>
        <?php
        if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
          <a href="/app/tables/users/auth.php">
          Вход
          </a>
          <a href="/app/tables/users/register.php">
          Регистрация
          </a>
        <?php else : ?>
          <a href="/app/tables/users/profile.php">
          Профиль
          </a>
          <a href="/app/tables/users/logout.php">
          Выйти
          </a>
          <a href="/app/tables/baskets/basket.php"><img id="cart" src="/assets/img/Корзина.png" alt="Корзина" /></a>
        <?php endif ?>

      </div>
      
    </div>
    <!-- <?php var_dump($_SESSION);?> -->