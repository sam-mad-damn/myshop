<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/иконка/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="img/иконка/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="img/иконка/favicon-16x16.png" />
    <link rel="manifest" href="img/иконка/site.webmanifest" />
    <title>Админ</title>

    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
<script src="\assets\js\bootstrap\bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/assets/admin/css/<?= $link?>.css" />
    <link rel="stylesheet" href="\assets\admin\css\header.css" />
    
</head>
<body>
    <div class="cont">
    <ul class="navA flex-column">
            <div class="lis">
            <li class="nav-item">
                    <a class="navA-link " href="/app/admin/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link" aria-current="page" href="/app/admin/tables/users/profile.php">Личный кабинет</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link " href="/app/admin/tables/orders/orders.php">Заказы</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link" href="/app/admin/tables/products/products.php">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link" href="/app/admin/tables/collections/collections.php">Коллекции</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link" href="/app/admin/tables/shows/show.php">Показы мод</a>
                </li>
                <li class="nav-item">
                    <a class="navA-link" href="/app/admin/tables/articles/articles.php">Статьи помощи</a>
                </li>
            </div>
        </ul>