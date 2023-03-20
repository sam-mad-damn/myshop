<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";?>
<div class="help">
  <?php foreach ($articles as $item) : ?>
    <div>
    <h3 class="head"><?= $item->head ?></h3>
    <div class="body">
      <h4 class="title"><?= $item->title ?></h4>
      <p class="main-text">
        <?= $item->main_text ?>
      </p>
      <?php if ($item->photo) : ?>
        <div class="sizes">
          <img id="<?= $item->id ?>" src="<?= $item->photo ?>" alt="<?= $item->title ?>" />
        </div>
      <?php endif ?>
      </div>
      </div >
    <?php endforeach ?>
      </div>
    <!-- <div class="accordion accordion-flush" id="accordionFlushExample">
   
      <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
            
          </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <h3><?= $item->title ?></h3>
            <p>
            <?= $item->main_text ?>
            </p>
            
            <?php if ($item->photo) : ?>
              <div class="sizes">
              <img id="size_table" src="<?= $item->photo ?>" alt="<?= $item->title ?>" />
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    <?php //endforeach 
    ?> -->

    <!-- <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <a name="ask"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
            ВОПРОСЫ И ОТВЕТЫ
          </button></a>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <h3>Сколько времени занимает доставка?</h3>
          <p>
            Среднее время доставки занимает 7-14 дней. В зависимости от
            удалённости города от склада время доставки может увеличиться
            до 25 дней.
          </p>
          <h3>Можно ли оформить заказ, а оплатить его при получении?</h3>
          <p>
            К сожалению в данный момент у наших клиентов нет возможности
            оплачивать заказы при оформлении. Оплата происходит
            непосредственно в момент получения заказа. В скором времени мы добавим
            дополнительный способ оплаты.
          </p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
          ГИД ПО РАЗМЕРАМ
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample"><a name="gid"></a>
        <div class="accordion-body sizes">

          <h3>Таблица размеров</h3>
          <h3>Как правильно снять мерки?</h3>
          <img id="size_table" src="/assets/img/Таблица размеров.jpg" alt="Таблица размеров" />
          <img id="measure" src="/assets/img/Снять мерки.jpg" alt="Как правильно снять мерки" />
          <h3>
            Посадка изделия зависит от её кроя и фасона. Будьте
            внимательны!
          </h3>
        </div>
      </div>
    </div> -->
    <!-- </div>
  </div> -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>