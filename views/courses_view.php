<div class="generalContainer">
    <div class="courseContainer">
        <?php foreach ($this->courses as $course) { ?>
        
            <div class="courseBox">
                <div class="nombre"><?= $course->getName() ?? '' ?></div>
                <div class="imagen"><img src="./content/img/fotoprueba.jpg" alt=""></div>
                <div class="dato"> Fecha de inicio: <?= $course->getStart_date() ?? '' ?></div>
                <div class="dato"> Fecha de finalización: <?= $course->getEnd_date() ?? '' ?></div>
                <div class="dato"> Duración: <?= $course->getDuration() ?? '' ?> horas</div>
                <div class="contacto">
                    <div class="llamanos">Llámanos 617238251</div>
                    <div class="inscribete">Inscríbete</div>
                </div>
            </div>
        
        <?php } ?>
    </div>
</div>