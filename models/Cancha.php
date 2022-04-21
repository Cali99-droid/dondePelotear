<?php

namespace Model;

class Cancha extends ActiveRecord
{
    //base datos
    protected static $tabla = 'cancha';
    protected static $columnasDB = ['id', 'nombre', 
    'descripcion', 'telefono', 'precio', 'direccion', 'estado', 
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

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->horario_id = $args['horario_id'] ?? '';
        $this->categoria_id = $args['categoria_id'] ?? '';
        $this->distrito_id = $args['distrito_id'] ?? '';
       
    }

}