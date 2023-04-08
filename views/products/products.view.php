<?php

use App\models\Product;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<script src="/assets/js/products.js"></script>
<div class="products_txt">
  <p>ТОВАРЫ</p>
</div>
<div class="sorting">
  <div class="dropdown">
    <button class="dropbtn">Сортировать</button>
    <div class="dropdown-content">
      <a href="/app/tables/products/products.php?sort=price_dec">сначала дорогие</a>
      <a href="/app/tables/products/products.php?sort=price_asc">сначала дешёвые</a>
    </div>
  </div>
</div>
<div class="products_block">
  <form action="/app/tables/products/products.php">
  <div class="features">
    <div class="accordion" id="accordionPanelsStayOpenExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            КОЛЛЕКЦИИ
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
          <div class="accordion-body">
              <input type="radio" onchange="this.form.submit()" id="all_collections" name="collection" checked value="all" class="custom-radio"><label for="all_collections" class="">Все</label>
              <?php foreach ($collections as $item) : ?>
                <input type="radio" onchange="this.form.submit()" id="<?= $item->name ?>" name="collection" value="<?= $item->id ?>" <?php if (isset($_GET["collection"])&& $_GET["collection"] == $item->id || isset($_GET["collection_id"]) && $_GET["collection_id"] == $item->id ) : echo ("checked");endif ?> class="custom-radio"><label for="<?= $item->name ?>" class=""><?= $item->name ?></label>
              <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
            ЦЕНА
          </button>
        </h2>
        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse <?php if (isset($_GET["price"]) && $_GET["price"]<100000): echo ("show");endif ?>" aria-labelledby="panelsStayOpen-headingTwo">
          <div class="accordion-body">
           
            <input class="custom-radio" type="radio" onchange="this.form.submit()"  name="price" id="all" value="100000" checked /><label for="all">смотреть
              все</label>
              <?php foreach($filter_prices as $price):?>
            <input class="custom-radio" <?php if (isset($_GET["price"]) && $_GET["price"] == $price) : echo ("checked");
                                                                  endif ?> type="radio" onchange="this.form.submit()" name="price" id="<?= $price?>" value="<?= $price?>" /><label for="<?= $price?>">до
              <?= $price?></label>
             <?php endforeach?>
            
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
            РАЗМЕРЫ
          </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse <?php if (isset($_GET["size"]) && $_GET["size"]!="all"): echo ("show");endif ?>" aria-labelledby="panelsStayOpen-headingThree">
          <div class="accordion-body sizes">
            
            <label for="all_sizes" class="size_btn">Все</label>
            <input type="radio" hidden onchange="this.form.submit()" id="all_sizes" name="size" checked value="all" class="size">
              <?php foreach ($sizes as $item) : ?>
                <label for="<?= $item->value ?>" class="size_btn"><?= $item->value ?></label>
                <input class="size" type="radio" name="size" onchange="this.form.submit()" <?php if (isset($_GET["size"]) && $_GET["size"] == $item->id) : echo ("checked");endif ?> id="<?= $item->value ?>" hidden value="<?= $item->id ?>" class="size_btn">
              <?php endforeach ?>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
            МАТЕРИАЛЫ
          </button>
        </h2>
        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse <?php if (isset($_GET["material"]) && $_GET["material"]!="all"): echo ("show");endif ?>" aria-labelledby="panelsStayOpen-headingFour">
          <div class="accordion-body">
              <input type="radio" onchange="this.form.submit()" id="all_materials" name="material" checked value="all" class="custom-radio"><label for="all_materials" class="">Все</label>
              <?php foreach ($materials as $item) : ?>
                <input type="radio" onchange="this.form.submit()" id="<?= $item->name ?>" name="material" value="<?= $item->id ?>" <?php if (isset($_GET["material"]) && $_GET["material"] == $item->id) : echo ("checked");
                                                                                                                                      endif ?> class="custom-radio"><label for="<?= $item->name ?>" class=""><?= $item->name ?></label>
              <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
  <div class="products">
    <?php foreach ($products_positions as $item) : ?>
      <a href="/app/tables/products/product.php?id=<?= $item->id ?>">
        <div class="card">
          <img class="pic_card" src="<?= $item->photo ?>" alt="" />
          <div class="card_head">
            <h4><?= $item->name ?></h4>
            <h5><?= $item->price ?> р.</h5>
          </div>
          <hr>
          <div class="card_main">
            <p><?= $item->description ?></p>
            <div class="card_sizes">
              <?php $sizes = Product::get_product_sizes($item->id);
              if (!$sizes) : ?>
                <h5>Товара пока нет на складе</h5>
              <?php else : ?>
                <?php foreach ($sizes as $size) : ?>
                  <h4 class="card_size"><?= $size->size ?></h4>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
  
</div>
<!-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        
        <li class="page-item"><a class="page-link" href="#"> &raquo;</a></li>
      </ul>
</nav> -->
</div>

<?php unset($_SESSION["good"]);include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>