<?php
    require_once "./libs/Autoload.php";
    Autoload::init();
    require_once "./config/Config.php";
    session_start();
    require_once "./content/styles/style.css";
    require "./views/header.php";
    if(isset($_GET["url"])){
        $url = $_GET["url"];
        $router = new Router($url);
        $router->run();
    } else {
        $ctrl = new HomeController();
        $ctrl->index();
    };
    
    require "./views/footer.php";
