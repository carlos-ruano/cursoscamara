<?php

use Firebase\JWT\JWT;

class VerificarToken{

    public static function comprobarAdmin(){
        if (!isset($_SESSION["token"])) {
            header("location:" . Config::URL_BASE);
        };
        $token = $_SESSION["token"];
        $ok = JWT::decode($token, Config::AUTH_KEY, [Config::AUTH_ENCRYPT]);
        if ($ok->data->role != "admin") {
            header("location:" . Config::URL_BASE);
            exit;
        }
    }
}