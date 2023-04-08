<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"]) {
  include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
} else {
  header("Location: /app/admin/");
}

use App\models\Articles; ?>
<script src="/assets/admin/js/articles.js"></script>
<div class="helps">
  <div class="header">
    <h3>Статьи помощи (<?= count($articles) ?>)</h3>
    <?php if (isset($_SESSION["error"]) && !empty($_SESSION["error"])) : ?>
      <p class="error"><?= $_SESSION["error"] ?></p>
    <?php elseif (isset($_SESSION["good"]) && !empty($_SESSION["good"])) : ?>
      <p class="good"><?= $_SESSION["good"] ?></p>
    <?php endif ?>
    <div class="btns"><button type="button" class="btn btn-outline-success add_art">Добавить</button>
    </div>
  </div>
  <table class="table table-hover">
    <thead>
      <tr class="table-title">
        <th scope="col">№</th>
        <th scope="col">Заголовок</th>
        <th scope="col">Название</th>
        <th scope="col">Описание</th>
        <th scope="col">Фото</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        foreach ($articles as $key => $item) :
          $photos = Articles::get_photos($item->id); ?>
          <th scope="row"><?= $key + 1 ?></th>
          <td><?= $item->head ?></td>
          <td><?= $item->title ?></td>
          <td><?= $item->text ?></td>
          <td><?php if (!empty($photos)) :
                foreach ($photos as $photo) :  ?>
                <img class="article_photo" src="<?= $photo->photo ?>" alt="">
              <?php endforeach ?>
            <?php else : ?>
              <p>Нет фото</p>
            <?php endif; ?>
          </td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">

              <button type="button" data-article-id="<?= $item->id ?>" class="btn btn-success change_article"><img data-article-id="<?= $item->id ?>" class="icon" src="/assets/img/free-icon-font-edit-3917361.png" alt="Редактировать"></button>
              <button type="button" class="btn del_article btn-danger" data-article-id="<?= $item->id ?>"><img data-article-id="<?= $item->id ?>" class="icon" src="/assets/img/free-icon-font-cross-3917759.png" alt="Удалить"></button>
            </div>
          </td>
      </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  <!-- Модальное окно добавление статьи -->
  <div class="modal-wrapper">
    <div class="modal_main ">
      <div class="modal__close">&times;</div>
      <h3 class="modal__title">Добавление статьи</h3>
      <form class="add_article" action="/app/admin/tables/articles/add.article.php" method="POST" enctype='multipart/form-data'>
        <div class="input-group mb-3 ">
          <span class="input-group-text " id="prod_name">Заголовок</span>
          <select name="head" id="">
            <?php foreach ($articles_heads as $item) : ?>
              <option value="<?= $item->id ?>"><?= $item->head ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="input-group mb-3 ">
          <span class="input-group-text " id="prod_name">Название</span>
          <input type="text" name="name" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="prod_name">
        </div>
        <div class="input-group mb-3 ">
          <span class="input-group-text" id="prod_desc">Описание</span>
          <textarea class="form-control" name="desc" placeholder="Описание" aria-describedby="prod_desc" aria-label="Описание"></textarea>
        </div>
        <div class="input-group mb-3 ">
          <span class="input-group-text" for="prod_photo">Фото</span>
          <input type="file" name="photo" class="form-control" id="prod_photo">
        </div>

        <div class="col-6 item8">
          <button type="submit" name="add" class="btn btn-success">Добавить статью</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Модальное окно изменение статьи -->
  <div class="modal-wrapper_change_product">
    <div class="modal_main_change_product ">
      <div class="modal__close_change_product">&times;</div>
      <h3 class="modal__title">Изменение статьи</h3>
      <form class="change_product" action="/app/admin/tables/articles/change.article.php" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3 ">
          <span class="input-group-text " id="prod_name">Заголовок</span>
          <select name="head_id" id="art_head">
            <?php foreach ($articles_heads as $item) : ?>
              <option value="<?= $item->id ?>"><?= $item->head ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="input-group mb-3 ">
          <span class="input-group-text " >Название</span>
          <input type="text" id="art_name" name="name" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="prod_name" value="">
        </div>
        <div class="input-group mb-3 ">
          <span class="input-group-text" >Описание</span>
          <textarea id="art_desc" class="form-control" name="desc" placeholder="Описание" aria-describedby="prod_desc" aria-label="Описание"
          value=""></textarea>
        </div>
        
        
        <div class="input-group mb-3 ">
          
          <span class="input-group-text" for="prod_photo">Фото</span>
          <img id="art_photo" src="" alt="">
          <input type="file" name="photo" class="form-control" id="prod_photo">
        </div>

        <div class="col-6 item_8">
          <input type="text" name="article_id" hidden value="">
          <button type="submit" name="change_art" class="btn btn-success">Сохранить</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Модальное окно удаление статьи -->
  <div class="modal-wrapper_del_products">
    <div class="modal_main_del_products">
      <div class="modal__close_del_products">&times;</div>
      <h3 class="modal__title">Удалить статью?</h3>
      <div class="del_products">
        <div class="prod mb-3">
          <div class="info">ID:<span id="info_id"></span>
          </div>
          <div class="info">Заголовок:<span id="info_head"></span>
          </div>
          <div class="info">Название:<span id="info_title"></span>
          </div>
          <div class="info">Описание:<span id="info_text"></span>
          </div>
        </div>
      </div>
      <div class="col-6">
        <form action="/app/admin/tables/articles/del.article.php" method="POST">
          <input type="text" hidden name="article_id" id="inp_article_id" value="">
          <button type="submit" class="btn btn-outline-danger del_product">Удалить</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php 
unset($_SESSION["good"]);
unset($_SESSION["error"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>