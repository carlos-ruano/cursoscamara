<div class="div_info_student">
    <div class="data_info_student">
        <div>Nombre:</div>
        <div><?= $this->student->getName() ?></div>
    </div>
    <div class="data_info_student">
        <div>Apellidos:</div>
        <div><?= $this->student->getSurname() ?></div>
    </div>
    <div class="data_info_student">
        <div>DNI / NIE:</div>
        <div><?= $this->student->getDni() ?></div>
    </div>
    <div class="data_info_student">
        <div>Teléfono:</div>
        <div><?= $this->student->getTelephone() ?></div>
    </div>
    <div class="data_info_student">
        <div>Fecha G.J.:</div>
        <div><?= $this->student->getGarantia() ?></div>
    </div>
    <div class="data_info_student">
        <div>Fecha PICE:</div>
        <div><?= $this->student->getPice() ?></div>
    </div>
    <div class="data_info_student">
        <div>Orientación:</div>
        <div><?= $this->student->getOrientation() ?></div>
    </div>
    <div class="data_info_student">
        <div>Observaciones:</div>
        <div><?= $this->student->getObservations() ?></div>
    </div>
</div>