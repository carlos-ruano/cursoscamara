<?php

class SignUpController {

    function __construct() {
        $this->model = new UsersModel();
    }

    function index() {
        if (!($_SESSION["verified"] && $_SESSION["role"] === 'admin')) {
            header("location:" . Config::URL_BASE);
        }
        $vista = new View;
        try {
            if (isset($_POST["enviar"])) {
                $validate = new SignUpValidator($_POST);
                if ($validate->isOk()) {
                    $usr= new User($_POST);
                    $usr->encriptarPassword();
                    $id=$this->model->createUser($usr);
                    if ($id!==false){
                    header("location:".Config::URL_BASE."login");
                    }
                }
            }
        } catch (SignUpValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $vista->errores = $errores;
        } catch(MySqlDBException $e){
            $vista->err_msg=$e->getMessage();
        } finally {
            $vista->render('signup');
        }
    }
}
