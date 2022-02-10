<?php

class View {

    function __construct() {
    }

    function render($page) {
        $path= new Config();
        require $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/views/" . $page . "_view.php";
    }
}
