<div class="generalContainer">
    <a href="<?= $this->urlEditCourses ?>" class="login">Gestión de cursos</a>
    <div class="courseContainer">
        <?php foreach ($this->courses as $course) { ?>
        
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
        
        <?php } ?>
    </div>
</div>