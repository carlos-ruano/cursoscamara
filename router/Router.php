<?php

use \FireBase\JWT\ExpiredException;
use \FireBase\JWT\SignatureInvalidException;

class Router {
    public $controlador;
    public $accion;
    public $params;

    function __construct(string $method, string $url) {
        $this->crearRutas();
        $ruta = $this->find($method, $url);
        if ($ruta) {
            $this->controlador = $ruta["controller"];
            $this->accion = $ruta["accion"];
            $this->params = $this->getParams($ruta["pattern"], $url);
        } else {
            $res = [
                "status" => "404",
                "ok" => "false",
                "message" => "Recurso no encontrado."
            ];
            http_response_code($res["status"]);
            echo json_encode($res);
        }
    }

    private function crearRutas() {
        $this->rutas = [
            ["pattern" => "home", "metodo" => "GET", "controller" => "HomeController", "accion" => "index"],
            
            ["pattern" => "courses", "metodo" => "GET", "controller" => "CoursesController", "accion" => "index"],
            ["pattern" => "courses/new", "metodo" => "GET", "controller" => "CoursesController", "accion" => "new"],
            ["pattern" => "courses/new", "metodo" => "POST", "controller" => "CoursesController", "accion" => "new"],
            ["pattern" => "courses/editCourses", "metodo" => "GET", "controller" => "CoursesController", "accion" => "editCourses"],
            ["pattern" => "courses/editCourses", "metodo" => "POST", "controller" => "CoursesController", "accion" => "editCourses"],
            ["pattern" => "courses/edit/:id", "metodo" => "GET", "controller" => "CoursesController", "accion" => "edit"],
            ["pattern" => "courses/edit/:id", "metodo" => "POST", "controller" => "CoursesController", "accion" => "edit"],
            ["pattern" => "courses/info/:id", "metodo" => "GET", "controller" => "CoursesController", "accion" => "info"],
            ["pattern" => "courses/delete/:id", "metodo" => "GET", "controller" => "CoursesController", "accion" => "delete"],
            ["pattern" => "courses/deletetotal/:id", "metodo" => "GET", "controller" => "CoursesController", "accion" => "deletetotal"],
            
            ["pattern" => "students", "metodo" => "GET", "controller" => "StudentsController", "accion" => "index"],
            ["pattern" => "students/new", "metodo" => "GET", "controller" => "StudentsController", "accion" => "new"],
            ["pattern" => "students/new", "metodo" => "POST", "controller" => "StudentsController", "accion" => "new"],
            ["pattern" => "students/edit/:id", "metodo" => "GET", "controller" => "StudentsController", "accion" => "edit"],
            ["pattern" => "students/edit/:id", "metodo" => "POST", "controller" => "StudentsController", "accion" => "edit"],
            ["pattern" => "students/info/:id", "metodo" => "GET", "controller" => "StudentsController", "accion" => "info"],
            ["pattern" => "students/delete/:id", "metodo" => "GET", "controller" => "StudentsController", "accion" => "delete"],
            ["pattern" => "students/deletetotal/:id", "metodo" => "GET", "controller" => "StudentsController", "accion" => "deletetotal"],
            
            ["pattern" => "courses/listado/:id", "metodo" => "GET", "controller" => "StudentsCoursesController", "accion" => "listado"],
            ["pattern" => "courses/add_alumno/:id", "metodo" => "GET", "controller" => "StudentsCoursesController", "accion" => "add_alumno"],
            ["pattern" => "courses/add_alumno/:id", "metodo" => "POST", "controller" => "StudentsCoursesController", "accion" => "add_alumno"],
            ["pattern" => "students/deleteStudentFromCourse/:student_id/:course_id", "metodo" => "GET", "controller" => "StudentsCoursesController", "accion" => "deleteStudentFromCourse"],
            ["pattern" => "students/deleteStudentFromCourse/:student_id/:course_id", "metodo" => "POST", "controller" => "StudentsCoursesController", "accion" => "deleteStudentFromCourse"],
            ["pattern" => "students/deleteOnlyFromCourse/:student_id/:course_id", "metodo" => "GET", "controller" => "StudentsCoursesController", "accion" => "deleteOnlyFromCourse"],
            ["pattern" => "students/deleteOnlyFromCourse/:student_id/:course_id", "metodo" => "POST", "controller" => "StudentsCoursesController", "accion" => "deleteOnlyFromCourse"],
            ["pattern" => "students/deleteStudentComplete/:student_id/:course_id", "metodo" => "GET", "controller" => "StudentsCoursesController", "accion" => "deleteStudentComplete"],
            ["pattern" => "students/deleteStudentComplete/:student_id/:course_id", "metodo" => "POST", "controller" => "StudentsCoursesController", "accion" => "deleteStudentComplete"],
            
            ["pattern" => "login/cerrar", "metodo" => "GET", "controller" => "LoginController", "accion" => "cerrar"],
            ["pattern" => "login", "metodo" => "GET", "controller" => "LoginController", "accion" => "index"],
            ["pattern" => "login", "metodo" => "POST", "controller" => "LoginController", "accion" => "index"],

            ["pattern" => "signup", "metodo" => "GET", "controller" => "SignUpController", "accion" => "index"],
            ["pattern" => "signup", "metodo" => "POST", "controller" => "SignUpController", "accion" => "index"]

            
        ];
    }


    function run() {

        try {
            $obj = new $this->controlador;
            if (method_exists($obj, $this->accion)) {
                if (count($this->params) == 1)
                    $this->params = $this->params["id"];
                call_user_func([$obj, $this->accion], $this->params);
            } else {
                $res = [
                    "status" => "404",
                    "ok" => "false",
                    "message" => "Recurso no encontrado."
                ];
            }
        } catch (ExpiredException $e) {
            $res = [
                "status" => "400",
                "ok" => "false",
                "message" => "Sesión caducada. Identifícate de nuevo."
            ];
        } catch (SignatureInvalidException $e) {
            $res = [
                "status" => "400",
                "ok" => "false",
                "message" => "Sesión inválida. Identifícate de nuevo."
            ];
        } catch (Exception $e) {
            $res = [
                "data" => $e->getMessage(),
                "status" => "404",
                "ok" => "false",
                "message" => "Recurso no encontrado.",
                "err" => $e->getTrace()
            ];
        }
    }

    function find($method, $url) {
        foreach ($this->rutas as $value) {
            if ($value["metodo"] == $method) {
                $coincide = $this->matchPattern($url, $value["pattern"]);
                if ($coincide) {
                    return $value;
                }
            }
        }
        return null;
    }

    function matchPattern($url, $recurso) {
        $urlArray  = explode("/", $url);
        $recursoArray = explode("/", $recurso);
        if (count($urlArray) == count($recursoArray)) {
            for ($i = 0; $i < count($urlArray); $i++) {
                $firstLetter = substr($recursoArray[$i], 0, 1);
                if ($firstLetter != ":") {
                    if ($urlArray[$i] != $recursoArray[$i]) return false;
                }
            }
            return true;
        }
        return false;
    }

    function getParams($pattern, $url) {
        $params = [];
        $urlArray  = explode("/", $url);
        $patternArray = explode("/", $pattern);
        for ($i = 0; $i < count($patternArray); $i++) {
            if (substr($patternArray[$i], 0, 1) == ":") {
                $key = substr($patternArray[$i], 1);
                $param = array($key => $urlArray[$i]);
                $params = array_merge($params, $param);
            }
        }
        return $params;
    }
}
