<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<script src="/assets/js/product.js"></script>

<div class="product">
  <div class="photo">
    <img class="main_photo" src="<?= $product->photo ?>" alt="">
  </div>
  <div class="info">
    <?php if (isset($_SESSION["error"]["auth"])) : ?>
      <span class="error"><?= $_SESSION["error"]['auth'] ?></span>
    <?php endif ?>
    <?php if (isset($_SESSION["error"]["size"])) : ?>
      <span class="error"><?= $_SESSION["error"]["size"] ?></span>
    <?php elseif (isset($_SESSION["good"])) : ?>
      <span class="good"><?= $_SESSION["good"] ?></span>
    <?php endif ?>
    <h4 class="name"><?= $product->name ?></h4>
    <h3 class="price"><?= $product->price ?>р.</h3>
    <h5><?= $product->description ?></h5>
    <p>Материал: <span><?= $product->material ?></span></p>
    <p>Коллекция: <span><a href="/app/tables/products/products.php?collection_id=<?= $product->collection_id ?>"><?= $product->collection ?></a></span></p>
    <?php if (empty((Product::get_product_sizes($product->id)))) : ?>
      <p class="error">Товара нет на складе</p>
    <?php else : ?>
      <p>Размер:</p>
      <form action="/app/tables/baskets/add.product.php">

        <input hidden type="text" value="<?= $product->id ?>" name="product_position_id">
        <div class="sizes">
          <?php foreach (Product::get_product_sizes($product->id) as $size) : ?>
            <input class="custom-radio" type="radio" name="size" id="<?= $size->size ?>" value="<?= $size->size_id ?>" /><label class="card_size" for="<?= $size->size ?>"><?= $size->size ?></label>
          <?php endforeach ?>
        </div>

        <button type="submit" class="collections_btn btn_basket">ДОБАВИТЬ В КОРЗИНУ</button>

        <?php
        if (!empty($basket_products)) :
          $count = 0;
          foreach ($basket_products as $prod) :
            if ($prod->product_id == $product->id) : $count = 1;
            endif;
          endforeach;
          if ($count != 0) : ?>
            <p><a href="/app/tables/baskets/basket.php"> Товар уже есть в корзине</a></p>
        <?php endif;
        endif; ?>

      </form>

    <?php endif; ?>
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
    <div>
    <a href="/app/tables/products/products.php?collection_id=<?= $product->collection_id ?>"><img id="arrow" src="/assets/img/стрелка.png" alt="Перейти к товарам этой коллекции" /></a>
    <a class="go_products" href="/app/tables/products/products.php?collection_id=<?= $product->collection_id ?>">Перейти к товарам</a></div>
  </div>
</div>

<?php unset($_SESSION["error"]);
unset($_SESSION["good"]);
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>