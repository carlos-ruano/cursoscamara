<div class="generalContainer">
    <h2>Edición de cursos</h2>

    <?php foreach($this->courses as $course){ ?>

        <div class="courseEditBox">
            <div class="image"><img src="<?=Config::PATH_IMG.$course->getImage_link()?>" alt=""></div>
            <div class="name"><a href="<?= Config::URL_BASE.'courses/info/'.$course->getId()?>" class="noDecorationLink"><h4><?= $course->getName() ?? '' ?></h4></a></div>

            <a href="<?= Config::URL_BASE.'courses/delete/'.$course->getId()?>" class="delete">Borrar</a>
            <a href="<?= Config:: URL_BASE . 'courses/edit/' . $course->getId() ?>" class="edit">Editar</a>

        </div>

    <?php } ?>

    <a href="<?= $this->url_newCourse?>" class="addCourse"><i class="fas fa-plus"></i></a>
</div>

