<?php

namespace Model;

class Categoria extends ActiveRecord
{
    //base datos
    protected static $tabla = 'categoria';
    protected static $columnasDB = ['id', 'categoria'];

    public $id;
    public $categoria;
 


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? '';
  
       
    }

}