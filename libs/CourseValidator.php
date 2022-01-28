<?php
class CourseValidatorException extends FormValidatorException {
}

class CourseValidator {
    function __construct(array $data) {
        $this->crush = new CourseValidatorException('Datos Incorrectos.');
        $this->hayError = false;
        /*
        $this->validarTitulo($data["titulo"]);
        $this->validarAnio_publicacion($data["anio_publicacion"]);
        $this->validarEditorial($data["editorial"]);
        */
        if ($this->hayError) {
            throw $this->crush;
        }
    }

    public function isOK() {
        return !$this->hayError;
    }
}
