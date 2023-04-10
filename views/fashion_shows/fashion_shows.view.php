<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";?>
<div class="news_txt">
    <p><?= mb_strtoupper($articles_head->head)?></p>
</div>
<?php foreach (Articles::get_articles($articles_head->id) as $key => $item) :
    $photos = [];
    foreach (Articles::get_photos($item->id) as $photo) {
        $photos[] = $photo->photo;
    };
    $first = array_shift($photos);
    $art_key = $item->id;
?>
    <div class="shows">
        <div id="carouselExampleIndicators_<?= $art_key ?>" class="carousel slide" data-bs-ride="true">
            <div class="carousels">
                <div class="carousel-inner">
                    <div class="controls">
                        <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators_<?= $art_key ?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <div class="carousel-item active carousel_main">
                            <img src="<?= $first ?>" class="d-block " alt="...">
                        </div>
                        <?php foreach ($photos as $photo) : ?>
                            <div class="carousel-item">
                                <img src="<?= $photo ?>" class="d-block w-100" alt="...">
                            </div>
                        <?php endforeach ?>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_<?= $art_key ?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>
                </div>
                <div class="carousel-indicators">

                    <img type="button" src="<?= $first ?>" data-bs-target="#carouselExampleIndicators_<?= $art_key ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" id="indicator_slide"></img>

                    <?php foreach ($photos as $key => $photo) : ?>
                        <img type="button" src="<?= $photo ?>" data-bs-target="#carouselExampleIndicators_<?= $art_key ?>" data-bs-slide-to="<?= $key + 1 ?>" aria-label="Slide <?= $key + 2 ?>" id="indicator_slide"></img>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="shows_txt">
            <h4><?= mb_strtoupper($item->title) ?></h4>
            <p><?= $item->text ?></p>
        </div>
    </div>
    <div class="news_txt">
    </div>
<?php endforeach ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>