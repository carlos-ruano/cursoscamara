<?php
class StudentsCoursesController {

    function __construct() {
        $this->courses_model = new CoursesModel();
        $this->students_model = new StudentsModel();
    }

    function listado(int $id) {
        VerificarToken::comprobarAdmin();

        $view = new View();
        $course = $this->courses_model->getCourse($id);
        $students = $this->students_model->getStudentsByCourse($id);
        $view->students = $students;
        $view->course = $course;
        $view->urlReturn = Config::URL_BASE . "courses/editCourses";
        $view->urlCourseInfo = Config::URL_BASE . "courses/info/" . $id;
        $view->render('listado_by_course');
    }
    function add_alumno(int $course_id) {
        VerificarToken::comprobarAdmin();

        $view = new View();
        try {
            if (isset($_POST["enviar"])) {
                $validate = new StudentValidator($_POST);

                if ($validate->isOk()) {
                    $student = new Student($_POST);
                    $student_id = $this->students_model->createStudent($student);
                    if ($student_id !== false) {
                        $ok=$this->students_model->setStudentInCourse($student_id, $course_id);
                        if ($ok !== false) 
                        header("location:" . Config::URL_BASE . "courses/listado/" . $course_id);
                    }
                    $_POST = [];
                }
            }
        } catch (StudentValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "courses/listado/".$course_id;
            $view->render('newstudent');
        }
    }

    function deleteStudentFromCourse($params) {
        VerificarToken::comprobarAdmin();


        if (!is_array($params)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        $course_id = $params["course_id"];
        $student_id = $params["student_id"];

        try {
            $student = $this->students_model->getStudent($student_id);
            $course = $this->courses_model->getCourse($course_id);
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "students'>Volver</a>";
        }
       
        if (is_null($student) || is_null($course)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        } else {
            $view = new View();
            $view->student = $student;
            $view->course = $course;
            $view->urlReturn = Config::URL_BASE . "students";
            $view->url_delete_only_from_course = Config::URL_BASE . "students/deleteOnlyFromCourse/$student_id/$course_id";
            $view->url_delete_complete = Config::URL_BASE . "students/deleteStudentComplete/$student_id/$course_id";
            $view->render('delete_course_student');
        }
    }
    function deleteOnlyFromCourse($params) {
        VerificarToken::comprobarAdmin();

        if (!is_array($params)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        $course_id = $params["course_id"];
        $student_id = $params["student_id"];
        try {
            $ok = $this->students_model->deleteStudentFromCourse($student_id, $course_id);
            if ($ok) {
                header("location: " . Config::URL_BASE . "students");
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "students'>Volver</a>";
        }
    }
    function deleteStudentComplete($params) {
        VerificarToken::comprobarAdmin();

        if (!is_array($params)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        $course_id = $params["course_id"];
        $student_id = $params["student_id"];
        try {
            $ok = $this->students_model->deleteStudentFromCourse($student_id, $course_id);
            if ($ok) {
                $ok = $this->students_model->deleteStudent($student_id);
                if ($ok) {
                    header("location: " . Config::URL_BASE . "courses/listado/".$course_id);
                }
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "students'>Volver</a>";
        }
    }
}
