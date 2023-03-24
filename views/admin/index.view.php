<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.auth.php";
?>

<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]) :
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
?>
    <div class="blocks">
        <div class="block order">
            <div class="main_block">
                <div class="block_info">
                    <h4>Заказы</h4>
                    <div class="count count_orders"><?= $orders_count?></div>
                </div>
                <img class="icon order_pic" src="/assets/img/shoppingbag_102718.svg" alt="">
            </div>
            <a href="admin_orders.html"><button class="block_btn">Подробнее...</button></a>

        </div>
        <div class="block products">
            <div class="main_block">
                <div class="block_info">
                    <h4>Товары</h4>
                    <div class="count count_products"><?= $products_count?></div>
                </div>
                <img class="icon products_pic" src="/assets/img/skirt_icon_126757 1.svg" alt="">
            </div>
            <a href="admin_products.html"><button class="block_btn">Подробнее...</button></a>

        </div>
        <div class="block collections">
            <div class="main_block">
                <div class="block_info">
                    <h4>Коллекции</h4>
                    <div class="count count_collections"><?= $collections_count?></div>
                </div>
                <img class="icon collections_pic" src="/assets/img/macwindows_102660.svg" alt="">
            </div>
            <a href="admin_collections.html"><button class="block_btn">Подробнее...</button></a>

        </div>
        <div class="block fashion_shows">
            <div class="main_block">
                <div class="block_info">
                    <h4>Показы мод</h4>
                    <div class="count count_shows"><?= $shows_count?></div>
                </div>
                <img class="icon fashion_shows_pic" src="/assets/img/multimeda_blink_flash_icon_149236.svg" alt="">
            </div>
            <a href="admin_shows.html"><button class="block_btn">Подробнее...</button></a>

        </div>
    <?php else : ?>
        <h2>Вход</h2>
        <form class="auth_formA" method="POST" action="/app/admin/tables/users/auth.php">
            <label for="login">Логин</label><input type="text" name="mail" id="login">
            <label for="password">Пароль</label><input type="password" name="password" id="password">

            <?php if (!empty($_SESSION["error"])) : ?>
                <p class="error"><?= $_SESSION["error"] ?></p>
            <?php endif; ?>

            <button name="btn_auth">Войти</button>
        </form>
    <?php endif ?>
    </div>

    <?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>