<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<div class="registration">
  <form class="reg aut" method="POST" action="/app/tables/users/auth.check.php">
    <h3 class="head">ВХОД</h3>
    <label for="email">Логин</label><input type="text" name="login" id="email" placeholder="Введите логин">
    <label for="password">Пароль</label><input type="password" name="password" id="password" placeholder="Введите пароль">
    <?php if (!empty($_SESSION["error"])) : ?>
      <p class="error"><?= $_SESSION["error"] ?></p>
    <?php endif; ?>
    <button class="login_btn" name="btn_auth">ВОЙТИ</button>
  </form>

</div>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>