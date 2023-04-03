<?php

use App\models\Product;

if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
    header("Location: /app/admin/");
}
?>
<div class="block">
    <div class="header">
        <h3>Товары (<?= count($products)?>)<?php if (count($products) > 0 && isset($text)): echo $text; else: echo ""; endif;?></a></h3>
        <?php if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) : ?>
            <p class="error"><?= $_SESSION["error"] ?></p>
        <?php elseif (isset($_SESSION["good"]) && !empty($_SESSION["good"])) : ?>
            <p class="good"><?= $_SESSION["good"] ?></p>
        <?php endif ?>
        <div class="btns"><button type="button" class="btn btn-outline-success add_prod">Добавить</button>
        </div>
    </div>
    <form class="filter" action="/app/admin/tables/products/products.php">
        <h5>Фильтровать по коллекции:</h5>
        <?php foreach ($collections as $item) : ?>
            <button type="submit" name="collection_id" class="btn btn-light" value="<?= $item->id ?>">
                <p for=""><?= $item->name ?></p>
            </button>
        <?php endforeach ?>
        <button type="submit" name="collection_id" class="btn btn-light" value="all">
            <p for="">Все</p>
        </button>
    </form>
    <table class="table table-hover">
        <thead>
            <tr class="table-title">
                <th scope="col">№</th>
                <th scope="col">Фото</th>
                <th scope="col">Название</th>
                <th scope="col">Цена, р</th>
                <!-- <th scope="col">Кол-во</th> -->
                <th scope="col">Материал</th>
                <th scope="col">Коллекция</th>
                <th scope="col">Размер</th>
                <th scope="col">Кол-во, шт</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <th scope="row">
                        <p id="product_id"><?= $key + 1 ?></p>
                    </th>
                    <td><img class="product_pic" src="<?= $product->photo ?>" alt=""></td>
                    <td>
                        <p id="product_name"><?= $product->name ?></p>
                    </td>

                    <td>
                        <p id="product_price"><?= $product->price ?></p>
                    </td>
                    <!-- <td>
                        <p id="product_count"><?= $product->count ?></p>
                    </td> -->
                    <td>
                        <p id="product_material"><?= $product->material ?></p>
                    </td>
                    <td>
                        <p id="product_collection"><?= $product->collection ?></p>
                    </td>
                    <td>
                        <div class="product_sizes">
                            <?php foreach (Product::get_product_sizes($product->id) as $item) : ?>
                                <p class="product_size"><?= $item->size ?> - <?= $item->count ?>шт.</p>
                            <?php endforeach ?>
                        </div>
                    </td>
                    <td>
                        <p><?= Product::get_product_count($product->id)->sum ?? 0 ?></p>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" data-product-id="<?= $product->id?>" class="btn btn-success change_prod"><img data-product-id="<?= $product->id?>" class="icon" src="/assets/img/3643749-edit-pen-pencil-write-writing_113397.svg" alt="Редактировать"></button>

                            <button type="button" data-product-id="<?= $product->id?>" class="btn btn-danger del_prod"><img class="icon" src="/assets/img/crossoutline_102628.svg" data-product-id="<?= $product->id?>" alt="Удалить"></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Модальное окно добавление товара -->
<div class="modal-wrapper">
    <div class="modal_main ">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Добавление товара</h3>
        <form class="add_product" action="/app/admin/tables/products/add.product.php" method="POST" enctype='multipart/form-data'>
            <div class="input-group mb-3 item1">
                <span class="input-group-text " id="prod_name">Название</span>
                <input type="text" name="name" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="prod_name">
            </div>
            <div class="input-group mb-3 item2">
                <span class="input-group-text" id="prod_price">Цена</span>
                <input type="text" name="price" class="form-control" placeholder="1000" aria-label="Цена" aria-describedby="prod_price">
                <span class="input-group-text">р</span>
            </div>
            <div class="input-group mb-3 item3">
                <span class="input-group-text" id="prod_desc">Описание</span>
                <textarea class="form-control" name="desc" placeholder="Описание" aria-describedby="prod_desc" aria-label="Описание"></textarea>
            </div>
            <div class="input-group mb-3 item4">
                <span class="input-group-text" id="prod_material">Материал</span>
                <input type="text" name="material" class="form-control" placeholder="Материал" aria-label="Материал" aria-describedby="prod_material">
            </div>
            <div class="input-group mb-3 item5">
                <span class="input-group-text" for="prod_photo">Фото</span>
                <input type="file" name="photo" class="form-control" id="prod_photo">
            </div>
            <div class="collections item6">
                <span class="input-group-text" id="prod_collection">Коллекция</span>
                <?php foreach ($collections as $item) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="collection" id="<?= $item->name ?>" value="<?= $item->id ?>">
                        <label class="form-check-label" for="<?= $item->name ?>">
                            <?= $item->name ?>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="sizes item7">
                <span class="input-group-text" id="prod_size">Размер</span>
                <?php foreach ($sizes as $item) : ?>
                    <div class="form-check">
                        <input class="form-check-input" name="size[]" type="checkbox" value="<?= $item->id ?>" id="<?= $item->value ?>">
                        <label class="form-check-label" for="<?= $item->value ?>">
                            <?= $item->value ?>
                        </label>
                        <div class="counts" hidden id="<?= $item->id?>">
                            <label  for="<?= $item->id?>">Кол-во:</label><input type="number"  name="count_by_size[]" value="0" id="<?= $item->id?>">
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-6 item8">
                <button type="submit" name="add" class="btn btn-success">Добавить товар</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно изменение товара -->
<div class="modal-wrapper_change_product">
    <div class="modal_main_change_product ">
        <div class="modal__close_change_product">&times;</div>
        <h3 class="modal__title">Изменение товара</h3>
        <form class="change_product" action="/app/admin/tables/products/change.product.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3 item_1">
                <span class="input-group-text " id="prod_name_с">Название</span>
                <input type="text" name="name" id="name" class="form-control" aria-label="Название" aria-describedby="prod_name_с" value="">
            </div>
            <div class="input-group mb-3 item_2">
                <span class="input-group-text" id="prod_price_c">Цена</span>
                <input type="text" name="price" id="price" class="form-control" aria-label="Цена" aria-describedby="prod_price_c" value="">
                <span class="input-group-text">р</span>
            </div>
            <div class="input-group mb-3 item_3">
                <span class="input-group-text" id="prod_material_c">Материал</span>
                <input type="text" name="material" id="material" class="form-control" aria-label="Материал" aria-describedby="prod_material_c" value="">
            </div>
            <div class="input-group mb-3 item_4">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" id="desc" name="desc" aria-describedby="basic-addon3" aria-label="Описание"></textarea>
            </div>
            <div class="input-group mb-3 item_5">
                <span class="input-group-text" for="inputGroupFile01">Фото</span>
                <div class="form-control" class="change_product_photo">
                    <img class="change_product_pic" id="photo" src="" alt="">
                    <input type="file" name="photo" class="form-control photo" id="inputGroupFile01" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class="collections item_6">
                <span class="input-group-text" id="basic-addon5">Коллекция</span>
                <?php foreach ($collections as $item) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="collection" id="<?= $item->name ?>-c" value="<?= $item->id ?>">
                        <label class="form-check-label" for="<?= $item->name ?>-c">
                            <?= $item->name ?>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="sizes item_7">
                <span class="input-group-text" id="basic-addon6">Размер</span>
                <?php foreach ($sizes as $item) : ?>
                    <div class="form-check">
                        <input class="form-check-input" name="size[]" type="checkbox" value="<?= $item->id ?>" id="<?= $item->value ?>-c">
                        <label class="form-check-label" for="<?= $item->value ?>-c">
                            <?= $item->value ?>
                        </label>
                        <div class="counts" hidden id="<?= $item->id?>">
                            <label  for="<?= $item->id?>">Кол-во:</label><input type="number"  name="count_by_size[]" value="0" id="<?= $item->id?>">
                        </div>
                        
                    </div>
                <?php endforeach ?>
            </div>
            <div class="col-6 item_8">
                <input type="text" name="product_id" hidden value="">
                <button type="submit" name="change_prod" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно удаление товара -->
<div class="modal-wrapper_del_products">
    <div class="modal_main_del_products">
        <div class="modal__close_del_products">&times;</div>
        <h3 class="modal__title">Удалить товар?</h3>
        <div class="del_products">
            <div class="prod mb-3">
            <div class="info">ID:<span id="info_id"></span>
                </div>
                <div class="info">Название:<span id="info_status"></span>
                </div>
                <div class="info ">Фото:<image class="product_photo" id="info_image"></image>
                </div>
            </div>
        </div>
        <div class="col-6">
        <form action="/app/admin/tables/products/del.product.php" method="POST">
                <input type="text" hidden name="product_id" id="inp_product_id" value="">
                <button type="submit" class="btn btn-outline-danger del_product">Удалить</button>
            </form>
        </div>
    </div>
</div>
<script src="/assets/admin/js/products.js"></script>
<?php
unset($_SESSION["error"]);
unset($_SESSION["good"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
?>