<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
?>
        <div class="block">
            <div class="header">
                <h3>Коллекции</h3>
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
                        <th scope="row"><input type="checkBox" checked name="" id="collection_inp" value=""></th>
                        <th scope="row"><p id="collection_id">1</p></th>
                        <td> <p id="collection_name">GOTHIC VIBES</p> </td>
                        <td><p id="collection_description">Мрачные цвета, траурный стиль - вот, что представляет из себя коллекция "Готические вайбы"</p>
                        </td>
                        <td><img class="collection_pic" src="/assets/img/готическая.jpg" alt=""></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-success "><img class="icon"
                                        src="/assets/img/3643749-edit-pen-pencil-write-writing_113397.svg"
                                        alt="Редактировать"></button>

                                <button type="button" class="btn btn-danger"><img class="icon"
                                        src="/assets/img/crossoutline_102628.svg" alt="Удалить"></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!-- Модальное окно добавление коллекции -->
        <div class="modal-wrapper collection_add">
            <div class="modal_main">
                <div class="modal__close">&times;</div>
                <h3 class="modal__title">Добавление коллекции</h3>
                <form class="add_collection" action="">
                    <div class="input-group mb-3 item1">
                        <span class="input-group-text " id="basic-addon1">Название</span>
                        <input type="text" class="form-control" placeholder="Название" aria-label="Название"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 item2">
                        <span class="input-group-text" id="basic_addon3">Описание</span>
                        <textarea class="form-control" placeholder="Описание" aria-describedby="basic-addon3"
                            aria-label="Описание"></textarea>
                    </div>
                    <div class="input-group mb-3 item3">
                        <span class="input-group-text" for="inputGroupFile01">Фото</span>
                        <input type="file" class="form-control" id="inputGroupFile01">
                    </div>
                    <div class="col-6 item4">
                        <button type="submit" class="btn btn-success">Добавить коллекцию</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Модальное окно изменение коллекции -->
        <div class="modal-wrapper_collection_change">
            <div class="modal_main_collection_change">
                <div class="modal__close">&times;</div>
                <h3 class="modal__title">Изменение коллекции</h3>
                <form class="collection_change" action="">
                    <div class="input-group mb-3 item1">
                        <span class="input-group-text " id="basic-addon1">Название</span>
                        <input type="text" class="form-control" value="Gothic vibes" aria-label="Название"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3 item2">
                        <span class="input-group-text" id="basic_addon3">Описание</span>
                        <textarea class="form-control" aria-describedby="basic-addon3"
                            aria-label="Описание">Мрачные цвета, траурный стиль - вот, что представляет из себя коллекция 'Готические вайбы'</textarea>
                    </div>

                    <div class="input-group mb-3 item3">
                        <span class="input-group-text" for="inputGroupFile02">Фото</span>
                        <div class="form-control" class="change_product_photo">
                            <img class="change_collection_pic" src="img/готическая.jpg" alt="">
                            <input type="file" class="form-control" id="inputGroupFile02" accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                    <div class="col-6 item4">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Модальное окно удаления коллекции -->
        <div class="modal-wrapper_del_collection">
            <div class="modal_main_del_collection">
                <div class="modal__close">&times;</div>
                <h3 class="modal__title">Удалить выбранные коллекции?(<p id="collection_count">1</p>)</h3>
                <div class="del_collections">
                    <div class="collections mb-3">
                        <div class="btn-group">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Gothic Vibes
                            </button>
                            <div class="dropdown-menu">
                                <div class="info">ID:<p id="info_id">1</p>
                                </div>
                                <img class="shows_pic" src="img/готическая.jpg" alt="">
                               
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