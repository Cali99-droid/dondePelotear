<div id="top-header">
    <h2 class="enca">Registrate en Donde Pelotear</h2>
</div>

<div class="contenedor-formulario">
    <?php include_once __DIR__ . "/../templates/alertas.php" ?>
    <form method="POST" class="formulario for-crear">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
        </div>

        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido">
        </div>
        <div class="campo">
            <label for="correo">Correo</label>
            <input type="text" name="correo">
        </div>
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>

        <div class="campo campo-check">
            <label for="admin">Tengo una Cancha</label>
            <input type="checkbox" name="admin" value="1">
        </div>
        <div>
            <button type="submit" class="boton">Registrarme</button>
        </div>


    </form>


    <div class="campo-route">
        <a href="/">Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/olvide">Olvidé mi contraseña</a>
    </div>
</div>