<?php

require_once 'functions.php';
require 'lots_time.php';
require 'templates/data.php';
require 'userdata.php';

session_start();

$user = [];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect('localhost', 'root', '', 'yeticave');

    $email = $_POST['email'];
    $user_sql = "SELECT * FROM users WHERE `email` = ?";

    $stmt = mysqli_prepare($con, $user_sql);
    mysqli_stmt_bind_param($stmt, 's' , $email);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    if($res){
    $user = mysqli_fetch_array($res, MYSQLI_ASSOC);
    };

    foreach ($_POST as $key => $val) {
        if (empty($val)) {
            $errors[$key] = 'Это поле необходимо заполнить';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['invalid-email'] = 'Введен некорректный e-mail';
        } elseif (!isset($user['email'])) {
            $errors['invalid-user'] = 'Такой пользователь не существует';
        } elseif ($_POST['password'] != $user['password']) {
            $errors['invalid-password'] = 'Неправильный пароль';
        };
    };

    if (count($errors)) {
        $login_content = render_page('login.php', ['errors' => $errors]);
    } else {
        $_SESSION['user'] = $user;
        $login_content = render_page('index.php', [
            'lots' => $lots,
            'ttl' => $ttl
        ]);
    }
} else {
    $login_content = render_page('login.php', ['errors' => $errors]);
}

$layout_content = render_page('layout.php', [
    'user_name' => $_SESSION['user']['name'],
    'user_avatar' => $_SESSION['user']['avatar'],
    'content' => $login_content,
    'categories' => $categories,
    'title' => 'Вход',
]);
print($layout_content);
