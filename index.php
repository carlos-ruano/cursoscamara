<?php
    require_once "./libs/Autoload.php";
    Autoload::init();
    require_once "./config/Config-dev.php";
    require_once "./config/ConfigDB.php";
    session_start();
    require "./views/header.php";

    
    //var_dump($_SERVER);
    $method = $_SERVER["REQUEST_METHOD"];
    $url = substr($_SERVER["REQUEST_URI"],14);
    if($url != ""){
        $router = new Router($method, $url);
        $router->run();
    } else {
        $ctrl = new HomeController();
        $ctrl->index();
    };
    