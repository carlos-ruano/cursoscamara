<?php

class SignUpValidatorException extends FormValidatorException {
}

class SignUpValidator {
    function __construct(array $data) {
        $this->crush = new SignUpValidatorException('Datos Incorrectos');
        $this->hayError = false;
        $this->validateName($data["name"]);
        $this->validateEmail($data["email"]);
        $this->validatePassword($data["password"],$data["pass2"]);
        if ($this->hayError) {
            throw $this->crush;
        }
    }
    private function validateName(String $name) {
        if ($name === '') {
            $this->hayError = true;
            $this->crush->addMessageError(
                'name',
                'El campo no puede ser vacio.'
            );
        } else if (strlen($name) > Config::NAME_CHARACTER_MAX) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'name',
                'El campo es demasiado largo. Máximo 255 caracteres.'
            );
        }
    }
    private function validateEmail(String $email) {
        if ($email === '') {
            $this->hayError = true;
            $this->crush->addMessageError(
                'email',
                'El campo no puede ser vacio.'
            );
        } else if (!$this->is_email($email)) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'email',
                'El campo no es un correo electónico.'
            );
        }else if(strlen($email) > Config::EMAIL_CHARACTER_MAX){
            $this->hayError = true;
            $this->crush->addMessageError(
                'email',
                'El campo es demasiado largo. Máximo 255 caracteres.'
            );
        }
    }

    function is_email(String $str) {
        $pos = stripos($str, "@");
        if ($pos === false) {
            return false;
        } else {
            $substr = substr($str, $pos + 1);
            $posPto = stripos($substr, ".");
            if ($posPto === false) {
                return false;
            }
        }
        return true;
    }

    private function validatePassword(string $pass, string $pass2){
        if (strlen($pass) < Config::PASS_CHARACTER_MIN) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'password',
                'Minimo 4 caracteres.'
            );
        }else if ($pass !== $pass2) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'pass2',
                'Las contraseñas no son iguales.'
            );
        }
    }


    public function isOK() {
        return !$this->hayError;
    }
}
