<?php

namespace Model;

class Cancha extends ActiveRecord
{
    //base datos
    protected static $tabla = 'cancha';
    protected static $columnasDB = ['id', 'nombre', 
    'descripcion', 'direccion','telefono', 'precio',  'estado', 
    'horario_id', 'categoria_id', 'distrito_id'];

    public $id;
    public $nombre;
    public $descripcion;
    public $telefono;
    public $precio;
    public $direccion;
    public $estado;
    public $horario_id;
    public $categoria_id;
    public $distrito_id;

    //atributos
    public $horario;
    public $categoria;
    public $distrito;
    public $imagen;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->estado = $args['estado'] ?? '0';
        $this->horario_id = $args['horario_id'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->distrito_id = $args['distrito_id'] ?? '';
      
       
    }

   public function asignarAtributos(){
    $this->categoria = Categoria::where('id',$this->categoria_id)->categoria;
    $this->distrito = Distrito::where('id', $this->distrito_id)->distrito;
    $this->horario = Horario::where('id',$this->horario_id);
    $this->imagen = Imagen::where('cancha_id', $this->id)->ruta;
   }

   
}