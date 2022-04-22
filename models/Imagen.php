<?php

namespace Model;

class Imagen extends ActiveRecord
{
    //base datos
    protected static $tabla = 'imagen';
    protected static $columnasDB = ['id', 'ruta', 'cancha_id'];

    public $id;
    public $ruta;
    public $cancha_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->ruta = $args['ruta'] ?? '';
        $this->cancha_id = $args['cancha_id'] ?? '';
       
    }
    public function setImagen($imagen)
    {

        if (!is_null($this->id)) {
            //comprobar si existe el archivo
            $this->borrarImagen();
        }
        //asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->ruta = $imagen;
        }
    }
     //eliminar imagen
     public function borrarImagen()
     {
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->ruta);
         if ($existeArchivo) {
             unlink(CARPETA_IMAGENES . $this->ruta);
         }
     }
}