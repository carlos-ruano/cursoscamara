<div class="generalContainer">
    <div class="courseContainer">
        <?php foreach ($this->courses as $course) { ?>
        <a href="<?= Config::URL_BASE.'courses/info/'.$course->getId()?>" class="noDecorationLink">
            <div class="courseBox">
                <div class="nombre"><?= $course->getName() ?? '' ?></div>
                <div class="imagen"><img src="./content/img/fotoprueba.jpg" alt=""></div>
                <div class="dato"> Fecha de inicio: <?= $course->getStart_date() ?? '' ?></div>
                <div class="dato"> Fecha de finalización: <?= $course->getEnd_date() ?? '' ?></div>
                <div class="dato"> Duración: <?= $course->getDuration() ?? '' ?> horas</div>
                <div class="contacto">
                    <a href="tel:+34616923002" class="llamanos">Llámanos</a>
                    <a href="<?= $course->getWeb_link() ?? '' ?>" class="inscribete">Inscríbete</a>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>