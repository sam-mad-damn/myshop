<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
    header("Location: /app/admin/");
}

use App\models\Articles;

$count = 5; // количество полей для загрузки файлов
$i = 0;
?>
<script src="/assets/admin/js/shows.js"></script>
<div class="block">
    <div class="header">
        <h3>Показы мод(<?= count($shows) ?>)</h3>
        <div class="btns"><button type="button" class="add_show btn btn-outline-success">Добавить</button>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="table-title">
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Фото</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shows as $item) : ?>
                <tr>
                    <th scope="row"><?= $item->id ?></th>
                    <td><?= $item->title ?></td>
                    <td>
                        <div class="desc">
                            <p> <?= $item->text ?></p>
                        </div>
                    </td>
                    <td>
                        <div class="shows_pics">
                            <?php foreach (Articles::get_photos($item->id) as $photo) : ?>
                                <img class="shows_pic" src="<?= $photo->photo ?>" alt="">
                            <?php endforeach ?>
                        </div>
                    </td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                            <!-- <button type="button" class="btn sheck_show btn-success"><img data-show-id="<?= $item->id ?>" class="icon" src="/assets/img/eyeoutline_102638.svg" alt="Посмотреть"></button> -->
                            <button type="button" data-show-id="<?= $item->id ?>" class="btn del_show btn-danger"><img data-show-id="<?= $item->id ?>" class="icon" src="/assets/img/free-icon-font-cross-3917759.png" alt="Удалить"></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Модальное окно добавления показов -->
<div class="modal-wrapper">
    <div class="modal_main">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Добавление показа</h3>
        <form class="add_product" action="/app/admin/tables/shows/add.show.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3 item1">
                <span class="input-group-text " id="basic-addon1">Название</span>
                <input type="text" class="form-control" name="name" placeholder="Название" aria-label="Название" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 item2">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" name="desc" placeholder="Описание" aria-describedby="basic-addon3" aria-label="Описание"></textarea>
            </div>

            <div class="input-group mb-3 item3">
                <span class="input-group-text" for="inputGroupFile01">Фото(минимум 3)</span>

            </div>
            <?php while (++$i <= $count) : ?>
                <input type="file" name="photo[]" accept=".jpg, .jpeg, .png, .webp" class="form-control" id="inputGroupFile01">
            <?php endwhile ?>

            <div class="col-12 item4">
                <button type="submit" class="btn btn-success">Добавить показ</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно удаления показов -->
<div class="modal-wrapper_del_show">
    <div class="modal_main_del_show">
        <div class="modal__close_del_show">&times;</div>
        <h3 class="modal__title">Удалить показ?</h3>
        <div class="del_show">
            <div class="shows mb-3">
                <div class="btn-group">
                    <div class="info">ID:<p id="show_id"></p>
                    </div>
                    <div class="info">Название:<p id="show_name"></p>
                    </div>
                </div>
                <div class="photos">
                    <img src="" alt="">
                </div>
            </div>
            <form action="/app/admin/tables/shows/del.show.php" method="POST">
                <input type="text" hidden name="show_id" id="inp_show_id" value="">
                <button type="submit" class="btn btn-outline-danger del_product">Удалить</button>
            </form>
        </div>
    </div>
    <?php
    unset($_SESSION["good"]);
    unset($_SESSION["error"]);
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
    ?>