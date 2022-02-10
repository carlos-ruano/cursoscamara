<?php
use Firebase\JWT\JWT;

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
                        $_SESSION["name"]=$usr->getName();
                        $time = time();
                        $token = array(
                            'iat' => $time, // Tiempo que inició el token
                            'exp' => $time + Config::AUTH_TIME, // Tiempo que expirará el token
                            'data' => [ // información del usuario
                                'id' => $usr->getId(),
                                'username' => $usr->getName(),
                                'role' => $usr->getRole()
                            ]
                        );
                        $token = JWT::encode($token, Config::AUTH_KEY, Config::AUTH_ENCRYPT);
                        $_SESSION["token"]=$token;

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
        if(isset($_SESSION["token"])){
            session_destroy();
            header("location:".Config::URL_BASE);
       }
    }
}
