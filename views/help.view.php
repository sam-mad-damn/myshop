<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";?>
<div class="helps">
  <?php
  foreach ($articles_head as $item) : ?>
  <div class="item">
    <h3 class="head"><?= $item->head ?></h3>
    <?php
    $content = Articles::get_articles($item->id);
    foreach ($content as $item) :
      $photos = Articles::get_photos($item->id); ?>
      <div class="body">
        <h3><?= $item->title ?></h3>

        <?php if (!empty($photos)) :
          foreach ($photos as $photo) : ?>
            <div class="sizes">
              <p class="main-text">
                <?= $item->text ?>
              </p>
              <img class="size_table" src="<?= $photo->photo ?>" alt="<?= $item->title ?>" />
            </div>
          <?php endforeach ?>

        <?php else : ?>
          <p class="main-text">
            <?= $item->text ?>
          </p>
        <?php endif ?>
      </div>
<?php endforeach ?>
</div>
<?php endforeach ?>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>