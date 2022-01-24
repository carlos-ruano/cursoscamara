<?php

class Autoload {

    public static function init() {
        spl_autoload_register(function ($nombre_clase) {
            $existe = false;
            $files = [
                "controller" => './controllers/' . $nombre_clase . '.php',
                "libs" => './libs/' . $nombre_clase . '.php',
                "models" => './models/' . $nombre_clase . '.php',
                "router" => './router/' . $nombre_clase . '.php',
                "entities" => './entities/' . $nombre_clase . '.php'
            ];
            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                    $existe = true;
                }
            }
            if (!$existe) {
                throw new Exception("Error 404. Página no encontrada.");
            }
        });
    }
}
