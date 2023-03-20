<?php

use App\models\Articles;

include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<div class="news_txt">
    <p>ПОКАЗЫ МОД</p>
</div>
<?php foreach ($articles as $key => $item) :
    $photos = [];
    foreach (Articles::get_photos_by_article($item->id) as $photo) {
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

                        <!-- <div class="carousel-item">
                        <img src="/assets/img/показ Loewe/Keqt0JdC0tA.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ Loewe/mGfYcGTmpEQ.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ Loewe/sji81-ASVsM.jpg" class="d-block w-100" alt="...">
                    </div>  -->
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
                    <!-- <img type="button" src="/assets/img/показ Loewe/Keqt0JdC0tA.jpg" data-bs-target="#carouselExampleIndicators_1" data-bs-slide-to="2" aria-label="Slide 3" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ Loewe/mGfYcGTmpEQ.jpg" data-bs-target="#carouselExampleIndicators_1" data-bs-slide-to="3" aria-label="Slide 4" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ Loewe/sji81-ASVsM.jpg" data-bs-target="#carouselExampleIndicators_1" data-bs-slide-to="4" aria-label="Slide 5" id="indicator_slide"></img> -->
                </div>

            </div>
        </div>
        <div class="shows_txt">
            <h2><?= $item->title ?></h2>
            <p><?= $item->main_text ?></p>
        </div>
    </div>
    <div class="news_txt">
    </div>
<?php endforeach ?>
<!-- <div class="shows"> -->
<!-- <div id="carouselExampleIndicators_2" class="carousel slide" data-bs-ride="true">
        <div class="carousels">
            <div class="carousel-inner">
                <div class="controls">
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators_2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <div class="carousel-item active carousel_main">
                        <img src="/assets/img/показ PRADA/2slobJmJAN4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ PRADA/3GAJW809Mso.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ PRADA/7C6da-ybR7o.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ PRADA/9BFh_a-HdAQ.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ PRADA/ycPVlsIWkSM.jpg" class="d-block w-100" alt="...">
                    </div>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
                </div>
            </div>
            <div class="carousel-indicators">
                <img type="button" src="/assets/img/показ PRADA/2slobJmJAN4.jpg" data-bs-target="#carouselExampleIndicators_2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ PRADA/3GAJW809Mso.jpg" data-bs-target="#carouselExampleIndicators_2" data-bs-slide-to="1" aria-label="Slide 2" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ PRADA/7C6da-ybR7o.jpg" data-bs-target="#carouselExampleIndicators_2" data-bs-slide-to="2" aria-label="Slide 3" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ PRADA/9BFh_a-HdAQ.jpg" data-bs-target="#carouselExampleIndicators_2" data-bs-slide-to="3" aria-label="Slide 4" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ PRADA/ycPVlsIWkSM.jpg" data-bs-target="#carouselExampleIndicators_2" data-bs-slide-to="4" aria-label="Slide 5" id="indicator_slide"></img>
            </div>
        </div>
    </div>
    <div class="shows_txt">
        <h2>PRADA</h2>
        <p>Над коллекциями Prada вместе с Миуччей Прадой продолжает работать Раф Симонс, и становится очевидно,
            что этот творческий союз только крепнет. Дизайнеры раскрывают свои лучшие умения: Прада отвечает за
            сдержанную, но очень актуальную посадку вещей, Симонс экспериментирует с силуэтом — поэтому в
            коллекции мы видим баланс из ультракоротких шорт-юбок и ладно скроенных жакетов, графичных принтов и
            насыщенного цвета, архитектурных панам и рубашек с кракенами на спине. А еще сильной стороной Prada
            было и остается внимание к деталям. Треугольные кармашки с логотипом прямо на удлиненной задней
            части панамы, в ней же — прорези для дужек очков (кто сказал, что носить очки поверх головного убора
            — дурной тон?) и сумки, напоминающие непромокаемые дайверские мешки, — все это создает цельную
            картину о столь долгожданном отдыхе на море.</p>
    </div>
</div>
<div class="news_txt">
</div>
<div class="shows">
    <div id="carouselExampleIndicators_3" class="carousel slide" data-bs-ride="true">
        <div class="carousels">
            <div class="carousel-inner">
                <div class="controls">
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators_3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <div class="carousel-item active carousel_main">
                        <img src="/assets/img/показ StreetStyle/AcielleStyleDuMonde_MILANFW22_SS_Day3_36.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ StreetStyle/AcielleStyleDuMonde_MILANFW22_SS_Day3_38.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ StreetStyle/IvEgPJC4gs0.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ StreetStyle/jZtz9s3HKkE.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/assets/img/показ StreetStyle/UkU9VhOy_pQ.jpg" class="d-block w-100" alt="...">
                    </div>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
                </div>
            </div>
            <div class="carousel-indicators">
                <img type="button" src="/assets/img/показ StreetStyle/AcielleStyleDuMonde_MILANFW22_SS_Day3_36.jpg" data-bs-target="#carouselExampleIndicators_3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ StreetStyle/AcielleStyleDuMonde_MILANFW22_SS_Day3_38.jpg" data-bs-target="#carouselExampleIndicators_3" data-bs-slide-to="1" aria-label="Slide 2" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ StreetStyle/IvEgPJC4gs0.jpg" data-bs-target="#carouselExampleIndicators_3" data-bs-slide-to="2" aria-label="Slide 3" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ StreetStyle/jZtz9s3HKkE.jpg" data-bs-target="#carouselExampleIndicators_3" data-bs-slide-to="3" aria-label="Slide 4" id="indicator_slide"></img>
                <img type="button" src="/assets/img/показ StreetStyle/UkU9VhOy_pQ.jpg" data-bs-target="#carouselExampleIndicators_3" data-bs-slide-to="4" aria-label="Slide 5" id="indicator_slide"></img>
            </div>
        </div>
    </div>
    <div class="shows_txt">
        <h2>STREET STYLE</h2>
        <p>Стритстайл на Неделе мужской моды осень-зима 2022 в МиланеУлицы итальянской столицы моды вновь
            пестрят всеми цветами радуги. На показы Zegna, Alyx, Dolce & Gabbana, Prada, Fendi и других модных
            Домов съехались редакторы, модели, блогеры и даже футболисты национальных сборных, а Асиель,
            фотограф Vogue и создательница Style Du Monde, ловит самых ярких из них в объектив своей камеры.</p>
    </div>
</div> -->
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>