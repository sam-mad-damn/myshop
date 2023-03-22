<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>
<div class="help">
  <?php
  foreach ($articles_head as $item) : ?>
    <h3 class="head"><?= $item->head ?></h3>
    <?php
    $content = Articles::get_articles_help($item->id);
    foreach ($content as $item) : ?>
      <div class="body">
        <h3><?= $item->title ?></h3>

        <?php if ($item->photo) : ?>
          <div class="sizes">
            <p class="main-text">
              <?= $item->text ?>
            </p>
            <img class="size_table" src="<?= $item->photo ?>" alt="<?= $item->title ?>" />
          </div>
        <?php else : ?>
          <p class="main-text">
            <?= $item->text ?>
          </p>
        <?php endif ?>
      </div>
</div>
<?php endforeach ?>
<?php endforeach ?>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>