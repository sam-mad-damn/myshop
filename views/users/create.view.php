<?php
var_dump($_SESSION);
//поля при ошибках не сбрасываются, только пароли. проверка на заполнение всех полей, валидация
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php";
?>

<h2>Регистрация</h2>
<form class="reg_form" method="POST" action="/app/tables/users/insert.php">

    <label for="user">Введите имя<span>*</span>: </label><input value="<?= $_SESSION["name"] ?? "" ?>" type="text" name="user" id="user">
    <?php if (empty($_SESSION["name"])) : ?>
        <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
    <?php else : ?>
        <p class="error"><?= $_SESSION["error"]["name"] ?? "" ?></p>
    <?php endif; ?>

    <label for="surname">Введите фамилию<span>*</span>: </label><input value="<?= $_SESSION["surname"] ?? "" ?>" type="text" name="surname" id="surname">
    <?php if (empty($_SESSION["surname"])) : ?>
        <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
    <?php else : ?>
        <p class="error"><?= $_SESSION["error"]["surname"] ?? "" ?></p>
    <?php endif; ?>

    <label for="patronymic">Введите отчество:</label><input value="<?= $_SESSION["patronymic"] ?? "" ?>" type="text" name="patronymic" id="patronymic">
    <?php if (!empty($_SESSION["patronymic"])) : ?>
        <p class="error"><?= $_SESSION["error"]["patronymic"] ?? "" ?></p>
    <?php endif; ?>

    <label for="login">Введите логин<span>*</span>: </label><input value="<?= $_SESSION["login"] ?? "" ?>" type="text" name="login" id="login">
    <?php if (empty($_SESSION["login"])) : ?>
        <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
    <?php else : ?>
        <p class="error"><?= $_SESSION["error"]["login"] ?? "" ?></p>
    <?php endif; ?>

    <label for="mail">Введите почту<span>*</span>: </label><input value="<?= $_SESSION["mail"] ?? "" ?>" type="text" name="mail" id="mail">
    <?php if (empty($_SESSION["mail"])) : ?>
        <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
    <?php else : ?>
        <p class="error"><?= $_SESSION["error"]["mail"] ?? "" ?></p>
    <?php endif; ?>

    <div class="inpits_pas">
        <label for="password1">Введите пароль<span>*</span>:</label>
        <input type="password" name="password" id="password1">

        <label for="password_confirmation">Подтвердите пароль<span>*</span>:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    <?php if (!empty($_SESSION["error"]["base"])) : ?>
        <p class="error"><?= $_SESSION["error"]["base"] ?></p>
    <?php else : ?>
        <p class="error"><?= $_SESSION["error"]["emptyPas"] ?? "" ?></p>
    <?php endif; ?>

    <div>
        <input type="checkBox" checked name="agreement" id="agreement">
        <label for="agreement">Согласен на обработку персональных данных</label>
    </div>

    <button name="btn_reg" class="btn_reg">Зарегистрироваться</button>
</form>

<script>
    //при включенном флажке кнопка становится активной
    document.querySelector("#agreement").addEventListener("change", (e) => {
        btn = document.querySelector(".btn_reg")
        btn.disabled = !e.target.checked
    })
</script>
<?php
unset($_SESSION["error"]);
//include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; 
?>