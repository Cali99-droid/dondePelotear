<?php

namespace Model;

class Distrito extends ActiveRecord
{
    //base datos
    protected static $tabla = 'distrito';
    protected static $columnasDB = ['id', 'distrito', 'provincia_id'];

    public $id;
    public $distrito;
    public $provincia_id;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->distrito = $args['distrito'] ?? '';
        $this->provincia_id = $args['provincia_id'] ?? '';
       
    }

}