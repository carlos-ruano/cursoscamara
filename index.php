<?php
    require_once "./libs/Autoload.php";
    Autoload::init();
    require_once "./config/Config.php";
    session_start();
    require "./views/header.php";
    if(isset($_GET["url"])){
        $url = $_GET["url"];
        $router = new Router($url);
    } else {
        $ctrl = new HomeController();
        $ctrl->index();
    };
    
    require "./views/footer.php";
