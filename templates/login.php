  <form class="form container" action="login.php" method="post">
      <!-- form--invalid -->
      <h2>Вход</h2>
      <?php if ($_POST) {
            if (isset($errors['email'])) {
                $error_class = 'form__item--invalid';
                $error_mess = $errors['email'];
            } elseif (isset($errors['invalid-email'])) {
                $error_class = 'form__item--invalid';
                $error_mess = $errors['invalid-email'];
            } elseif (isset($errors['invalid-user'])) {
                $error_class = 'form__item--invalid';
                $error_mess = $errors['invalid-user'];
            } else {
                $error_class = '';
                $error_mess = '';
            };
        };
        ?>
      <div class="form__item <?= $error_class ?>">
          <!-- form__item--invalid -->
          <label for="email">E-mail*</label>
          <input id="email" type="text" name="email" placeholder="Введите e-mail">
          <span class="form__error"><?= $error_mess ?></span>
      </div>
      <?php if ($_POST) {
            if (isset($errors['password'])) {
                $error_class = 'form__item--invalid';
                $error_mess = $errors['password'];
            } elseif (isset($errors['invalid-password'])) {
                $error_class = 'form__item--invalid';
                $error_mess = $errors['invalid-password'];
            } else {
                $error_class = '';
                $error_mess = '';
            };
        };
        ?>
      <div class="form__item form__item--last <?= $error_class ?>">
          <label for="password">Пароль*</label>
          <input id="password" type="text" name="password" placeholder="Введите пароль">
          <span class="form__error"><?= $error_mess ?></span>
      </div>
      <button type="submit" class="button">Войти</button>

  </form>
