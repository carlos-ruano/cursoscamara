<div class="generalContainer">
<h2>Registro</h2>
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
            <div class="tipoDato"><label for="email">Email: </label></div>
            <div class="divDato">
                <div class="dato"><input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>"></div>
                <div class="error"><?= $this->errores['email'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="password">Contraseña: </label></div>
            <div class="divDato">
                <div class="dato"><input type="password" id="password" name="password"></div>
                <div class="error"><?= $this->errores['password'] ?? "" ?></div>
            </div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="pass2">Repita la contraseña: </label></div>
            <div class="divDato">
                <div class="dato"><input type="password" id="pass2" name="pass2"></div>
                <div class="error"><?= $this->errores['pass2'] ?? "" ?></div>
            </div>
        </div>
        <br>
        <div class="celda">
            <div class="enviar"><input type="submit" name="enviar" value="Registrarse"></div>
        </div>

    </form>
</div>
</div>