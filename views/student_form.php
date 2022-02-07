<div class="formulario">

    <form action="#" method="post">

        <div class="celda">
            <div class="tipoDato"><label for="name">Nombre: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="name" name="name" value="<?= $_POST['name'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['name'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="surname">Apellidos: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="surname" name="surname" value="<?= $_POST['surname'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['surname'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="dni">DNI o NIE: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="dni" name="dni" value="<?= $_POST['dni'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['dni'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="telephone">Teléfono: </label></div>
            <div class="divDato">
                <div class="dato"><input type="text" id="telephone" name="telephone" value="<?= $_POST['telephone'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['telephone'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="garantia">Fecha garantía juvenil: </label></div>
            <div class="divDato">
                <div class="dato"><input type="date" id="garantia" name="garantia" value="<?= $_POST['garantia'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['garantia'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="pice">Fecha PICE: </label></div>
            <div class="divDato">
                <div class="dato"><input type="date" id="pice" name="pice" value="<?= $_POST['pice'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['pice'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="orientation">Fecha Orientación: </label></div>
            <div class="divDato">
                <div class="dato"><input type="date" id="orientation" name="orientation" value="<?= $_POST['orientation'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['orientation'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="observations">Observaciones: </label></div>
            <div class="divDato">
                <div class="dato"><textarea name="observations" id="observations" cols="30" rows="3"><?= $_POST['observations'] ?? "" ?></textarea></div>
                <div class="error"><?= $this->errores['observations'] ?? "" ?></div>
            </div>
        </div>      
        <div class="celda">
            <div class="enviar"><input type="submit" name="enviar"></div>
        </div>
    </form>
</div>