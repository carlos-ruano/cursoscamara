<div class="generalContainer">
    <h2>Edición de cursos</h2>

    <?php foreach($this->courses as $course){ ?>

        <div class="courseEditBox">
            <div class="image"><img src="<?= Config::PATH_IMG . "fotoprueba.jpg"?>" alt=""></div>
            <div class="name"><h4><?= $course->getName() ?? '' ?></h4></div>
            <div class="delete">Borrar</div>
            <div class="edit">Editar</div>
        </div>

    <?php } ?>

    <a href="" class="addCourse"><i class="fas fa-plus-square"></i></a>
</div>

