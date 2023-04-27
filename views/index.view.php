<?php

use App\models\Basket;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<div class="products">
  <div class="products_txt">
    <p>ТОВАРЫ</p>
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
<div class="collections">
  <div class="collection_txt">
    <p>КОЛЛЕКЦИИ</p>
  </div>
  <a href="/app/tables/collections/collections.php"><img id="block1" src="/assets/img/Group 6.png" alt="" /></a>
  <div class="collections_card">
    <a href="/app/tables/collections/collections.php"><button class="collections_btn">ПЕРЕЙТИ К КОЛЛЕКЦИЯМ</button></a>
  </div>
</div>
<div class="news">
  <div class="news_txt">
    <p>ПОКАЗЫ МОД</p>
  </div>
 
    <div class="news_all">
      <a  href="/app/tables/articles_fashion_shows/fashion_show.php"><img id="picnewleft" class="img_a" src="/assets/img/Показ мод1.jpg" alt="" /></a>
      <div class="block_news">
        <div class="line">
          <p class="new_head">НОВОСТИ В МИРЕ МОДЫ</p>
          <p class="new_main">
            На показы Zegna, Alyx, Dolce & Gabbana, Prada, Fendi и других
            модных Домов съехались редакторы, модели, блогеры и даже
            футболисты национальных сборных.
          </p>
          <a class="new_next" href="/app/tables/articles_fashion_shows/fashion_show.php">
            Читать далее...
          </a>
        </div>
      </div>
      <a  href="/app/tables/articles_fashion_shows/fashion_show.php"><img  class="img_a" id="picnewright" src="/assets/img/Показы мод2.jpg" alt="" /></a>
    </div>
  
</div>
<div class="points">
  <div class="addresses_txt">
    <p>АДРЕСА ДОСТАВКИ</p>
  </div>
  <div class="address">
    <div class="addresses">
      <?php foreach ($cities as $item) : ?>
        
        <table class=" table table-striped">
          <thead>
          
            <tr>
              <th><div>Город <span class="city"><?= $item->name ?></span></div></th>
              <th class='time'>Время работы</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (Basket::find_points_by_city($item->id) as $point) : ?>
              <tr>
                <td><?= $point->name ?></td>
                <td class="time"><?= $point->work_time ?></td>
              </tr>
            <?php endforeach ?>

          <?php endforeach ?>
          </tbody>
        </table>
    </div>
    <div class="map">
      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5d2d751b341f2a01a49efbd45a5579b6002cab1e707f627ceb5e0190b7254d05&amp;width=100%25&amp;lang=ru_RU&amp;scroll=true;title=map"></script>
    </div>
  </div>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>