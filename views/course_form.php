<div class="formulario">

    <img class="image100" src="<?= isset($this->image)? $this->image :""?>" alt="">
    <form action="#" method="post" enctype="multipart/form-data">

        <div class="celda">
            <div class="tipoDato"><label for="name">Nombre del curso: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="name" name="name" value="<?= $_POST['name'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['name'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="start_date">Fecha de inicio: </label></div>
            <div class="divDato">
                <div class="dato"><input type="date" id="start_date" name="start_date" value="<?= $_POST['start_date'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['start_date'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="end_date">Fecha de finalización: </label></div>
            <div class="divDato">
                <div class="dato"><input type="date" id="end_date" name="end_date" value="<?= $_POST['end_date'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['end_date'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="place">Lugar: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="place" name="place" value="<?= $_POST['place'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['place'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="schedule">Horario: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="schedule" name="schedule" value="<?= $_POST['schedule'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['schedule'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="contact_email">Email de contacto: </label></div>
            <div class="divDato">
                <div class="dato"><input type="email" id="contact_email" name="contact_email" value="<?= $_POST['contact_email'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['contact_email'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="contact_telephone">Teléfono de contacto: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="contact_telephone" name="contact_telephone" value="<?= $_POST['contact_telephone'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['contact_telephone'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="description">Descripción del curso: </label></div>
            <div class="divDato">
                <div class="dato"><textarea name="description" id="description" cols="30" rows="3"><?= $_POST['description'] ?? "" ?></textarea></div>
                <div class="error"><?= $this->errores['description'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="web_link">Enlace web: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="web_link" name="web_link" value="<?= $_POST['web_link'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['web_link'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="pdf_link">Link pdf: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="pdf_link" name="pdf_link" value="<?= $_POST['pdf_link'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['pdf_link'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="image">Imagen: </label></div>
            <div class="divDato">
                <div class="datoImg"><input type="file" id="image" name="image"></div>
                <div class="error"><?= $this->errores['image'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="status">Disponible: </label></div>
            <div class="divDato">
                <div class="dato">
                    <div class="celda">
                    <input type="checkbox" id="status" name="status" value="disponible" <?= isset($_POST["status"]) && $_POST["status"] === "disponible" ? "checked" : "" ?>>
                  </div>
                </div>
                <div class="error"><?= $this->errores['status'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="enviar"><input type="submit" name="enviar"></div>
        </div>
    </form>
</div>