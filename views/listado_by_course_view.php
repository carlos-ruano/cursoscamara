<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="generalContainer">
    <h2><?=$this->course->getName();?></h2>
    <div class="img_listado">
        <img src="<?= Config::PATH_IMG . $this->course->getImage_link()?>" alt="">
    </div>
    <br>
    <a href="<?= $this->urlReturn ?>" class="cancel">Volver</a>
    <?php include "listado.php";?>
    <a href="<?= Config::URL_BASE."courses/add_alumno/".$this->course->getId()?>" class="addCourse"><i class="fas fa-plus"></i></a>
</div>