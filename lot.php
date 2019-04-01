<?php

require_once 'functions.php';
require 'lots_time.php';
require 'templates/data.php';

session_start();

$lot = null;

if (isset($_GET['id'])) {

    $lot_id = $_GET['id'];

    foreach ($lots as $key) {
        if ($key['id'] == $lot_id) {
            $lot = $key;
            break;
        };
    };
};
if (!$lot) {
    http_response_code(404);
};


$lot_content = render_page('lot.php', ['lot' => $lot]);
$layout_content = render_page('layout.php', [
    'user_name' => $_SESSION['user']['name'],
    'user_avatar' => $_SESSION['user']['avatar'],
    'content' => $lot_content,
    'categories' => $categories,
    'title' => $lot['name'],
]);
print($layout_content);
