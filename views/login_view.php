
<div class="generalContainer">
    <h2>Log-in</h2>
<div class="formulario">
    <form action="#" method="post">
        <div class="celda">
            <div class="tipoDato"><label for="email">Email: </label></div>
            <div class="dato"><input type="email" id="email" name="email" value="<?= $_POST['email'] ?? "" ?>"></div>
            <div><?= $this->errores['email'] ?? "" ?></div>
        </div>
        <div class="celda">
            <div class="tipoDato"><label for="password">Contraseña: </label></div>
            <div class="dato"><input type="password" id="password" name="password"></div>
            <div><?= $this->errores['password'] ?? "" ?></div>
        </div>
        <br>
        <div>
            <?= $this->err_msg ?? "" ?>
        </div>
        <br>
        <div class="celda">
            <div class="enviar"><input type="submit" name="enviar" value="Entrar"></div>
        </div>

    </form>
</div>
</div>