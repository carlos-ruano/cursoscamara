<div class="courseContainer">
        <div class="datos_alumnos back_c_red">
            <div><span class="material-icons">account_circle</span></div>
            <div>Nombre</div>
            <div>Apellidos</div>
            <div>DNI / NIE</div>
            <div>Teléfono</div>
            <div>GJ</div>
            <div>PICE</div>
            <div>Orientación</div>
            <div>Observaciones</div>
        </div>

        <?php foreach ($this->students as $student) { ?>
            <div class="datos_alumnos">
                <div><span class="material-icons">person</span></div>
                <div><?= $student->getName() ?? '' ?></div>
                <div><?= $student->getSurname() ?? '' ?></div>
                <div><?= $student->getDni() ?? '' ?></div>
                <div><?= $student->getTelephone() ?? '' ?></div>
                <div><?= $student->getGarantia() ?? '' ?></div>
                <div><?= $student->getPice() ?? '' ?></div>
                <div><?= $student->getOrientation() ?? '' ?></div>
                <div><?= $student->getObservations() ?? '' ?></div>
                <div><a href="<?= Config::URL_BASE.'students/delete/'.$student->getId()?>" class="delete">Borrar</a></div>
                <div><a href="<?= Config:: URL_BASE . 'students/edit/' . $student->getId() ?>" class="edit">Editar</a></div>
            </div>
        <?php } ?>
    </div>