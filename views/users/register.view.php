<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>
<form class="reg" method="POST" action="/app/tables/users/insert.php">
  <h3 class="head" id="one">РЕГИСТРАЦИЯ</h3>

  <label for="name">Введите имя<span>*</span></label><input type="text" name="name" id="name" placeholder="Иван" value="<?= $_SESSION["name"] ?? "" ?>">
  <?php if (empty($_SESSION["name"])) : ?>
    <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
  <?php else : ?>
    <p class="error"><?= $_SESSION["error"]["name"] ?? "" ?></p>
  <?php endif; ?>

  <label for="name">Введите фамилию<span>*</span></label><input type="text" name="surname" id="surname" placeholder="Иванов" value="<?= $_SESSION["surname"] ?? "" ?>">
  <?php if (empty($_SESSION["surname"])) : ?>
    <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
  <?php else : ?>
    <p class="error"><?= $_SESSION["error"]["surname"] ?? "" ?></p>
  <?php endif; ?>

  <label for="name">Введите логин<span>*</span></label><input type="text" name="login" id="login" placeholder="ivanko" value="<?= $_SESSION["login"] ?? "" ?>">
  <?php if (empty($_SESSION["login"])) : ?>
    <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
  <?php else : ?>
    <p class="error"><?= $_SESSION["error"]["login"] ?? "" ?></p>
  <?php endif; ?>

  <label for="email">Введите почту<span>*</span></label><input type="email" name="email" id="email" placeholder="name@gmail.com" value="<?= $_SESSION["email"] ?? "" ?>">
  <?php if (empty($_SESSION["email"])) : ?>
    <p class="error"><?= $_SESSION["error"]["empty"] ?? "" ?></p>
  <?php else : ?>
    <p class="error"><?= $_SESSION["error"]["email"] ?? "" ?></p>
  <?php endif; ?>

  <label for="password">Введите пароль<span>*</span></label><input type="password" name="password" id="password" placeholder="> 5 символов">

  <label for="confirm_password">Подтвердите пароль<span>*</span></label><input type="password" name="confirm_password" id="confirm_password" placeholder="> 5 символов">
  <?php if (!empty($_SESSION["error"]["base"])) : ?>
    <p class="error"><?= $_SESSION["error"]["base"] ?></p>
  <?php else : ?>
    <p class="error"><?= $_SESSION["error"]["emptyPas"] ?? "" ?></p>
  <?php endif; ?>
  <div class="agree">
    <input type="checkBox" checked name="agreement" id="agreement">
    <label for="agreement">Согласен на обработку персональных данных</label>
  </div>

  <button class="login_btn btn_reg" name="btn_reg">ЗАРЕГИСТРИРОВАТЬСЯ</button>
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
include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>