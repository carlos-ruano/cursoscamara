<?php
class StudentsController {

    function __construct() {
        $this->model = new StudentsModel();
    }

    function index() {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }
        $view = new View();
        $students = $this->model->getStudents();
        $view->students = $students;
        $view->urlReturn = Config::URL_BASE;
        $view->url_new_student = Config::URL_BASE . "students/new";
        $view->render('students');
    }

    function new() {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }
        $view = new View();
        try {
            if (isset($_POST["enviar"])) {
                $validate = new StudentValidator($_POST);

                if ($validate->isOk()) {
                    $student = new Student($_POST);
                    $id = $this->model->createStudent($student);
                    if ($id !== false) {
                        header("location:" . Config::URL_BASE . "courses/editCourses");
                    }
                    $_POST = [];
                }
            }
        } catch (StudentValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "students";
            $view->render('newstudent');
        }
    }

    // function editStudents() {
    //     if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
    //         header("location:" . Config::URL_BASE);
    //     }
    //     $view = new View();
    //     $students = $this->model->getStudents();
    //     $view->students = $students;
    //     $view->urlReturn = Config::URL_BASE;
    //     $view->url_newCourse = Config::URL_BASE . "students/new";
    //     $view->render('editStudents');
    // }


    function edit(int $id) {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }

        $view = new View();
        try {
            $studentOld = $this->model->getStudent($id);
            if (is_null($studentOld)) {
                header("location:" . Config::URL_BASE . "courses/editCourses");
            }
            if (isset($_POST["enviar"])) {
                $validate = new StudentValidator($_POST);
                if ($validate->isOk()) {
                    $student = new Student($_POST);
                    $student->setId($id);
                    $id = $this->model->updateStudent($student);
                    if ($id !== false) {
                        echo "Se ha actualizado el estudiante";
                        //header("location:" . Config::URL_BASE . "courses/editCourses");                 
                    }
                }
            } else {
                $_POST = [
                    "id" => $studentOld->getId(),
                    "name" => $studentOld->getName(),
                    "surname" => $studentOld->getSurname(),
                    "dni" => $studentOld->getDni(),
                    "telephone" => $studentOld->getTelephone(),
                    "garantia" => $studentOld->getGarantia(),
                    "pice" => $studentOld->getPice(),
                    "orientation" => $studentOld->getOrientation(),
                    "observations" => $studentOld->getObservations()
                ];
            }
        } catch (StudentValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "students";
            $view->render('edit_student');
        }
    }

    function info(int $id) {
        $view = new View();
        $student = $this->model->getStudent($id);
        $view->student = $student;
        $view->urlReturn = Config::URL_BASE;
        $view->urlCourseInfo = Config::URL_BASE . "courses/info/" . $id;
        $view->render('info_student');
    }

    function delete(int $id) {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        $student = $this->model->getStudent($id);
        if (is_null($student)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        } else {
            $view = new View();
            $view->student = $student;
            $view->urlReturn = Config::URL_BASE . "students";
            $view->url_delete = Config::URL_BASE . "students/deletetotal/$id";
            $view->render('delete_student');
        }
    }
    function deletetotal(int $id) {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }
        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        try {
            
            $ok = $this->model->deleteStudent($id);
            if ($ok) {
                header("location: " . Config::URL_BASE . "students");
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "students'>Volver</a>";
        }
    }
}
