<?php

require_once 'functions.php';
require 'lots_time.php';
require 'templates/data.php';

session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = ['lot-name', 'message', 'lot-rate', 'lot-step', 'lot-date'];

    foreach ($lot as $key => $val) {
        if (in_array($key, $required)) {
            if (empty($val)) {
                array_push($errors, $key);
            };
        };
    };

    if (isset($_FILES['lot-photo']['name'])) {
        $fname = $_FILES['lot-photo']['name'];
        $ftmp = $_FILES['lot-photo']['tmp_name'];

        if ($_FILES['lot-photo']['type'] == 'image/jpeg') {
            move_uploaded_file($ftmp, 'img/' . $fname);
            $lot['url'] = 'img/' . $fname;
        };
    };

    if(count($errors)){
        $add_content = render_page('add-lot.php', [
            'errors' => $errors,
            'lot' => $lot
        ]);
    }else{
        $lot['name'] = $lot['lot-name'];
        $lot['price'] = $lot['lot-rate'];
        $add_content = render_page('lot.php', ['lot' => $lot]);
    }

}else{
    $add_content = render_page('add-lot.php', [
        'errors' => $errors,
        'lot' => $lot
    ]);
};

if (!$_SESSION['user']) {
    http_response_code(403);
};


$layout_content = render_page('layout.php', [
    'user_name' => $_SESSION['user']['name'],
    'user_avatar' => $_SESSION['user']['avatar'],
    'content' => $add_content,
    'categories' => $categories,
    'title' => 'Добавить лот',
]);
print($layout_content);
