<?php //    debuguear($cancha->horario); ?>
<?php include_once __DIR__ . '/header-dashboard.php' ?>
<div class="contenedor">
    <?php if(is_null($cancha->id)){ ?>
        <div class="contenedor-nueva-tarea">
            <button type="button" class="btn" id="agregar-cancha">&#43; Agregar Cancha</button>
        </div>
    <?php } ?>  

    <?php if(!is_null($cancha->id)){ ?>
    <div class="contenido-cancha  ">
        <div class="contenido-detalle cont-borde">
            <h3>Detalles de la cancha <sup><a href="/editar-cancha?id=<?php echo $cancha->id ?>"><i class="fa-solid fa-pen"></i></a></sup> </h3>
            <hr>
            <h4><?php echo $cancha->nombre ?> <a href="/cancha?id=<?php echo $cancha->id ?>" target="_blanck"><i class="fa-solid fa-eye"></i> Ver</a></h4>
            <p><i class="fa-solid fa-circle-info"></i> <?php echo $cancha->descripcion ?></p>
            <p><i class="fa-solid fa-phone"></i> <?php echo $cancha->telefono ?></p>
            <p><i class="fa-solid fa-tag"></i> S/<?php echo $cancha->precio ?></p>
            <p><i class="fa-solid fa-location-dot"> </i> <?php echo $cancha->direccion . '-' . $cancha->distrito  ?></p>
            <p><i class="fa-solid fa-check"></i> <?php echo $cancha->categoria ?></p>
            <div class="acciones">
               <?php if(!is_null($cancha)){ ?>            
                    <button type="button" class="btn" id="editar-cancha">Editar Cancha</button>            
                <?php } ?>  
                <button type="button" class="btn" id="eliminar-cancha"> Eliminar</button>
            </div>  
        </div> 
      
        <div class="contenido-imagen imagen-config cont-borde">
            <h3>Imagen</h3>
            <img id="myImg" src="/imagenes/<?php echo $cancha->imagen?>" class="img-anuncio" alt="">
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        </div>

    </div>
    <?php } ?>
    <div>
    
    </div>
</div>
<?php include_once __DIR__ . '/form-cancha.php' ?>
<?php include_once __DIR__ . '/footer-dashboard.php' ?>

<?php $script .=
    ' <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="build/js/cancha.js"></script> '
?>