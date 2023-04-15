<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
    header("Location: /app/admin/");
}

?><div class="block">
    <div class="row">
        <h3>Заказ № <span><?= $order_products[0]->order_id ?></span></h3>
    </div>
    <div class="row">
        <div class=" col-md-4">
            <p>Статус: <span><?= $order_products[0]->status ?></span></p>
            <p>Общая стоимость: <span>
                    <?php $sum = 0;
                    foreach ($order_products as $or) {
                        $sum += $or->quantity * $or->price;
                    }
                    echo ($sum . " ₽");
                    ?></span></p>
            <p>Пользователь: <span><?= $order_products[0]->user ?></span></p>
        </div>
        <div class="col-md-4">
            <p>Дата оформления: <span><?= date("d.m.y", strtotime($order_products[0]->created_at)) ?></span></p>
            <p>Дата изменения: <span><?= date("d.m.y", strtotime($order_products[0]->updated_at)) ?></span></p>
            <p>Тип оплаты: <span><?= $order_products[0]->pay_type ?></span></p>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr class="table-title">

                <th scope="col">ID</th>
                <th scope="col">Фото</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Размер</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Стоимость(за шт.)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order_products as $item) : ?>
                <tr>
                    <th scope="row">
                        <p id="id"><?= $item->product_id ?></p>
                    </th>
                    <td>
                        <img class="product_photo" src="<?= $item->photo ?>"></img>
                    </td>
                    <td>
                        <p><?= $item->name ?></p>
                    </td>
                    <td>
                        <p><?= $item->description ?></p>
                    </td>
                    <td>
                        <p><?= $item->size ?></p>
                    </td>
                    <td>
                        <p><?= $item->quantity ?></p>
                    </td>
                    <td>
                        <p><?= $item->price ?></p>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>