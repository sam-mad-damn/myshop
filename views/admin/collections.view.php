<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
    header("Location: /app/admin/");
}
?>
<script src="/assets/admin/js/collections.js"></script>
<div class="block">
    <div class="header">
        <h3>Коллекции(<?= count($collections) ?>)</h3>
        <div class="btns"><button type="button" class="add_collection btn btn-outline-success">Добавить</button>
        </div>
    </div>
    <p class="good"><?= $_SESSION["good"]??""?></p>
    <p class="error"><?= $_SESSION["error"] ?? "" ?></p>
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
            <?php foreach ($collections as $item) : ?>
                <tr>
                    <th scope="row">
                        <p id="collection_id"><?= $item->id ?></p>
                    </th>
                    <td>
                        <p id="collection_name"><?= $item->name ?></p>
                    </td>
                    <td>
                        <p id="collection_description"><?= $item->description ?></p>
                    </td>
                    <td><img class="collection_pic" src="<?= $item->main_photo ?>" alt=""></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="/app/admin/tables/products/products.php?collection_id=<?= $item->id?>">
                            <button type="submit" name="collection_id" value="<?= $item->id ?>" class="btn sheck_show btn-success"><img data-collection-id="<?= $item->id ?>" class="icon" src="/assets/img/free-icon-font-eye-3917112.png" alt="Посмотреть"></button>
                        </a>    
                        <button type="button" class="btn btn-danger"><img data-collection-id="<?= $item->id?>" class="icon del_collection" src="/assets/img/crossoutline_102628.svg" alt="Удалить"></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Модальное окно добавление коллекции -->
<div class="modal-wrapper collection_add">
    <div class="modal_main">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Добавление коллекции</h3>
        <form class="add_collection" action="/app/admin/tables/collections/add.collection.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3 item1">
                <span class="input-group-text " id="basic-addon1">Название</span>
                <input type="text" required name="name" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3 item2">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" name="description" required placeholder="Описание" aria-describedby="basic-addon3" aria-label="Описание"></textarea>
            </div>
            <div class="input-group mb-3 item3">
                <span class="input-group-text" for="inputGroupFile01">Фото</span>
                <input type="file" class="form-control" name="photo" required id="inputGroupFile01">
            </div>
            <div class="col-6 item4">
                <button type="submit" name="add" class="btn btn-success">Добавить коллекцию</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно удаления коллекции -->
<div class="modal-wrapper_del_collection">
    <div class="modal_main_del_collection">
        <div class="modal__close_del_collections">&times;</div>
        <h3 class="modal__title">Удалить коллекцию?</h3>
        <div class="del_collections">
            <div class="collections mb-3">
                    <div class="info">ID:<span id="col_id"></span>
                    </div>
                    <div class="info">Название:<span id="col_name"></span>
                    </div>
                    
                    <div class="info ">Фото:<img src="" id="col_photo" alt="">
                    </div>
            </div>
        </div>
        <div class="col-6">
            <form action="/app/admin/tables/collections/del.collection.php" method="POST">
                <input type="text" name="collect_id" hidden id="">
    <button type="submit" class="del_col btn btn-outline-danger">Удалить</button>
</form>
</div>
    </div>
</div>

</div>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['good']);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
?>