<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";
?>
        <div class="block">
            <div class="header">
                <h3>Заказы</h3>
                <!-- <button type="button" class="btn btn-outline-danger">Отклонить</button> -->
            </div>
            <table class="table table-hover">
                <thead>
                    <tr class="table-title">
                       
                        <th scope="col">ID</th>
                        <th scope="col">Стоимость, р</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Пользователь</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Дата оформления</th>
                        <th scope="col">Товары</th>
                        <th scope="col">Кол-во товаров</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        
                        <th scope="row"><p id="id">1</p></th>
                        <td><p id="price">4800</p></td>
                        <td><select name="status" disabled required="required">
                                <option value="1">Оформлен</option>
                                <option value="2">Собирается</option>
                                <option value="3">Отправлен</option>
                                <option value="4">Доставлен</option>
                                <option value="5">Отклонен</option>
                            </select></td>
                        <td>
                            <p id="user_email">ivanzolo@gmail.com </p>
                        </td>
                        <td><p id="address">Челябинск, ул. Горького, 5</p></td>
                        <td><p id="date">12.12.2023</p></td>
                        <td>
                            <div class="product">
                                <div class="info">ID:<p id="info_id">1</p></div>
                                <div class="info">Имя:<p id="info_name">LOEWE</p></div>
                                <div class="info">Размер:<p id="info_size">M</p></div>
                            </div>
                        </div>
                        </td>
                        <td><p id="count">1</p></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-success "><img class="icon"
                                        src="/assets/img/3643749-edit-pen-pencil-write-writing_113397.svg"
                                        alt="Редактировать"></button>
                                <button type="button" class="btn btn-danger"><img class="icon"
                                        src="/assets/img/crossoutline_102628.svg" alt="Отклонить"></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
            <!-- Модальное окно отклонение заказа -->
        <div class="modal-wrapper_del_orders">
            <div class="modal_main_del_orders">
                <div class="modal__close">&times;</div>
                <h3 class="modal__title">Отклонить заказ?</h3>
                <div class="del_orders">
                    <div class="del_order mb-3">
                        <div class="info">ID:<p id="info_id">1</p>
                        </div>
                        <div class="info">Цена:<p id="info_price">4800</p>
                        </div>
                        <div class="info">Статус:<p id="info_status">Оформлен</p>
                        </div>
                        <div class="info">Пользователь:<p id="info_user">ivanzolo@gmail.com</p>
                        </div>
                        <div class="info">Адрес:<p id="info_address">Челябинск, ул. Горького, 5</p>
                        </div>
                        <div class="info">Дата оформления:<p id="info_date">12.12.2022</p>
                        </div>
                        <div class="info">Товары: <div class="order_products">
                                <div class="order_product">
                                    <div class="info">ID:<p id="info_id">1</p>
                                    </div>
                                    <div class="info">Имя:<p id="info_name">LOEWE</p>
                                    </div>
                                    <div class="info">Размер:<p id="info_size">M</p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="info">Кол-во товаров:<p id="info_count_prod">1</p>
                        </div>
                        
                    </div>
                </div>
                <div class="input-group mb-3 item3">
                    <span class="input-group-text" id="prod_desc">Укажите причину*</span>
                    <textarea class="form-control" placeholder="Описание" aria-describedby="prod_desc"
                        aria-label="Описание"></textarea>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-outline-danger">Отклонить</button>
                    <button type="submit" class="btn btn-light">Отмена</button>
                </div>
            </div>
        </div>
        </div>
        <?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php";
?>