
<nav class="nav">
    <ul class="nav__list container">
        <li class="nav__item">
            <a href="all-lots.html">Доски и лыжи</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Крепления</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Ботинки</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Одежда</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Инструменты</a>
        </li>
        <li class="nav__item">
            <a href="all-lots.html">Разное</a>
        </li>
    </ul>
</nav>
<?php if (isset($_SESSION['user'])) : ?>
<form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data">
    <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php
        $error_class = in_array('lot-name', $errors) ? 'form__item--invalid' : '';
        $value = isset($lot['lot-name']) ? $lot['lot-name'] : '';
        ?>
        <div class="form__item <?= $error_class ?>">
            <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $value ?>">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <?php
        $error_class = ($_POST['category'] == 'Выберите категорию') ? 'form__item--invalid' : '';
        ?>
        <div class="form__item <?= $error_class ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option>Выберите категорию</option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <?php
    $error_class = in_array('message', $errors) ? 'form__item--invalid' : '';
    $value = isset($lot['message']) ? $lot['message'] : '';
    ?>
    <div class="form__item form__item--wide <?= $error_class ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message" placeholder="Напишите описание лота"><?= $value ?></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <?php
    if ($_POST) {
        $error_class = ($_FILES['lot-photo']['type'] !== 'image/jpeg') ? 'form__item--invalid' : '';
    };
    ?>
    <div class="form__item form__item--file <?= $error_class ?>">
        <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" name="lot-photo" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
        <span class="form__error">Выберите изображение с расширением jpeg/jpg</span>
    </div>
    <div class="form__container-three">
        <?php
        $error_class = in_array('lot-rate', $errors) ? 'form__item--invalid' : '';
        $value = isset($lot['lot-rate']) ? $lot['lot-rate'] : '';
        ?>
        <div class="form__item form__item--small <?= $error_class ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $value ?>">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <?php
        $error_class = in_array('lot-step', $errors) ? 'form__item--invalid' : '';
        $value = isset($lot['lot-step']) ? $lot['lot-step'] : '';
        ?>
        <div class="form__item form__item--small <?= $error_class ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $value ?>">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <?php
        $error_class = in_array('lot-date', $errors) ? 'form__item--invalid' : '';
        $value = isset($lot['lot-date']) ? $lot['lot-date'] : '';
        ?>
        <div class="form__item <?= $error_class ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $value ?>">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <?php if ($errors) : ?>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
</form>
<?php else : ?>
<h1>403 Доступ запрещен</h1>
<?php endif; ?>
