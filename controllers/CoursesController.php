<?php
class CoursesController {

    function __construct() {
        $this->model = new CoursesModel();
    }

    function index() {
        $view = new View();
        //$autenticado = isset($_SESSION["autenticado"]);
        // if ($autenticado) {
        //     $rol = $_SESSION["rol"];
        //     $view->classEnlaces = $autenticado && $rol !== 'admin' ? 'ocultar' : '';
        // } else {
        //     $view->classEnlaces = 'ocultar';
        // }
        $courses=$this->model->getCourses();
        $view->courses = $courses;
        $view->urlReturn = Config::URL_BASE;
        $view->render('courses');
    }
}