<?php

class Router {
    public $controlador;
    public $accion;
    public $params;

    function __construct(string $urlNoExplode) {
        if (isset($urlNoExplode)) {
            $url= explode("/", $urlNoExplode);
            $controlador = 'Home';
            $accion = 'index';
            $id = 0;

            if (count($url) == 1) {
                $controlador = $url[0];
            } else if (count($url) == 2) {
                $controlador = $url[0];
                $accion = $url[1];
            } else if (count($url) == 3) {
                $controlador = $url[0];
                $accion = $url[1];
                $id = $url[2];
            } else {
                echo "Error 404. Página no encontrada.";
            }

            $class_name = ucwords($controlador) . "Controller";
            $obj = new $class_name;
            try {
                $obj = new $class_name;
                
                if (method_exists($obj, $accion)) {
                    call_user_func([$obj, $accion], $id);
                } else {
                    var_dump($obj);
                    echo "Página no encontrada 404";
                }
            } catch (Exception $e) {
            }
        } else {
            $ctrl = new HomeController();
            $ctrl->index();
        };
    }
}
