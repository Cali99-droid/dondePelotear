<aside class="sidebar">
    <div class="contenedor-sidebar">
        <h2>DondePelotear<span>.com</span></h2>
        <div class="cerrar-menu">
            <img id="cerrar-menu" src="build/img/cerrar.svg" alt="imagen-cerrar" id="mobile-menu">
        </div>
    </div>
    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Mi Cancha') ? 'activo' : ''; ?>" href="/cancha-admin">Mi Cancha</a>
        <a class="<?php echo ($titulo === 'Reservaciones') ? 'activo' : '';  ?>" href="/reservaciones">Reservaciones</a>
        <a class="<?php echo ($titulo === 'Estado de Cuenta') ? 'activo' : '';  ?>" href="/cuenta">Estado de cuenta</a>
        <a class="<?php echo ($titulo === 'Mi Perfil') ? 'activo' : '';  ?>" href="/perfil">Mi Perfil</a>

    </nav>
    <div class="cerrar-sesion-mobile">
        <a href="/logout" class="cerrar-sesion">Cerrar Session</a>
    </div>
</aside>