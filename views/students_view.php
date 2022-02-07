<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="generalContainer">
    <h2>Alumnos</h2>
    <a href="<?= $this->urlReturn ?>" class="cancel">Volver</a>
    <?php include "listado.php";?>
    <a href="<?= $this->url_new_student?>" class="addCourse"><i class="fas fa-plus"></i></a>
    
</div>