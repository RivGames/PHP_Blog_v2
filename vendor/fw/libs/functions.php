<?php
/**
 * debug()
 * Функция для удобного дебага объектов
 * @param $var
 * @return void
 */
function debug($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
/**
 * redirect()
 * Удобная функция для редиректа в указаное место
 * или в противном случае редирект на текущую страницу
 * @param boolean $http
 * @return void
 */
function redirect($http=false)
{
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/public/';
    }
    header("Location: $redirect");
    exit();
}