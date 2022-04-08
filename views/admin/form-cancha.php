<div id="nueva-cancha" class="modal-lt animate ">
    <form class="formulario nueva-tarea ">
        <legend>Añade una nueva cancha
        </legend>
        <div class="contenedor-form">
            <div class="columna">
                <div class="campo">
                    <label>Nombre</label>
                    <input type='text' name='nombre' id='nombre' placeholder="Añade el nombre de tu cancha" />
                </div>
                <div class="campo">
                    <label>Descripcion</label>
                    <input type='text' name='tarea' placeholder="Añade una descripción breve" />
                </div>
                <div class="campo">
                    <label>Dirección</label>
                    <input type='text' name='tarea' placeholder="Añade la dirección" />
                </div>
                <div class="contenedor-dos">
                    <div class="campo input-todo">
                        <label>Telefono</label>
                        <input type='tel' name='telefono' placeholder="Añade tu numero de contacto" />
                    </div>
                    <div class="campo input-todo">
                        <label>Precio</label>
                        <input type='number' name='precio' placeholder="Añade el precio de alquiler por hora" />
                    </div>
                </div>
            </div>
            <div class="columna">
                <div class="campo">
                    <label>Provincia</label>
                    <select name="categoria" id="">
                        <option value="">Grass</option>
                        <option value="">Loza</option>
                        <option value="">Recreo</option>
                    </select>
                </div>
                <div class="campo">
                    <label>Distrito</label>
                    <select class="combo" name="categoria" id="">
                        <option value="">Grass</option>
                        <option value="">Loza</option>
                        <option value="">Recreo</option>
                    </select>
                </div>
                <div class="campo">
                    <label>Categoria</label>
                    <select name="categoria" id="">
                        <option value="">Grass</option>
                        <option value="">Loza</option>
                        <option value="">Recreo</option>
                    </select>
                </div>
                <div class="campo">
                    <fieldset>
                        <legend>Horario:</legend>

                        <div class="horario">
                            <label>Desde:</label>
                            <input type='time' name='tarea' placeholder="" id='tarea' />
                            <label>Hasta:</label>
                            <input type='time' name='tarea' placeholder="" id='tarea' />
                        </div>
                    </fieldset>
                </div>
                <div class="campo">
                    <label>Imagen</label>
                    <input type='file' name='tarea' placeholder="Añade la dirección" />
                </div>
                <div class="opciones">
                    <input type="submit" class="submit-nueva-tarea" value="Guardar">
                    <button type="button" class='cerrar-modal'>Cancelar</button>
                </div>
            </div>
        </div>




    </form>
</div>