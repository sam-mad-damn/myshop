<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
if (!$product) : ?>
<div class="empt_bas">
  <h4 class="empty">К сожалению товара нет на складе, но скоро он появится!</h4>
  <a class="back" href="/app/tables/products/products.php">&#8592;Вернуться к товарам</a>
  </div>
<?php else : ?>
  <div class="product">
    <div class="photo">
      <img class="main_photo" src="<?= $product->photo ?>" alt="">
    </div>
    <div class="info">
      <?php if (isset($_SESSION["error"]["auth"])) : ?>
        <p class="error"><?= $_SESSION["error"]['auth'] ?></p>
      <?php endif ?>
      <h4 class="name"><?= $product->name ?></h4>
      <h4><?= $product->price ?>р.</h4>
      <h5><?= $product->description ?></h5>
      <p>Материал: <span><?= $product->material ?></span></p>
      <p>Коллекция: <span><a href="/app/tables/products/products.php?collection_id=<?= $product->collection_id ?>"><?= mb_strtoupper($product->collection) ?></a></span></p>
      <p>Размер:</p>
      <form action="/app/tables/baskets/add.product.php">
        <input hidden type="text" value="<?= $product->id ?>" name="product_position_id">
        <div class="sizes">
          <?php foreach (Product::get_product_sizes($product->id) as $size) : ?>
            <input class="custom-radio" <?php if (!empty($basket_products)) : foreach ($basket_products as $prod) : if ($prod->size_id == $size->size_id && $prod->product_id == $product->id) : echo ("checked");
                                            endif;
                                          endforeach;
                                        endif; ?> type="radio" name="size" id="<?= $size->size ?>" value="<?= $size->size_id ?>" /><label class="card_size" for="<?= $size->size ?>"><?= $size->size ?></label>
          <?php endforeach ?>
        </div>
        <p class="error"><?= $_SESSION["error"]["size"] ?? "" ?></p>
        <p class="good"><?= $_SESSION["good"] ?? "" ?></p>
        <button type="submit" class="collections_btn btn_basket">ДОБАВИТЬ В КОРЗИНУ</button>
        <?php if (!empty($basket_products)) :
          foreach ($basket_products as $prod) :
            if ($prod->product_id == $product->id) : ?>
              <p>Товар уже есть в корзине</p>
        <?php endif;
          endforeach;
        endif; ?>
      </form>
    </div>
  </div>
  <div class="collection_txt">
    <p>ТОВАРЫ ИЗ ЭТОЙ КОЛЛЕКЦИИ</p>
  </div>
  <div class="products">
    <div class="products_cards">
      <?php foreach ($collection_products as $item) : ?>
        <a href="/app/tables/products/product.php?id=<?= $item->id ?>">
          <div class="card" id="<?= $item->id ?>">
            <img class="card_img" src="<?= $item->photo ?>" alt="" />
            <p><?= $item->name ?></p>
          </div>
        </a>
      <?php endforeach ?>
      <a href="/app/tables/products/products.php?collection_id=<?= $product->collection_id ?>"><img id="arrow" src="/assets/img/стрелка.png" alt="Перейти к товарам этой коллекции" /></a>
    </div>
  </div>
  <script src="/assets/js/product.js"></script>
  <script src="/assets/js/fetch.js"></script>
<?php endif ?>
<?php unset($_SESSION["error"]);
unset($_SESSION["good"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>