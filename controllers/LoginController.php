<?php

class LoginController {
    function __construct() {
        $this->model = new UsersModel();
    }

    function index() {
        $vista = new View;
        try {
            if (isset($_POST["enviar"])) {
                $usr = $this->model->getUserByEmail($_POST["email"]);
                if (is_null($usr)) {
                    $vista->err_msg = "El usuario no existe.";
                } else {
                    $ok = password_verify($_POST["password"], $usr->getPassword());
                    if ($ok) {
                        $_SESSION["id"]=$usr->getId();
                        $_SESSION["role"]=$usr->getRole();
                        $_SESSION["name"]=$usr->getName();
                        $_SESSION["verified"]="true";
                        header("location:".Config::URL_BASE);
                    } else {
                        $vista->err_msg = "Contraseña o email incorrectos.";
                    }
                }
            }
        } catch (RegistroFormValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $vista->errores = $errores;
        } catch (MySqlDBException $e) {
            $vista->err_msg = $e->getMessage();
        } finally {
            $vista->urlBack = Config::URL_BASE;
            $vista->render('login');
        }
    }
    function cerrar(){
        if(isset($_SESSION["verified"])){
            session_destroy();
            header("location:".Config::URL_BASE);
        }
    }
}
