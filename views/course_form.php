<div class="formulario">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="celda">
            <div class="tipoDato"><label for="name">Nombre del curso: </label></div>
            <div class="dato"><input type="text" id="name" name="name" value="<?= $_POST['name'] ?? "" ?>"></div>
            <div><?= $this->errores['name'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="start_date">Fecha de inicio: </label></div>
            <div class="dato"><input type="date" id="start_date" name="start_date" value="<?= $_POST['start_date'] ?? "" ?>"></div>
            <div><?= $this->errores['start_date'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="end_date">Fecha de finalización: </label></div>
            <div class="dato"><input type="date" id="end_date" name="end_date" value="<?= $_POST['end_date'] ?? "" ?>"></div>
            <div><?= $this->errores['end_date'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="place">Lugar: </label></div>
            <div class="dato"><input type="text" id="place" name="place" value="<?= $_POST['place'] ?? "" ?>"></div>
            <div><?= $this->errores['place'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="schedule">Horario: </label></div>
            <div class="dato"><input type="text" id="schedule" name="schedule" value="<?= $_POST['schedule'] ?? "" ?>"></div>
            <div><?= $this->errores['schedule'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="contact_email">Email de contacto: </label></div>
            <div class="dato"><input type="email" id="contact_email" name="contact_email" value="<?= $_POST['contact_email'] ?? "" ?>"></div>
            <div><?= $this->errores['contact_email'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="contact_telephone">Teléfono de contacto: </label></div>
            <div class="dato"><input type="text" id="contact_telephone" name="contact_telephone" value="<?= $_POST['contact_telephone'] ?? "" ?>"></div>
            <div><?= $this->errores['contact_telephone'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="description">Descripción del curso: </label></div>
            <div class="dato"><textarea name="description" id="description" cols="30" rows="3"><?= $_POST['description'] ?? "" ?></textarea></div>
            <div><?= $this->errores['description'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="web_link">Enlace web: </label></div>
            <div class="dato"><input type="text" id="web_link" name="web_link" value="<?= $_POST['web_link'] ?? "" ?>"></div>
            <div><?= $this->errores['web_link'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="pdf_link">Link pdf: </label></div>
            <div class="dato"><input type="text" id="pdf_link" name="pdf_link" value="<?= $_POST['pdf_link'] ?? "" ?>"></div>
            <div><?= $this->errores['pdf_link'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="image">Imagen: </label></div>
            <div class="datoImg"><input type="file" id="image" name="image"></div>
            <div><?= $this->errores['imagen'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="status">Disponible: </label></div>
            <div class="dato"><input type="checkbox" id="status" name="status" value="<?= $_POST['status'] ?? "" ?>"></div>
            <div><?= $this->errores['status'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="enviar"><input type="submit" name="enviar"></div>
        </div>
    </form>
</div>