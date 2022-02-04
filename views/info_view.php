<div class="generalContainer">
    <h2>Información del curso</h2>
    <a href="<?= $this->urlReturn.'courses'?>" class="cancel">Volver</a>
    <?php include "course_info.php";?>
    <div class="contactoContainer">
        <div class="contacto">
            <a href="tel:+34616923002" class="botonContacto">Llámanos</a>
            <a href="" class="botonContacto">PDF</a>
            <a href="<?= $this->course->getWeb_link() ?? '' ?>" class="botonContacto">Inscríbete</a>
        </div>
    </div>
</div>