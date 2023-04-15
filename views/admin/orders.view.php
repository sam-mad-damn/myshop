<?php

use App\models\Order;

if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
    header("Location: /app/admin/");
}
?>
<div class="block">
    <div class="header">
        <h3>Заказы(<?= count($orders) ?>) <?php if (isset($text)) echo $text;
                                            else echo "" ?></h3>
    </div>
    <form class="filter" action="/app/admin/tables/orders/orders.php">
        <h5>Фильтровать по статусу:</h5>
        <?php foreach ($statuses as $item) : ?>
            <button type="submit" name="status_id" class="btn btn-light" value="<?= $item->id ?>">
                <p for=""><?= $item->name ?></p>
            </button>
        <?php endforeach ?>
        <button type="submit" name="status_id" class="btn btn-light" value="all">
            <p for="">все</p>
        </button>
    </form>
    <?= $_SESSION["error"] ?? "" ?>
    <table class="table ">
        <thead>
            <tr class="table-title">
                <th scope="col">ID</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Дата оформления</th>
                <th scope="col">Дата изменения</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Кол-во товаров</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $item) : ?>
                
                <tr <?php if ($item->status_id == 2) : echo("class='confirm'"); endif;?>>
                    <th scope="row">
                        <p id="id"><?= $item->id ?></p>
                    </th>
                    <td>
                        <p id="user_email"><?= $item->user ?></p>
                    </td>
                    <td>
                        <p id="created_at"><?= date("d.m.y", strtotime($item->created_at)) ?></p>
                    </td>
                    <td>
                        <p id="updated_at"><?= date("d.m.y", strtotime($item->updated_at)) ?></p>
                    </td>
                    <td>
                        <p id="price"><?= Order::get_total_cost($item->id); ?></p>
                    </td>
                    <td>
                        <p id="count"><?= Order::get_total_count($item->id); ?></p>
                    </td>
                    <td>
                        <p id="status"><?= $item->status; ?></p>
                        <?php if ($item->status_id == 5) : ?>
                            <p>причина отмены: <?= $item->cancel_reason ?></p>
                        <?php elseif ($item->status_id == 2) : ?>
                            <button type="submit" class="btn  confirm_order"><a href="/app/admin/tables/orders/orders.php?order_id=<?= $item->id ?>">завершить заказ</a></button>
                        <?php elseif ($item->status_id == 1) : ?>
                            <div>
                                <button type="submit" class="btn btn-success confirm_order" data-order-id="<?= $item->id ?>">
                                    <img class="confirm_order" data-order-id="<?= $item->id ?>" src="/assets/img/free-icon-font-check-3917749.png" alt="Подтвердить" srcset="">
                                </button>
                                <button type="button" class="btn btn-danger cancel_order" data-order-id="<?= $item->id ?>">
                                    <img class="cancel_order" data-order-id="<?= $item->id ?>" src="/assets/img/free-icon-font-cross-3917759.png" alt="Отклонить" srcset="">
                                </button>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="/app/admin/tables/orders/orders.products.php" method="POST">
                            <input type="text" hidden name="order_id" value="<?= $item->id ?>">
                            <button type="submit" class="btn btn-success"><img class="icon check_order" data-order-id="<?= $item->id ?>" src="/assets/img/free-icon-font-eye-3917112.png" alt="Подробнее"></button>
                        </form>

                    </td>


                <?php  endforeach; ?>
                </tr>
        </tbody>
    </table>
</div>
<!-- Модальное окно отклонение заказа -->
<div class="modal-wrapper_del_orders">
    <div class="modal_main_del_orders">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Отклонить заказ?</h3>

        <div class="del_orders">
            <div class="del_order mb-3">
                <div class="info">ID:<span id="info_id"></span>
                </div>
                <div class="info">Статус:<span id="info_status"></span>
                </div>
                <div class="info">Пользователь:<span id="info_user"></span>
                </div>
            </div>
        </div>
        <form action="/app/admin/tables/orders/cancel.order.php" method="POST">
            <div class="input-group mb-3 item3">
                <input type="text" id="order_id" hidden name="order_id" value="">
                <span class="input-group-text" id="prod_desc">Укажите причину*</span>
                <textarea class="form-control" required name="reason_cancel" placeholder="Причина отклонения" aria-describedby="prod_desc" aria-label="Описание"></textarea>
            </div>
            <div class="col-6">
                <button type="submit" name="cancel_order" class="btn btn-outline-danger">Отклонить</button>
            </div>
        </form>
    </div>
</div>
</div>
<script src="/assets/admin/js/orders.js"></script>
<script src="/assets/admin/js/modal.js"></script>
<script src="/assets/js/fetch.js"></script>
<?php unset($_SESSION["error"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>