<div class="generalContainer">
<h2>Nuestros cursos formativos</h2>
    <div class="courseContainer">
        <?php foreach ($this->courses as $course) { ?>
        <a href="<?= Config::URL_BASE.'courses/info/'.$course->getId()?>" class="noDecorationLink">
            <div class="courseBox">
                <div class="nombre"><?= $course->getName() ?? '' ?></div>
                <div class="imagen"><img src="<?=Config::PATH_IMG.$course->getImage_link()?>" alt=""></div>
                <div class="datos"> Fecha de inicio: <?= $course->getStart_date() ?? '' ?></div>
                <div class="datos"> Fecha de finalización: <?= $course->getEnd_date() ?? '' ?></div>
                <div class="datos"> Duración: <?= $course->getDuration() ?? '' ?> horas</div>
                <div class="contacto">
                    <a href="tel:+34616923002" class="llamanos">Llámanos</a>
                    <a href="<?= $course->getWeb_link() ?? '' ?>" class="inscribete">Inscríbete</a>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
</div>