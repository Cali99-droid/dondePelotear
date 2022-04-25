<?php

namespace Model;

class Usuario_x_cancha extends ActiveRecord
{
    //base datos
    protected static $tabla = 'usuario_x_cancha';
    protected static $columnasDB = ['id', 'usuario_id', 'cancha_id'];

    public $id;
    public $usuario_id;
    public $cancha_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->cancha_id = $args['cancha_id'] ?? '';
       
    }

}