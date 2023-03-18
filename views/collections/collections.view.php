<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<div class="collection_txt">
  <p>КОЛЛЕКЦИИ</p>
</div>
<div class="collections">
  <?php foreach ($collections as $item) : ?>
    <a href="/app/tables/products/products.php?collection_id=<?= $item->id ?>">
      <div class="block">
        <img class="collection_pic" src="<?= $item->main_photo ?>" alt="" />
        <div class="collection_desc">
          <h3><?= mb_strtoupper($item->name) ?></h3>
          <hr>
          <p><?= $item->description ?></p>
          <button class="btn ">ПЕРЕЙТИ</button>
        </div>
      </div>
    </a>
  <?php endforeach ?>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>