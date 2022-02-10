<div class="courseContainer">
        <div class="datos_alumnos back_c_red">
            <div><span class="material-icons">account_circle</span></div>
            <div>Nombre</div>
            <div class="listado_responsive2">Apellidos</div>
            <div class="listado_responsive2">DNI / NIE</div>
            <div class="listado_responsive2">Teléfono</div>
            <div class="listado_responsive2">GJ</div>
            <div class="listado_responsive2">PICE</div>
            <div class="listado_responsive2">Orientación</div>
            <div class="listado_responsive2">Observaciones</div>
        </div>

        <?php foreach ($this->students as $student) { ?>
            <div class="datos_alumnos">
                <div><span class="material-icons">person</span></div>
                <div><?= $student->getName() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getSurname() ?? '' ?></div>
                <div class="listado_info"><a href="<?= Config::URL_BASE.'students/info/'.$student->getId()?>"><i class="fas fa-info-circle"></i></a></div>
                <div class="listado_responsive2"><?= $student->getDni() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getTelephone() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getGarantia() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getPice() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getOrientation() ?? '' ?></div>
                <div class="listado_responsive2"><?= $student->getObservations() ?? '' ?></div>
                <div class="listado_opciones">
                    <div><a href="<?php if (isset($this->course)){
                        echo  Config::URL_BASE.'students/deleteStudentFromCourse/'.$student->getId().'/'.$this->course->getId();
                    }else{
                        echo  Config::URL_BASE.'students/delete/'.$student->getId();
                    }?>" class="delete"><i class="fas fa-trash-alt"></i></a></div>
                    <div><a href="<?= Config:: URL_BASE . 'students/edit/' . $student->getId() ?>" class="edit"><i class="fas fa-edit"></i></a></div>
                </div>
            </div>
        <?php } ?>
    </div>