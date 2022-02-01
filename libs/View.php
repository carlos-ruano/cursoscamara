<?php

class View {

    function __construct() {
    }

    function render($page) {
        $path= new Config();
        require $path->path_base . "views/" . $page . "_view.php";
    }
}
