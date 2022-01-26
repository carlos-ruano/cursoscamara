<div>
    <h3>Nuestros cursos:</h3>
    <br>
    <br>
    <?php foreach ($this->courses as $course) { ?>
        <div>
            <div> Id: <?= $course->getId() ?? '' ?></div>
            <div> Nombre: <?= $course->getName() ?? '' ?></div>
            <div> Fecha de inicio: <?= $course->getStart_date() ?? '' ?></div>
            <div> Fecha de finalización: <?= $course->getEnd_date() ?? '' ?></div>
            <div> Duración: <?= $course->getDuration() ?? '' ?> horas</div>
        </div>
    <?php } ?>
    <div>
        <a href="<?php echo $this->urlReturn?>">Volver</a>
    </div>
</div>