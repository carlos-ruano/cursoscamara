<?php
class StudentsController {

    function __construct() {
        $this->model = new StudentsModel();
        $this->courses_model = new CoursesModel();

    }

    function index() {
        VerificarToken::comprobarAdmin();

        $view = new View();
        $students = $this->model->getStudents();
        $view->students = $students;
        $view->urlReturn = Config::URL_BASE."courses/editCourses";
        $view->url_new_student = Config::URL_BASE . "students/new";
        $view->render('students');
    }

    function new() {
        VerificarToken::comprobarAdmin();

        $view = new View();
        try {
            $courses = $this->courses_model->getCourses();
            $coursesFromStudent = [""];
            if (isset($_POST["enviar"])) {
                $validate = new StudentValidator($_POST);
                if ($validate->isOk()) {
                    $student = new Student($_POST);
                    $id = $this->model->createStudent($student);
                    if ($id !== false) {
                        $coursesFromStudent = $this->model->getCoursesByStudent($id);
                        if($_POST["curso"]!="" ||  !in_array($coursesFromStudent,$_POST["curso"])){
                            $ok=$this->model->setStudentInCourse($id, $_POST["curso"]);
                            if ($ok !== false) 
                            echo "Se ha actualizado el estudiante";
                        }
                        header("location:" . Config::URL_BASE . "courses/editCourses");
                    }
                    $_POST = [];
                }
            }
        } catch (StudentValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->coursesFromStudent=$coursesFromStudent;
            $view->courses=$courses;
            $view->urlBack = Config::URL_BASE . "students";
            $view->render('newstudent');
        }
    }

    function edit(int $id) {
        VerificarToken::comprobarAdmin();


        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }

        $view = new View();
        try {
            $studentOld = $this->model->getStudent($id);
            $courses = $this->courses_model->getCourses();
            $coursesFromStudent = $this->model->getCoursesByStudent($id);
            
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
                        if($_POST["curso"]!="" ||  !in_array($coursesFromStudent,$_POST["curso"])){
                            $ok=$this->model->setStudentInCourse($student->getId(), $_POST["curso"]);
                            if ($ok !== false) 
                            echo "Se ha actualizado el estudiante";
                        }
                                         
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
            $view->coursesFromStudent=$coursesFromStudent;
            $view->courses=$courses;
            $view->urlBack = Config::URL_BASE . "students";
            $view->render('edit_student');
        }
    }

    function info(int $id) {
        VerificarToken::comprobarAdmin();

        $view = new View();
        $student = $this->model->getStudent($id);
        $view->student = $student;
        $view->urlReturn = Config::URL_BASE . "students";
        $view->urlCourseInfo = Config::URL_BASE . "students/info/" . $id;
        $view->render('infoStudent');
    }

    function delete(int $id) {
        VerificarToken::comprobarAdmin();

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
        VerificarToken::comprobarAdmin();

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
