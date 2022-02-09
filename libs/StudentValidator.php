<?php
class StudentValidatorException extends FormValidatorException {
}

class StudentValidator {
    function __construct(array $data) {
        $this->crush = new StudentValidatorException('Datos Incorrectos.');
        $this->hayError = false;
        $name = $data["name"];
        $surname = $data["surname"];
        $dni = $data["dni"];
        $telephone = $data["telephone"];
        $garantia = $data["garantia"];
        $pice = $data["pice"];
        $orientation = $data["orientation"];
        $observations = $data["observations"];


        $this->validate_name($name);
        $this->validate_surname($surname);

        if ($dni != "")
            $this->validate_dni($dni);
        if ($telephone != "")
            $this->validate_tel($telephone, "telephone");
        if ($garantia != "")
            $this->validate_date($garantia, "garantia");
        if ($pice != "")
            $this->validate_date($pice, "pice");
        if ($orientation != "")
            $this->validate_date($orientation, "orientation");
        if ($observations != "")
            $this->validate_string($observations, "observations");

        if ($this->hayError) {
            throw $this->crush;
        }
    }

    private function validate_name(String $name) {
        if (strlen($name) === 0) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'name',
                'El nombre no puede ser vacio.'
            );
        } else if (strlen($name) > Config::MAX_255) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'name',
                'El nombre es demasiado largo. Máximo '
                    . Config::MAX_255
                    . ' caracteres.'
            );
        }
    }

    private function validate_surname(String $surname) {
        if (strlen($surname) === 0) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'surname',
                'El nombre no puede ser vacio.'
            );
        } else if (strlen($surname) > Config::MAX_255) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'surname',
                'El nombre es demasiado largo. Máximo '
                    . Config::MAX_255
                    . ' caracteres.'
            );
        }
    }


    private function validate_date(string $date, $date_type) {
        $date_explode = explode("-", $date);

        if (count($date_explode) != 3) {
            $this->hayError = true;
            $this->crush->addMessageError(
                $date_type,
                'El campo debe ser una fecha'
            );
        } else {
            $year = $date_explode[0];
            $month = $date_explode[1];
            $day = $date_explode[2];

            if (!checkdate($month, $day, $year)) {
                $this->no_date = true;
                $this->crush->addMessageError(
                    $date_type,
                    'La fecha no es válida'
                );
            }
        }
    }

    private function validate_dni(String $value) {
        if (strlen($value) > Config::DNI_CH_MAX) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'dni',
                'El campo es demasiado largo. Máximo '
                    . Config::DNI_CH_MAX
                    . ' caracteres.'
            );
        }
    }
    private function validate_tel(String $value) {
        if (strlen($value) > Config::TEL_CH_MAX) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'telephone',
                'El campo es demasiado largo. Máximo '
                    . Config::TEL_CH_MAX
                    . ' caracteres.'
            );
        }
    }

    private function validate_string(String $value, $key) {
        if (strlen($value) > Config::MAX_255) {
            $this->hayError = true;
            $this->crush->addMessageError(
                $key,
                'El campo es demasiado largo. Máximo '
                    . Config::MAX_255
                    . ' caracteres.'
            );
        }
    }

    public function isOK() {
        return !$this->hayError;
    }
}
