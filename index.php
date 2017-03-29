<?php
    require __DIR__ . '/vendor/autoload.php';

    use j4mie\idiorm\idiorm;

    require_once ("app/Resources/configuration/db_configuration.php");
    require_once ("app/Resources/configuration/admin_configuration.php");
    require_once ("app/Resources/configuration/routing_configuration.php");

    $route = $_GET['route'];

    if ($route == 'login') {
        require 'src/controller/PageController.php';
        $url[0] = 'PageController';
        $url[1] = 'loginAction';
    } else if ($route == 'main' || $route == '') {
        require 'src/controller/'.PAGE.'.php';
        $url[0] = PAGE;
    } else if($route == 'admin') {
        require 'src/controller/'.ADMIN.'.php';
        $url[0] = ADMIN;
        $url[1] = INDEX;
    } else if ($route == 'admin/check') {
        require 'src/controller/'.ADMIN.'.php';
        $url[0] = ADMIN;
        $url[1] = CHECK;
    } else if (isset($route)) {
        $url = $_GET['route'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        require 'src/controller/'.$url[0].'.php';
    }

    $controller = new $url[0];

    if(isset($url[2])) {
        $controller->$url[1]($url[2]);
    } else {
        if(isset($url[1])) {
            $controller->$url[1]();
        }
    }

