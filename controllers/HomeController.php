<?php

class HomeController {

    function index() {
        $vista = new View();
        $vista->urlCourses= Config::URL_BASE."courses";
        $vista->render("home");
    }
}
