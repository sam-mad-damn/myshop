<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
var_dump($orders); ?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data-tab-pane" type="button" role="tab" aria-controls="data-tab-pane" aria-selected="true">
      ЛИЧНЫЕ ДАННЫЕ
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="delivery-tab" data-bs-toggle="tab" data-bs-target="#delivery-tab-pane" type="button" role="tab" aria-controls="delivery-tab-pane" aria-selected="false">
      ЗАКАЗЫ
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="buy-tab" data-bs-toggle="tab" data-bs-target="#buy-tab-pane" type="button" role="tab" aria-controls="buy-tab-pane" aria-selected="false">
      ПОКУПКИ
    </button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="data-tab-pane" role="tabpanel" aria-labelledby="data-tab" tabindex="0">
    <form class="profile_form" method="POST" action="/app/tables/users/change.profile.php">
      <div hidden class="form_inp">
        <label for="user_name">Имя: </label><input type="text" name="name" id="user_name" value="<?= $user->name ?>" />
      </div>
      <label class="form_label">Имя: <?= $user->name ?></label>
      <?php if (isset($_SESSION["error"]["name"])) : ?>
        <p class="error"><?= $_SESSION["error"]["name"] ?></p>
      <?php endif ?>
      <div hidden class="form_inp">
        <label for="user_surname">Фамилия: </label><input type="text" name="surname" id="user_surname" value="<?= $user->surname ?>" />

      </div>
      <label class="form_label">Фамилия: <?= $user->surname ?></label>
      <?php if (isset($_SESSION["error"]["surname"])) : ?>
        <p class="error"><?= $_SESSION["error"]["surname"] ?></p>
      <?php endif ?>
      <div hidden class="form_inp">
        <label for="user_email">E-mail:</label><input type="email" name="email" id="user_email" value="<?= $user->email ?>" />

      </div>
      <label class="form_label">E-mail: <?= $user->email ?></label>
      <?php if (isset($_SESSION["error"]["email"])) : ?>
        <p class="error"><?= $_SESSION["error"]["email"] ?></p>
      <?php endif ?>
      <div hidden class="form_inp">
        <label for="user_login">Логин:</label><input type="text" name="login" id="user_login" value="<?= $user->login ?>" />

      </div>
      <label class="form_label">Логин: <?= $user->login ?></label>
      <?php if (isset($_SESSION["error"]["login"])) : ?>
        <p class="error"><?= $_SESSION["error"]["login"] ?></p>
      <?php endif ?>
      <button class="save_profile" name="save_profile" hidden id="change_profile">Сохранить</button>
    </form>
    <button class="change_profile" id="change_profile">Редактировать</button>
    <a href="/app/tables/users/logout.php"><button id="exit">Выйти</button></a>
  </div>
  <div class="tab-pane fade" id="delivery-tab-pane" role="tabpanel" aria-labelledby="delivery-tab" tabindex="0">
    <?php foreach ($orders as $ord) :
      if ($ord->status_id != 4) : ?>
        <div class="order" id="order_962941234">
          <div class="order_title">
            Заказ №
            <div class="order_number"><?= $ord->id ?></div>
          </div>
          <div class="order_products">
            <?php foreach ($order_products as $prod) :
              if ($prod->id == $ord->id) : ?>
                <a class="product_a" href="/app/tables/products/product.php?id=<?= $prod->product_id ?>">
                  <div class="order_item">
                    <img class="order_pic" src="<?= $prod->photo ?>" alt="" />
                    <div class="info_product">
                      <p>
                        Название товара:<span class="product_name"><?= $prod->name ?></span>
                      </p>
                      <p>
                        Описание:<span class="product_description"><?= $prod->description ?></span>
                      </p>
                      <p>Стоимость:<span class="product_price"><?= $prod->product_price ?>р.</span></p>
                      <p>Размер:<span class="card_size"><?= $prod->size ?></span></p>
                      <p>Кол-во:<span class="product_price"><?= $prod->quantity ?></span></p>
                    </div>
                  </div>
                </a>
              <?php endif ?>
            <?php endforeach ?>
          </div>
          <div class="order_status">
            Статус:
            <div id="order_status"><?= $ord->status ?></div>
          </div>
          <div class="order_address">
            Адрес доставки:
            <div id="order_address"><?= $ord->point ?></div>
          </div>
          <div class="order_date">
            Ожидаемая дата прибытия:
            <div id="order_date"><?= $data ?></div>
          </div>
        </div>
    <?php endif;
    endforeach; ?>
    <?php if (empty($orders)) : ?>
      <h4>У вас нет активных заказов</h4>
    <?php endif ?>
  </div>
  <div class="tab-pane fade" id="buy-tab-pane" role="tabpanel" aria-labelledby="buy-tab" tabindex="0">
    <div class="buy">
      <?php foreach ($orders as $ord) :
        if ($ord->status_id == 4) :
          foreach ($order_products as $prod) :
            if ($prod->id == $ord->id) : ?>
              <a class="product_a" href="/app/tables/products/product.php?id=<?= $prod->product_id ?>">
                <div class="buy_item">
                  <img class="buy_pic" src="<?= $prod->photo ?>" alt="" />
                  <div class="buy_info">
                    <p id="price"><?= $prod->product_price ?>р.</p>
                    <p id="name"><?= $prod->name ?></p>
                  </div>
                </div>
              </a>
      <?php endif;
          endforeach;
        endif;
      endforeach ?>
    </div>
  </div>
</div>
<script src="/assets/js/profile.js"></script>
<?php unset($_SESSION["error"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>