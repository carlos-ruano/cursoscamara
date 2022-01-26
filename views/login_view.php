<?= $this->err_msg ?? "" ?>
<div>
    <form action="#" method="post">
        <h3>Log In</h3>


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
        <br>
        <div>
            <div><input type="submit" name="enviar" value="Entrar"></div>
        </div>

    </form>
</div>