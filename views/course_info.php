
<div class="infoCurso">
    <div class="nombre"><?= $this->course->getName() ?? '' ?></div>
    <div class="infoPrincipal">
        <div class="imagen"><img src="<?=Config::PATH_IMG.$this->course->getImage_link()?>" alt=""></div>
        <div class="infoBasica">
            <h3>Datos del curso</h3>
            <p class="datoIzq"><div class="dato"> Fecha de inicio:</p> <p class="datoDer"><?= $this->course->getStart_date() ?? '' ?></p></div>
            <p class="datoIzq"><div class="dato"> Fecha de finalización:</p> <p class="datoDer"><?= $this->course->getEnd_date() ?? '' ?></p></div>
            <p class="datoIzq"><div class="dato"> Duración:</p> <p class="datoDer"><?= $this->course->getDuration() ?? '' ?> horas</p></div>
            <p class="datoIzq"><div class="dato"> Lugar:</p> <p class="datoDer"><?= $this->course->getPlace() ?? '' ?> </p></div>
            <p class="datoIzq"><div class="dato"> Horario:</p> <p class="datoDer"><?= $this->course->getSchedule() ?? '' ?> </p></div>
            <h3>Contacto</h3>
            <p class="datoIzq"><div class="dato"> Teléfono:</p> <p class="datoDer"><?= $this->course->getContact_telephone() ?? '' ?> </p></div>
            <p class="datoIzq"><div class="dato"> E-mail:</p> <p class="datoDer"><?= $this->course->getContact_email() ?? '' ?> </p></div>
        </div>
    </div>
    <div class="description">
        <h3>Descripción</h3>
        <div><p><?= $this->course->getDescription() ?? ''?></p></div>
    </div>
</div>