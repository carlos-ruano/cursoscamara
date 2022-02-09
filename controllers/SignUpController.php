<?php

class SignUpController {

    function __construct() {
        $this->model = new UsersModel();
    }

    function index() {
        VerificarToken::comprobarAdmin();

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
