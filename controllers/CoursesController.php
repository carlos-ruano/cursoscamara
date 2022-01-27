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

    function new() {
        /*if (!($_SESSION["autenticado"] && $_SESSION["rol"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }*/
        $view = new View();
        try {
            if (isset($_POST["enviar"])) {
                $validate = new CourseValidator($_POST);
                if ($validate->isOk()) {
                    $course = new Course($_POST);
                    $id = $this->model->createCourse($course);
                    if($id!==false){
                        header("location:".Config::URL_BASE."/editCourses");
                    }
                    $_POST = [];
                }
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "\editCourses";
            $view->render('newCourse_view');
        }
    }

    function editCourses(){

        /*if (!($_SESSION["autenticado"] && $_SESSION["rol"] === 'administrador')) {
            header("location:" . Config::URL_BASE);
        }*/
        $view = new View();
        $courses=$this->model->getCourses();
        $view->courses = $courses;
        $view->urlReturn = Config::URL_BASE;
        $view->render('editCourses');
    }


    function edit(int $id) {
        /*if (!($_SESSION["autenticado"] && $_SESSION["rol"] === 'administrador')) {
            header("location:" . Config::URL_BASE);
        }*/

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "/editCourses");
        }

        $view = new View();
        try {
            $courseOld = $this->model->getCourse($id);
            if (is_null($courseOld)) {
                header("location:" . Config::URL_BASE . "/editCourses");
            }
            if (isset($_POST["enviar"])) {
                $validate = new CourseValidator($_POST);
                if ($validate->isOk()) {
                    $course = new Course($_POST);
                    $course->setId($id);
                    $course->setImage_link($courseOld->getImagen());
                    if ($_FILES["image"]["name"] !== "") {
                        $tmp = $_FILES["image"]["tmp_name"];
                        $name = $_FILES["image"]["name"];
                        $size = $_FILES["image"]["size"];
                        $type = $_FILES["image"]["type"];
                        $path=new ConfigPath();
                        $destino = $path->path_imagenes . "/" . $name;
                        if ($type === "image/jpeg") {
                            $ok = move_uploaded_file($tmp, $destino);
                            if ($ok) {
                                $course->setImage_link($name);
                                $file = $path->path_imagenes . "/" . $courseOld->getImagen();
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                                $view->image = Config::URL_IMG . "/" . $course->getImage_link();
                            }
                        } else {
                            $view->errores["imagen"] = "El archivo seleccionado no es una imagen.";
                        }
                    } else {
                        $view->imagen = Config::URL_IMG . "/" . $courseOld->getImagen();
                    }

                    $id = $this->model->editCourse($course);
                    if ($id!==false){
                        header("location:".Config::URL_BASE."/editCourses");
                    }
                }
            } else {
                $_POST = [
                    "id" => $courseOld->getId(),
                    "name" => $courseOld->getName(),
                    "start_date" => $courseOld->getStart_date(),
                    "end_date" => $courseOld->getEnd_date(),
                    "duration" => $courseOld->getDuration(),
                    "place" => $courseOld->getPlace(),
                    "schedule" => $courseOld->getSchedule(),
                    "email" => $courseOld->getContact_email(),
                    "telephone" => $courseOld->getContact_telephone(),
                    "description" => $courseOld->getDescription(),
                    "web_link" => $courseOld->getWeb_link(),
                    "pdf_link" => $courseOld->getPdf_link(),
                    "image_link" => $courseOld->getImage_link(),
                    "status" => $courseOld->getStatus()
                ];
                $view->image = Config::URL_IMG . "/" . $courseOld->getImagen();
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "\editCourses";
            $view->render('course_edit');
        }
    }

    function delete(int $id) {
        if (!($_SESSION["autenticado"] && $_SESSION["rol"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "/editCourses");
        }
        $course = $this->model->getCourse($id);
        if (is_null($course)) {
            header("location: " . Config::URL_BASE . "/editCourses");
        } else {
            $view = new View();
            $view->course = $course;
            $view->urlBack = Config::URL_BASE . "/editCourses";
            $view->url_delete = Config::URL_BASE . "/courses/deletetotal/$id";
            $view->render('course_delete');
        }
    }
    function deletetotal(int $id) {
        if (!($_SESSION["autenticado"] && $_SESSION["rol"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }
        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "/course");
        }
        try {
            $ok = $this->model->deleteCourse($id);
            if ($ok) {
                header("location: " . Config::URL_BASE . "/editCourse");
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "/editCourse'>Volver</a>";
        }
    }





}