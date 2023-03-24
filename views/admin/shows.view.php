<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
?>
<div class="block">
    <div class="header">
        <h3>Показы мод</h3>
        <div class="btns"><button type="button" class="btn btn-outline-success">Добавить</button>
            <button type="button" class="btn btn-outline-danger">Удалить</button>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="table-title">
                <th scope="col"><input type="checkBox" checked name="" id="all" value="all"></th>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Фото</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><input type="checkBox" checked name="" id="" value=""></th>
                <th scope="row">1</th>
                <td>PRADA</td>
                <td>
                    <p> Над коллекциями Prada вместе с Миуччей Прадой продолжает работать Раф Симонс, и
                        становится очевидно, что этот творческий союз только крепнет. Дизайнеры раскрывают свои
                        лучшие умения: Прада отвечает за сдержанную, но очень актуальную посадку вещей, Симонс
                        экспериментирует с силуэтом — поэтому в коллекции мы видим баланс из ультракоротких
                        шорт-юбок и ладно скроенных жакетов, графичных принтов и насыщенного цвета,
                        архитектурных панам и рубашек с кракенами на спине. А еще сильной стороной Prada было и
                        остается внимание к деталям. Треугольные кармашки с логотипом прямо на удлиненной задней
                        части панамы, в ней же — прорези для дужек очков (кто сказал, что носить очки поверх
                        головного убора — дурной тон?) и сумки, напоминающие непромокаемые дайверские мешки, —
                        все это создает цельную картину о столь долгожданном отдыхе на море.</p>
                </td>
                <td>
                    <div class="shows_pics"><img class="shows_pic" src="img/показ PRADA/2slobJmJAN4.jpg" alt="">
                        <img class="shows_pic" src="/assets/img/показ PRADA/3GAJW809Mso.jpg" alt="">
                        <img class="shows_pic" src="/assets/img/показ PRADA/7C6da-ybR7o.jpg" alt="">
                        <img class="shows_pic" src="/assets/img/показ PRADA/9BFh_a-HdAQ.jpg" alt="">
                        <img class="shows_pic" src="/assets/img/показ PRADA/ycPVlsIWkSM.jpg" alt="">
                    </div>
                </td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-success "><img class="icon" src="/assets/img/3643749-edit-pen-pencil-write-writing_113397.svg" alt="Редактировать"></button>

                        <button type="button" class="btn btn-danger"><img class="icon" src="/assets/img/crossoutline_102628.svg" alt="Удалить"></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Модальное окно добавления показов -->
<div class="modal-wrapper">
    <div class="modal_main">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Добавление показа</h3>
        <form class="add_product" action="">
            <div class="input-group mb-3 item1">
                <span class="input-group-text " id="basic-addon1">Название</span>
                <input type="text" class="form-control" placeholder="Название" aria-label="Название" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 item2">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" placeholder="Описание" aria-describedby="basic-addon3" aria-label="Описание"></textarea>
            </div>

            <div class="input-group mb-3 item3">
                <span class="input-group-text" for="inputGroupFile01">Фото(минимум 3)</span>
                <input type="file" multiple accept=".jpg, .jpeg, .png" class="form-control" id="inputGroupFile01">
            </div>

            <div class="col-12 item4">
                <button type="submit" class="btn btn-success">Добавить показ</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно изменения показов -->
<div class="modal-wrapper_show_change">
    <div class="modal_main_show_change">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Изменение показа</h3>
        <form class="show_change" action="">
            <div class="input-group mb-3 item_1">
                <span class="input-group-text " id="basic-addon1">Название</span>
                <input type="text" class="form-control" value="PRADA" aria-label="Название" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3 item_2">
                <span class="input-group-text" id="basic_addon3">Описание</span>
                <textarea class="form-control" placeholder="Описание" aria-describedby="basic-addon3" aria-label="Описание">Над коллекциями Prada вместе с Миуччей Прадой продолжает работать Раф Симонс, и становится очевидно, что этот творческий союз только крепнет. Дизайнеры раскрывают свои лучшие умения: Прада отвечает за сдержанную, но очень актуальную посадку вещей, Симонс экспериментирует с силуэтом — поэтому в коллекции мы видим баланс из ультракоротких шорт-юбок и ладно скроенных жакетов, графичных принтов и насыщенного цвета, архитектурных панам и рубашек с кракенами на спине. А еще сильной стороной Prada было и остается внимание к деталям. Треугольные кармашки с логотипом прямо на удлиненной задней части панамы, в ней же — прорези для дужек очков (кто сказал, что носить очки поверх головного убора — дурной тон?) и сумки, напоминающие непромокаемые дайверские мешки, — все это создает цельную картину о столь долгожданном отдыхе на море.</textarea>
            </div>

            <div class="input-group mb-3 item_3">
                <span class="input-group-text" for="inputGroupFile01">Фото(минимум 3)</span>

                <input type="file" multiple accept=".jpg, .jpeg, .png" class="form-control" id="inputGroupFile01">
            </div>
            <div class="show_pics item_4">
                <img class="shows_pic" src="img/показ PRADA/3GAJW809Mso.jpg" alt="">
                <img class="shows_pic" src="img/показ PRADA/7C6da-ybR7o.jpg" alt="">
                <img class="shows_pic" src="img/показ PRADA/9BFh_a-HdAQ.jpg" alt="">
                <img class="shows_pic" src="img/показ PRADA/ycPVlsIWkSM.jpg" alt="">
            </div>
            <div class="col-12 item_5">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<!-- Модальное окно удаления показов -->
<div class="modal-wrapper_del_show">
    <div class="modal_main_del_show">
        <div class="modal__close">&times;</div>
        <h3 class="modal__title">Удалить выбранные показы?(<p id="shows_count">1</p>)</h3>
        <div class="del_show">
            <div class="shows mb-3">
                <div class="btn-group">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRADA
                    </button>
                    <div class="dropdown-menu">
                        <div class="info">ID:<p id="info_id">1</p>
                        </div>
                        <div class="shows_pics"><img class="shows_pic" src="img/показ PRADA/2slobJmJAN4.jpg" alt="">
                            <img class="shows_pic" src="img/показ PRADA/3GAJW809Mso.jpg" alt="">
                            <img class="shows_pic" src="img/показ PRADA/7C6da-ybR7o.jpg" alt="">
                            <img class="shows_pic" src="img/показ PRADA/9BFh_a-HdAQ.jpg" alt="">
                            <img class="shows_pic" src="img/показ PRADA/ycPVlsIWkSM.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <button type="submit" class="btn btn-outline-danger">Удалить</button>
            <button type="submit" class="btn btn-light">Отмена</button>
        </div>
    </div>
</div>
<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
?>