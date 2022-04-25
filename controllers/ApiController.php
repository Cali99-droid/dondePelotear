<?php

namespace Controllers;

use Model\Cancha;


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