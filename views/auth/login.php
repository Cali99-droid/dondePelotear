<div class="contenedor-sm margin-arriba contenido-titulo" id="dropdown">
    <a href="/">
        <h2> DondePelotear<span>.com</span></h2>
    </a>
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
    <form class="formulario" method="POST">

        <div class="campo">
            <label for="correo">Correo</label>
            <input type="email" name="correo" class="user">
        </div>
        <div class="campo">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <button class="btn" type="submit">Acceder</button>
        <div class="route margin-arriba">
            <a href="/crear-cuenta">¿No tienes Cuenta? Regístrate</a>
            <a href="/olvide">Olvidé mi contraseña</a>
        </div>
    </form>


</div>