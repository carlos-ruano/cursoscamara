<?php

class Config {
    const URL_BASE = 'http://localhost/cursoscamara/';
    //const PATH_BASE = "C:/xampp/htdocs/cursoscamara/";
    const PATH_CSS = Config::URL_BASE . "content/styles/style.css";
    const PATH_IMG = Config::URL_BASE . "content/img/";
    const PATH_LOGIN = Config::URL_BASE . "login";
    const NAME_CHARACTER_MAX = 50;
    const EMAIL_CHARACTER_MAX = 100;
    const PASS_CHARACTER_MAX = 255;
    const PASS_CHARACTER_MIN = 4;
    const MAX_255 = 255;
    const DNI_CH_MAX = 10;
    const TEL_CH_MAX = 15;
    
    const AUTH_KEY = 'jkhkjh6tughkhkj';
    const AUTH_ENCRYPT = 'HS256';
    const AUTH_TIME = 60 * 60 * 24;
    function __construct()
    {
        $this->path_base = $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/";
        $this->path_imagenes = $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/content/img/";
    }
}
