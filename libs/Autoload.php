<?php

class Autoload {

    public static function init() {
        spl_autoload_register(function ($name_space) {

            $array = explode("\\", $name_space);
            $len = count($array);
            $class_name = $array[$len - 1];

            $existe = false;
            $files = [
                "controller" => './controllers/' . $class_name . '.php',
                "libs" => './libs/' . $class_name . '.php',
                "models" => './models/' . $class_name . '.php',
                "router" => './router/' . $class_name . '.php',
                "entities" => './entities/' . $class_name . '.php',
                "jwt" => './jwt/' . $class_name . '.php'
            ];

            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                    $existe = true;
                }
            }
            if ($len == 3) {
                if ($array[0] == "Firebase" && $array[1] == "JWT") {
                    require_once $files["jwt"];
                    $existe = true;
                } else {
                    $existe = false;
                }
            }
            if (!$existe) {
                throw new Exception("Error 404. Página no encontrada.");
            }
        });
    }
}
