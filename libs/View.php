<?php

class View {

    function __construct() {
    }

    function render($page) {
        require Config::PATH_BASE . "/views/" . $page . "_view.php";
    }
}
