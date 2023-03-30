<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php"; ?>
<div class="block">
    <h3>Личный кабинет</h3>
    <form class="profile_form" action="/app/admin/tables/users/logout.php">
        <div class="form_inp">
            <label for="user_name">Логин:</label><input disabled type="text" name="name" id="user_name" value="<?= $user->login ?>" />
        </div>
        <div class="form_inp">
            <label for="user_email">E-mail:</label><input disabled type="email" name="email" id="user_email" value="<?= $user->email ?>" />
        </div>
        <button id="exit">Выйти</button>
    </form>

    <button class="btn btn-outline-success add_admin">Добавить администратора</button>
    <div class="modal-wrapper">
        <div class="modal_main ">
            <div class="modal__close">&times;</div>
            <h3 class="modal__title">Добавление администратора</h3>
            <form class="add_product" action="/app/admin/tables/users/add.admin.php" method="POST">
                <label for="user">Введите имя<span>*</span>: </label><input value="" type="text" name="user" id="user">

                <label for="surname">Введите фамилию<span>*</span>: </label><input value="" type="text" name="surname" id="surname">
               

                <label for="patronymic">Введите отчество:</label><input value="" type="text" name="patronymic" id="patronymic">
               

                <label for="login">Введите логин<span>*</span>: </label><input value="" type="text" name="login" id="login">
                

                <label for="mail">Введите почту<span>*</span>: </label><input value="" type="text" name="mail" id="mail">
               

                <div class="inpits_pas">
                    <label for="password1">Введите пароль<span>*</span>:</label>
                    <input type="password" name="password" id="password1">

                    <label for="password_confirmation">Подтвердите пароль<span>*</span>:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                </div>

                <button name="btn_reg" class="btn_reg">Зарегистрировать</button>
            </form>
        </div>
    </div>

</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>