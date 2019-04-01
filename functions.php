<?php

function render_page($tpl, $data)
{
    $tpl = 'templates/' . $tpl;
    $result = '';

    if (is_readable($tpl)) {
        ob_start();
        extract($data);
        require $tpl;
        $result = ob_get_clean();
        return $result;
     } else {
        return $result;
    };
};

function filter_text($text)
{
    $str = strip_tags($text);
    return $str;
};

function test(){
    print_r('LOL');
}

