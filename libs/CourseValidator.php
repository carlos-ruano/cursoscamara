<?php
class CourseValidatorException extends FormValidatorException {
}

class CourseValidator {
    function __construct(array $data) {
        $this->crush = new CourseValidatorException('Datos Incorrectos.');
        $this->hayError = false;
        $name = $data["name"];
        $start_date = $data["start_date"];
        $end_date = $data["end_date"];
        /*$place = $data["place"];
        $schedule = $data["schedule"];
        $contact_email = $data["contact_email"];
        $contact_telephone = $data["contact_telephone"];
        $description = $data["description"];
        $web_link = $data["web_link"];
        $pdf_link = $data["pdf_link"];

        $array_strings =[$place,$schedule,$contact_email,$contact_telephone,$description,$web_link,$pdf_link];
*/
        $this->validate_name($name);
        if ($start_date != "s")
            $this->validate_date($start_date, "start_date");
        if ($end_date != "s")
            $this->validate_date($end_date, "end_date");
        if (($start_date != "" && $end_date != ""))
            $this->compare_dates($start_date, $end_date);
        foreach ($data as $key => $value) {
            if ($value != "s" && $key != "name" && $key != "start_date" && $key != "end_date") {
                $this->validate_string($value, $key);
            }
        }


        /*if ($place != "")
            $this->validate_string($place, "place");
        if ($schedule != "")
            $this->validate_string($schedule, "schedule");
        if ($contact_email != "")
            $this->validate_string($contact_email, "contact_email");
        if ($contact_telephone != "")
            $this->validate_string($contact_telephone, "contact_telephone");
        if ($description != "")
            $this->validate_string($description, "description");
        if ($web_link != "")
            $this->validate_string($web_link, "web_link");
        if ($pdf_link != "")
            $this->validate_string($pdf_link, "pdf_link");
*/


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

    private function compare_dates(string $date, string $date2) {
        if ($date > $date2) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'end_date',
                'La fecha de inicio no puede ser mayor a la de finalización.'
            );
        }
    }

    private function validate_string(String $value, $key) {
        if (strlen($value) < Config::MAX_255) {
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
