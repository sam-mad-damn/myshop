<?php  include_once $_SERVER["DOCUMENT_ROOT"]."/views/templates/header.php"?>
    <div class="products">
      <div class="products_txt">
        <p>ТОВАРЫ</p>
      </div>
      <div class="products_cards">
        <?php foreach($products as $item):?>
          <a href="/app/tables/products/product.php?position_id=<?= $item->id ?>">
          <div class="card" id="card1">
            <img class="card_img" src="<?= $item->photo?>" alt="" />
            <p><?= $item->name?></p>
          </div>
        </a>
        <?php endforeach?>
        <a href="/app/tables/products/products.php"><img id="arrow" src="/assets/img/стрелка.png" alt="Перейти к товарам" /></a>
      </div>
    </div>
    <div class="collections">
      <div class="collection_txt">
        <p>КОЛЛЕКЦИИ</p>
      </div>
      <a href="collections.html"><img id="block1" src="/assets/img/Group 6.png" alt="" /></a>
      <div class="collections_card">
        <a href="collections.html"><button class="collections_btn">ПЕРЕЙТИ К КОЛЛЕКЦИЯМ</button></a>
      </div>
    </div>
    <div class="news">
      <div class="news_txt">
        <p>ПОКАЗЫ МОД</p>
      </div>
      <div>
        <div class="news_all">
          <img class="pic_new" id="picnewleft" src="/assets/img/Показ мод1.jpg" alt="" />
          <div class="block_news">
            <div class="line">
              <p class="new_head">НОВОСТИ В МИРЕ МОДЫ</p>
              <p class="new_main">
                На показы Zegna, Alyx, Dolce & Gabbana, Prada, Fendi и других
                модных Домов съехались редакторы, модели, блогеры и даже
                футболисты национальных сборных.
              </p>
              <a class="new_next" href="fashion_shows.html">
                <p>Читать далее...</p>
              </a>
            </div>
          </div>
          <img class="pic_new" id="picnewright" src="/assets/img/Показы мод2.jpg" alt="" />
        </div>
      </div>
    </div>
<?php  include_once $_SERVER["DOCUMENT_ROOT"]."/views/templates/footer.php"?>