<?php
    require_once "./libs/Autoload.php";
    Autoload::init();
    require_once "./config/Config-dev.php";
    require_once "./config/ConfigDB.php";
    session_start();
    require "./views/header.php";
    $url = substr($_SERVER["REQUEST_URI"],14);
    if($url != ""){
        $router = new Router($url);
    } else {
        $ctrl = new HomeController();
        $ctrl->index();
    };
    
    require "./views/footer.php";
