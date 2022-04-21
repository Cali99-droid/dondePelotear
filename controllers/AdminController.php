<?php

namespace Controllers;

use Model\Cancha;
use Model\Categoria;
use Model\Distrito;
use Model\Horario;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        $router->render('admin/index', ['titulo' => 'Reservaciones']);
    }


    public static function cancha(Router $router)
    {
        $distritos = Distrito::all();
        $categorias = Categoria::all();
        $router->render('admin/cancha', [
            'titulo' => 'Mi Cancha', 
            'distritos' => $distritos,
            'categorias' => $categorias]);
    }

    public static function cuenta(Router $router)
    {
        $router->render('admin/cuenta', ['titulo' => 'Estado de Cuenta']);
    }

    public static function perfil(Router $router)
    {
        $router->render('admin/perfil', ['titulo' => 'Mi Perfil']);
    }

    public static function setCancha(){
       $horario = new Horario($_POST['horario']);
       $respuesta =  $horario->guardar();
       $cancha = new Cancha($_POST);
       $cancha->horario_id = $respuesta->id;
       //TODO GUARDAR IMAGEN DE CANCHA
       echo json_encode(['cancha'=> $cancha, 'horario' => $horario]);
    }
}
