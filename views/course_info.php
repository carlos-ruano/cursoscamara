<div>
    <div class="courseBox">
        <div class="nombre"><?= $this->course->getName() ?? '' ?></div>
        <div class="imagen"><img src="<?= Config::PATH_IMG.'fotoprueba.jpg'?>" alt=""></div>
        <div class="dato"> Fecha de inicio: <?= $this->course->getStart_date() ?? '' ?></div>
        <div class="dato"> Fecha de finalización: <?= $this->course->getEnd_date() ?? '' ?></div>
        <div class="dato"> Duración: <?= $this->course->getDuration() ?? '' ?> horas</div>
        <div class="contacto">
            <a href="tel:+34616923002" class="llamanos">Llámanos</a>
            <a href="<?= $this->course->getWeb_link() ?? '' ?>" class="inscribete">Inscríbete</a>
        </div>
    </div>
</div>