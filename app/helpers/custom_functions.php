<?php

function action($string){
    $string = ltrim($string, '/');
    unset($_GET['url']);
    return 'http://'.$_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR . $string;
}

function asset($string){

    $string=ltrim($string, '/');

    return 'http://'.$_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR . $string;
}

function sanitize($data){
    return htmlentities($data, ENT_QUOTES, "UTF-8");
}
function is_active(array $number) : string
{
    $array = [0 => 'Nieaktywny', 1 => 'Aktywny'];

    return $array[$number['number']];
}
