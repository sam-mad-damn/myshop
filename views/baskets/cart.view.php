<?php

use App\models\Basket;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<script src="/assets/js/basket.js"></script>
<div class="cart_txt">
  <p>КОРЗИНА</p>
</div>
<div hidden class="empty_basket">
  <div class="empty_desc">
    <h4>Ваша корзина пуста!</h4>
    <h5>Вы можеть выбрать понравившийся товар в разделе "Товары"</h5>
    <h5>Последние поступления:</h5>
  </div>
  <div class="products_cards">
    <?php foreach ($products as $item) : ?>
      <a href="/app/tables/products/product.php?position_id=<?= $item->id ?>">
        <div class="card" id="card-<?= $item->id ?>">
          <img class="card_img" src="<?= $item->photo ?>" alt="" />
          <p><?= $item->name ?></p>
        </div>
      </a>
    <?php endforeach ?>
    <div><a href="/app/tables/products/products.php"><img id="arrow" src="/assets/img/стрелка.png" alt="Перейти к товарам" /></a>
    <a class="go_products" href="/app/tables/products/products.php">Перейти к товарам</a>
    </div>
  </div>
</div>
<div class="main_block">
  <div class="m">
    <div class="products">
      <div class="title">
        <h4>Краткое описание товаров(<span class="products_count total_count"><?= $total_count ?? 0 ?></span>)</h4>
        <button class="btn clean_basket">Очистить корзину</button>
      </div>
      <div class="items">
        <?php foreach ($basket as $item) : ?>
          <div class="product" id="<?= $item->id ?>">
            <div class="product_input">
              <a class="product_a" href="/app/tables/products/product.php?id=<?= $item->product_id ?>?size=<?= $item->size_id ?>">
                <h4 for="product_1"><?= $item->name ?></h4>
              </a>
              <button class="btn del_product delete" data-size-id="<?= $item->size_id ?>" data-product-id="<?= $item->product_id ?>">
                &#215;</button>
            </div>
            <div class="info_product">
              <a class="product_a" href="/app/tables/products/product.php?id=<?= $item->product_id ?>?size=<?= $item->size_id ?>"><img class="main_pic" src="<?= $item->photo ?>" alt="" /></a>
              <div class="main_info">
                <a class="product_a" href="/app/tables/products/product.php?id=<?= $item->product_id ?>?size=<?= $item->size_id ?>">
                  <h5 class="description">
                    <?= $item->description ?>
                  </h5>
                </a>
                <div class="sizes">
                  <p>Размер:</p>
                  <button class="card_size"><?= $item->size ?></button>
                </div>
                <p>Цена(за шт): <span class="price"><?= $item->price ?> р.</span></p>
                <div class="count">
                  <p>Количество:</p>
                  <button id="count_del" class="del count_btn" data-product-id="<?= $item->product_id ?>" data-size-id="<?= $item->size_id ?>" class="count_btn">-</button>
                  <label class="count_prod" id="count-<?= $item->product_id ?>"><?= $item->quantity ?></label>
                  <button data-size-id="<?= $item->size_id ?>" data-product-id="<?= $item->product_id ?>" class="add count_btn" id="count_add">+</button>
                </div>
                <p>Стоимость: <span class="tot_price"><?= Basket::get_total_cost($_SESSION["id"])  ?> р.</span></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>
    <div class="address">
      <div class="address_title">
        <h4>Пункт выдачи</h4>
        <button class="btn change_address">Изменить</button>
      </div>
      <p>
        Адрес:
        <span class="address_txt"><?php echo ($point->city . ", " . $point->name . ", ежедневно " . $point->work_time) ?></span>
      </p>
      <p>
        Примерная дата доставки:
        <span class="date_txt"><?= $data ?></span>
      </p>
    </div>
  </div>
  <div class="result">
    <h4>Итого</h4>
    <p>
      Стоимость заказа:
      <span class="price total_cost" id="res_price"><?= $total_sum ?? 0 ?></span>р.
    </p>
    <p>
      Доставка:
      <span class="res_address"><?php echo ($point->city . ", " . $point->name) ?></span>
    </p>
    <p>
      Оплата:
      <select class="pay">
        <option value="cart">Картой при получении</option>
        <option value="cash">Наличными при получении</option>
      </select>
    </p>
    <button class="res_btn make-order" data-point="<?= $point->id ?>" data-user="<?= $_SESSION["id"] ?>">ОФОРМИТЬ ЗАКАЗ</button>
  </div>

</div>
</div>

<!-- Модальное окно -->
<div class="modal-wrapper">
  <div class="modal">
    <div class="modal__close">&times;</div>
    <h3 class="modal__title">Выбрать адрес доставки</h3>
    <div id="modalForm">
      <div class="change_addresses">
        <?php foreach ($points as $item) : ?>
          <a href="/app/tables/baskets/basket.php?point_id=<?= $item->id ?>" class="modal_btn">
            <? echo ($item->city . ", " . $item->name . ", " . $item->work_time) ?>
          </a>
        <?php endforeach ?>
      </div>
      <div class="map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5d2d751b341f2a01a49efbd45a5579b6002cab1e707f627ceb5e0190b7254d05&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
      </div>
    </div>
  </div>
</div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>