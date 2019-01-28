<?php
namespace Classes;
use Core\Router as Router;
spl_autoload_register(function ($class){
    $class = str_replace("\\", "/", $class);
    $path1=pathinfo(__DIR__);
    $path = $path1['dirname'].'/'.$class.'.php';
    require $path;
});
Router::start();