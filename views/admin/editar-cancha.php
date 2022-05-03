<?php include_once __DIR__ . '/header-dashboard.php' ?>
<div>
    <a href="/admin">Mi cancha</a>
    <a href="/editar-cancha">/ Editar Cancha</a>
</div>

<div class="modal-lt">
<form class="formulario nueva-tarea ">
        <legend>Editar cancha
        </legend>
        <div class="contenedor-form">
            <div class="columna">
                <div class="campo">
                    <label>Nombre</label>
                    <input type='text' value="<?php echo $cancha->nombre?>" name='nombre' id='nombre' placeholder="Añade el nombre de tu cancha" />
                </div>
                <div class="campo">
                    <label>Descripcion</label>
                    <input type='text' value="<?php echo $cancha->descripcion?>" name='descripcion' id='descripcion' placeholder="Añade una descripción breve" />
                </div>
                <div class="campo">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria">
                    <?php foreach ($categorias as $categoria) : ?>
                        <option <?php echo $categoria->id === $cancha->categoria_id ? 'selected' : ''  ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->categoria; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
               
                <div class="contenedor-dos">
                    <div class="campo input-todo">
                        <label>Telefono</label>
                        <input type='tel' value="<?php echo $cancha->telefono?>" name='telefono' id="telefono" placeholder="Añade tu numero de contacto" />
                    </div>
                    <div class="campo input-todo">
                        <label>Precio</label>
                        <input type='number' name='precio' value="<?php echo $cancha->precio?>" id="precio" placeholder="Añade el precio de alquiler por hora" />
                    </div>
                </div>
            </div>
            <div class="columna">
                <div class="campo">
                    <label for="distrito">Distrito</label>
                    <select class="combo" name="distrito" id="distrito">
                    <?php foreach ($distritos as $distrito) : ?>
                        <option <?php echo $distrito->id === $cancha->distrito_id ? 'selected' : ''  ?> value="<?php echo $distrito->id; ?>"><?php echo $distrito->distrito; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <div class="campo">
                    <label>Dirección</label>
                    <input type='text' name='tarea' id="direccion" value="<?php echo $cancha->direccion?>" placeholder="Añade la dirección" />
                </div>
                <div class="campo">
                    <fieldset>
                        <legend>Horario:</legend>

                        <div class="horario">
                            <label>Desde:</label>
                            <input type='time' name='desde' placeholder="" id='desde' />
                            <label>Hasta:</label>
                            <input type='time' name='hasta' placeholder="" id='hasta' />
                        </div>
                    </fieldset>
                </div>
                <div class="campo">
                    <label>Imagen</label>
                    <input type='file' name='imagen' id="imagen" placeholder="Añade la dirección" />
                </div>
                <input type='hidden' name='id_cancha' id="id_cancha" value="<?php echo $cancha->id  ?>" />
                <div class="opciones">
                    <button type="button" class="submit-nueva-cancha" id="guardar-cancha" >Guardar</button>
                    <button type="button" class='cerrar-modal'>Cancelar</button>
                </div>
            </div>
        </div>




    </form>
</div>
<?php include_once __DIR__ . '/footer-dashboard.php' ?>