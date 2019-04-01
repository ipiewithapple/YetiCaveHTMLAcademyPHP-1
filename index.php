<?php

require_once 'functions.php';
require 'lots_time.php';
require 'templates/data.php';

session_start();

$main_content = render_page('index.php', [
    'lots' => $lots,
    'ttl' => $ttl
]);
$layout_content = render_page('layout.php', [
    'user_name' => $_SESSION['user']['name'],
    'user_avatar' => $_SESSION['user']['avatar'],
    'content' => $main_content,
    'categories' => $categories,
    'title' => 'Главная'
]);
print($layout_content);

