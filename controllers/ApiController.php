<?php

namespace Controllers;

use Classes\Email;
use Model\Cancha;
use Model\Usuario;
use MVC\Router;

class ApiController
{

    public static function getCanchas(){
        $canchas = Cancha::all();
        $canchasA = [];
        foreach ($canchas as $cancha):
              $cancha->asignarAtributos();
              $canchasA[] = $cancha;
        endforeach;
        echo json_encode(['canchas' => $canchasA]);

    }
}