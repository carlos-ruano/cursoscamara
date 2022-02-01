<?php
    require_once "./libs/Autoload.php";
    Autoload::init();
    require_once "./config/Config.php";
    session_start();
    require "./views/header.php";
    var_dump(substr($_SERVER["REQUEST_URI"],14));
    echo "<br>";
    var_dump($_GET["url"]);
    if(isset($_GET["url"])){
        $url = $_GET["url"];
        $router = new Router($url);
    } else {
        $ctrl = new HomeController();
        $ctrl->index();
    };
    
    require "./views/footer.php";
