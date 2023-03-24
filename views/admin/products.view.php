<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
?>
<div class="block">
    <div class="header">
        <h3>Товары</h3>

        <div class="btns"><button type="button" class="btn btn-outline-success .add_prod">Добавить</button>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="table-title">
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Фото</th>
                <th scope="col">Цена, р</th>
                <!-- <th scope="col">Кол-во</th> -->
                <th scope="col">Материал</th>
                <th scope="col">Коллекция</th>
                <th scope="col">Размер</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <th scope="row">
                        <p id="product_id"><?= $product->id ?></p>
                    </th>
                    <td>
                        <p id="product_name"><?= $product->name ?></p>
                    </td>
                    <td>
                        <p id="product_description"><?= $product->description ?></p>
                    </td>
                    <td><img class="product_pic" src="<?= $product->photo ?>" alt=""></td>
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
                                <p class="product_size"><?= $item->size ?></p>
                            <?php endforeach ?>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-success change_prod"><img class="icon" src="/assets/img/3643749-edit-pen-pencil-write-writing_113397.svg" alt="Редактировать"></button>

                            <button type="button" class="btn btn-danger del_prod"><img class="icon" src="/assets/img/crossoutline_102628.svg" alt="Удалить"></button>
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
        <form class="add_product" action="">
            <div class="input-group mb-3 item1">
                <span class="input-group-text " id="prod_name">Название</span>
                <input type="text" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="prod_name">
            </div>
            <div class="input-group mb-3 item2">
                <span class="input-group-text" id="prod_price">Цена</span>
                <input type="text" class="form-control" placeholder="1000" aria-label="Цена" aria-describedby="prod_price">
                <span class="input-group-text">р</span>
            </div>
            <div class="input-group mb-3 item3">
                <span class="input-group-text" id="prod_desc">Описание</span>
                <textarea class="form-control" placeholder="Описание" aria-describedby="prod_desc" aria-label="Описание"></textarea>
            </div>
            <div class="input-group mb-3 item4">
                <span class="input-group-text" id="prod_material">Материал</span>
                <input type="text" class="form-control" placeholder="Материал" aria-label="Материал" aria-describedby="prod_material">
            </div>
            <div class="input-group mb-3 item5">
                <span class="input-group-text" for="prod_photo">Фото</span>
                <input type="file" class="form-control" id="prod_photo">
            </div>
            <div class="collections item6">
                <span class="input-group-text" id="prod_collection">Коллекция</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="casualFashion">
                    <label class="form-check-label" for="casualFashion">
                        Casual Fashion
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="scottishStyle">
                    <label class="form-check-label" for="scottishStyle">
                        Scottish Style
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="gothicVibes">
                    <label class="form-check-label" for="gothicVibes">
                        Gothic Vibes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="designerCreations">
                    <label class="form-check-label" for="designerCreations">
                        Designer Creations
                    </label>
                </div>
            </div>
            <div class="sizes item7">
                <span class="input-group-text" id="prod_size">Размер</span>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        S
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                    <label class="form-check-label" for="flexCheckDefault2">
                        M
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                        L
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                    <label class="form-check-label" for="flexCheckDefault4">
                        XL
                    </label>
                </div>

            </div>
            <div class="col-6 item8">
                <button type="submit" class="btn btn-success">Добавить товар</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно изменение товара -->
<div class="modal-wrapper_change_product">
    <div class="modal_main_change_product ">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Изменение товара</h3>
        <form class="change_product" action="">
            <div class="input-group mb-3 item_1">
                <span class="input-group-text " id="prod_name_с">Название</span>
                <input type="text" class="form-control" aria-label="Название" aria-describedby="prod_name_с" value="LOEWE">
            </div>
            <div class="input-group mb-3 item_2">
                <span class="input-group-text" id="prod_price_c">Цена</span>
                <input type="text" class="form-control" aria-label="Цена" aria-describedby="prod_price_c" value="2500">
                <span class="input-group-text">р</span>
            </div>
            <div class="input-group mb-3 item_3">
                <span class="input-group-text" id="prod_material_c">Материал</span>
                <input type="text" class="form-control" aria-label="Материал" aria-describedby="prod_material_c" value="Хлопок">
            </div>
            <div class="input-group mb-3 item_4">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" aria-describedby="basic-addon3" aria-label="Описание">Свободная юбка миди черного цвета в классическом стиле c широкой драпировкой</textarea>
            </div>
            <div class="input-group mb-3 item_5">
                <span class="input-group-text" for="inputGroupFile01">Фото</span>
                <div class="form-control" class="change_product_photo">
                    <img class="change_product_pic" src="img/card1.jpg" alt="">
                    <input type="file" class="form-control" id="inputGroupFile01" accept=".jpg, .jpeg, .png">
                </div>


            </div>
            <div class="collections item_6">
                <span class="input-group-text" id="basic-addon5">Коллекция</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Casual Fashion
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Scottish Style
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        Gothic Vibes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        Designer Creations
                    </label>
                </div>
            </div>
            <div class="sizes item_7">
                <span class="input-group-text" id="basic-addon6">Размер</span>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                    <label class="form-check-label" for="flexCheckDefault1">
                        S
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                    <label class="form-check-label" for="flexCheckDefault2">
                        M
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                    <label class="form-check-label" for="flexCheckDefault3">
                        L
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                    <label class="form-check-label" for="flexCheckDefault4">
                        XL
                    </label>
                </div>
            </div>
            <div class="col-6 item_8">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно удаление товара -->
<div class="modal-wrapper_del_products">
    <div class="modal_main_del_products">
        <div class="modal__close_del_products">&times;</div>
        <h3 class="modal__title">Удалить выбранные товары?(<p id="sproducts_count">1</p>)</h3>
        <div class="del_products">
            <div class="prod mb-3">
                <div class="btn-group">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        LOEWE
                    </button>
                    <div class="dropdown-menu">
                        <div class="info">ID:<p id="info_id">1</p>
                        </div>
                        <img class="prod_pic" src="img/card1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-outline-danger">Удалить</button>
            <button type="submit" class="btn btn-light">Отмена</button>
        </div>
    </div>
</div>
<script src="/assets/admin/js/products.js"></script>
<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
?>