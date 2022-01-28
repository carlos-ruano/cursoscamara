<h3>Editar curso</h3>

<div>
    <img src="<?= $this->image ?? '' ?>" alt="image" srcset="">
</div>
<?php
echo "<a href='" . $this->urlBack . "'>Volver</a><br><br>";
include "course_form.php"; ?>