<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/header.php";?>
<div class="block">
    <h3>Личный кабинет</h3>
    <form class="profile_form" action="#">
        <div class="form_inp">
            <label for="user_name">Имя пользователя:</label><input disabled type="text" name="name" id="user_name" placeholder="Анастасия" value="Анастасия" />
        </div>
        <div class="form_inp">
            <label for="user_email">E-mail:</label><input disabled type="email" name="email" id="user_email" placeholder="holzunovaa@yandex.ru" value="holzunovaa@yandex.ru" />
        </div>

    </form>
    <button id="change_profile">Редактировать</button>
    <button id="exit">Выйти</button>
</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/admin/templates/footer.php"; ?>