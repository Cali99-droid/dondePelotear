<?php

namespace Model;

class Horario extends ActiveRecord
{
    //base datos
    protected static $tabla = 'horario';
    protected static $columnasDB = ['id', 'desde', 'hasta'];

    public $id;
    public $desde;
    public $hasta;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->desde = $args['desde'] ?? '';
        $this->hasta = $args['hasta'] ?? '';
       
    }

}