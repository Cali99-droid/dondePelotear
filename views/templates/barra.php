<div class="barra-mobile">
    <h1>DondePelotear.com</h1>
    <div class="menu">
        <img src="build/img/menu.svg" alt="imagen-menu" id="mobile-menu">
    </div>
</div>

<div class="barra">
    <p>Hola: <span><?php 
   // session_start();
    echo $_SESSION['nombre']; 
                    
                    ?>
                    </span></p>
    <a href="/logout" class="cerrar-session">Cerrar Session</a>
</div>