<?php
class CoursesController {

    function __construct() {
        $this->model = new CoursesModel();
        $this->students_model = new StudentsModel();
    }

    function index() {
        $view = new View();
        try {
            $courses = $this->model->getCourses();
            $coursesOK = [];
            foreach ($courses as $course) {
                if ($course->getStatus() === "disponible") {
                    $coursesOK[] = $course;
                }
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->courses = $coursesOK;
            $view->urlReturn = Config::URL_BASE;
            $view->urlEditCourses = Config::URL_BASE . "courses/editCourses";
            $view->render('courses');
        }
    }

    function new() {
        VerificarToken::comprobarAdmin();

        $view = new View();
        try {
            if (isset($_POST["enviar"])) {
                $validate = new CourseValidator($_POST);

                if ($validate->isOk()) {
                    $course = new Course($_POST);
                    if (isset($_FILES["image"]["name"])) {
                        if ($_FILES["image"]["name"] !== "") {
                            $tmp = $_FILES["image"]["tmp_name"];
                            $name = $_FILES["image"]["name"];
                            $size = $_FILES["image"]["size"];
                            $type = $_FILES["image"]["type"];
                            $path = $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/content/img/";
                            $destino = $path . $name;
                            $course->setImage_link($name);

                            if (!file_exists($destino)) {
                                if ($type === "image/jpeg") {
                                    $ok = move_uploaded_file($tmp, $destino);
                                    if (!$ok) {
                                        $view->errores["image"] = "El archivo no se ha subido.";
                                    }
                                } else {
                                    $view->errores["image"] = "El archivo seleccionado no es una imagen.";
                                }
                            }
                        }
                    }
                    if ($course->getImage_link() == null) {
                        $course->setImage_link("default_img.jpg");
                    }
                    $id = $this->model->createCourse($course);
                    if ($id !== false) {
                        header("location:" . Config::URL_BASE . "courses/editCourses");
                    }
                    $_POST = [];
                }
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->urlBack = Config::URL_BASE . "courses/editCourses";
            $view->render('newcourse');
        }
    }

    function editCourses() {
        VerificarToken::comprobarAdmin();
        $view = new View();
        try {
            $courses = $this->model->getCourses();
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
            header("location: " . Config::URL_BASE);
        } finally {
            $view->courses = $courses;
            $view->urlReturn = Config::URL_BASE;
            $view->url_newCourse = Config::URL_BASE . "courses/new";
            $view->render('editCourses');
        }
    }


    function edit(int $id) {
        VerificarToken::comprobarAdmin();
        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }

        $view = new View();
        try {
            $courseOld = $this->model->getCourse($id);
            if (is_null($courseOld)) {
                header("location:" . Config::URL_BASE);
            }
            if (isset($_POST["enviar"])) {
                //var_dump($_POST);
                //var_dump($_FILES);
                $validate = new CourseValidator($_POST);
                if ($validate->isOk()) {
                    $course = new Course($_POST);
                    $course->setId($id);

                    if ($_FILES["image"]["name"] != "") {

                        $tmp = $_FILES["image"]["tmp_name"];
                        $name = $_FILES["image"]["name"];
                        $size = $_FILES["image"]["size"];
                        $type = $_FILES["image"]["type"];
                        $path = $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/content/img/";
                        $destino = $path . "/" . $name;
                        if ($type === "image/jpeg") {
                            $ok = move_uploaded_file($tmp, $destino);
                            if ($ok) {
                                $course->setImage_link($name);
                                $file = $path . $courseOld->getImage_link();
                                $images = $this->model->getImages();
                                $contador = 0;
                                foreach ($images as $imagene) {
                                    if ($imagene["image_link"] == $courseOld->getImage_link()) {
                                        $contador++;
                                    }
                                }
                                if ($contador == 1 && $courseOld->getImage_link() != "default_img.jpg") {
                                    unlink($file);
                                }
                                $view->image = Config::PATH_IMG . "/" . $course->getImage_link();
                            }
                        } else {
                            $view->errores["imagen"] = "El archivo seleccionado no es una imagen.";
                        }
                    } else {
                        $course->setImage_link($courseOld->getImage_link());
                        if ($course->getImage_link() == null) {
                            $course->setImage_link("default_img.jpg");
                        }
                        $view->imagen = Config::PATH_IMG . $courseOld->getImage_link();
                    }

                    $id = $this->model->editCourse($course);
                    if ($id !== false) {
                        echo "Se ha actualizado el curso";
                        //header("location:" . Config::URL_BASE . "courses/editCourses");                 
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
                $view->image = Config::PATH_IMG . $courseOld->getImage_link();
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->image = Config::PATH_IMG . $courseOld->getImage_link();
            $view->errores = $errores;
        } finally {
            $view->url_delete = Config::URL_BASE . 'courses/delete/' . $courseOld->getId();
            $view->urlBack = Config::URL_BASE . "courses/editCourses";
            $view->render('edit_course');
        }
    }

    function info(int $id) {
        $view = new View();
        try {
            $course = $this->model->getCourse($id);
            if (is_null($course)) {
                header("location:" . Config::URL_BASE);
            }
            if ($course->getStatus() != "disponible") {
                VerificarToken::comprobarAdmin();
            }
        } catch (CourseValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $view->errores = $errores;
        } finally {
            $view->course = $course;
            $view->urlReturn = Config::URL_BASE;
            $view->urlCourseInfo = Config::URL_BASE . "courses/info/" . $id;
            $view->render('info');
        }
    }

    function delete(int $id) {
        VerificarToken::comprobarAdmin();

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        $course = $this->model->getCourse($id);
        if (is_null($course)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        } else {
            $view = new View();
            $view->course = $course;
            $view->urlReturn = Config::URL_BASE . "courses/editCourses";
            $view->url_delete = Config::URL_BASE . "courses/deletetotal/$id";
            $view->render('delete_course');
        }
    }
    function deletetotal(int $id) {
        VerificarToken::comprobarAdmin();

        if (!is_numeric($id)) {
            header("location: " . Config::URL_BASE . "courses/editCourses");
        }
        try {
            $courseOld = $this->model->getCourse($id);
            $path = $_SERVER["DOCUMENT_ROOT"] . "/cursoscamara/content/img/";
            $file = $path . $courseOld->getImage_link();
            $images = $this->model->getImages();
            $contador = 0;
            foreach ($images as $imagene) {
                if ($imagene["image_link"] == $courseOld->getImage_link()) {
                    $contador++;
                }
            }
            if ($contador == 1 && $courseOld->getImage_link() != "default_img.jpg") {
                unlink($file);
            }
            $ok = $this->model->deleteCourse($id);

            if ($ok) {
                header("location: " . Config::URL_BASE . "courses/editCourses");
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "courses/editCourses'>Volver</a>";
        }
    }
}
