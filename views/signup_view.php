

<?= $this->err_msg ?? "" ?>

<div class="containerFormulario">
    <form action="#" method="post" class="formulario">
    <h3>Registro</h3>

        <div>
            <div><label for="name">Nombre: </label></div>
            <div><input type="text" id="name" name="name" value="<?= $_POST['name'] ?? "" ?>"></div>
            <div><?= $this->errores['name'] ?? "" ?></div>
        </div>
        <div>
            <div><label for="email">Email: </label></div>
            <div><input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>"></div>
            <div><?= $this->errores['email'] ?? "" ?></div>
        </div>
        <div>
            <div><label for="password">Contraseña: </label></div>
            <div><input type="password" id="password" name="password"></div>
            <div><?= $this->errores['password'] ?? "" ?></div>
        </div>
        <div>
            <div><label for="pass2">Repita la contraseña: </label></div>
            <div><input type="password" id="pass2" name="pass2"></div>
            <div><?= $this->errores['pass2'] ?? "" ?></div>
        </div>
        <br>
        <div>
            <div><input type="submit" name="enviar" value="Registrarse"></div>
        </div>

    </form>
</div>