<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
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
    <a href="/app/tables/products/products.php"><img id="arrow" src="/assets/img/стрелка.png" alt="Перейти к товарам" /></a>
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
  <div>
    <div class="news_all">
      <a class="img_a" href="/app/tables/articles_fashion_shows/fashion_show.php"><img class="pic_new" id="picnewleft" src="/assets/img/Показ мод1.jpg" alt="" /></a>
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
      <a class="img_a" href="/app/tables/articles_fashion_shows/fashion_show.php"><img class="pic_new" id="picnewright" src="/assets/img/Показы мод2.jpg" alt="" /></a>
    </div>
  </div>
</div>
<div class="points">
  <div class="addresses_txt">
    <p>АДРЕСА ДОСТАВКИ</p>
  </div>
  <div class="address">
    <div class="addresses">
      <?php foreach ($points as $item) : ?>
        <p><? echo ($item->name . ", " . $item->work_time) ?></p>
      <?php endforeach ?>
    </div>
    <div class="map" >
      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5d2d751b341f2a01a49efbd45a5579b6002cab1e707f627ceb5e0190b7254d05&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
  </div>
  </div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>