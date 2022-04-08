<?php

namespace Controllers;


use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
        $router->render('admin/index', ['titulo' => 'Reservaciones']);
    }


    public static function cancha(Router $router)
    {
        $router->render('admin/cancha', ['titulo' => 'Mi Cancha']);
    }

    public static function cuenta(Router $router)
    {
        $router->render('admin/cuenta', ['titulo' => 'Estado de Cuenta']);
    }

    public static function perfil(Router $router)
    {
        $router->render('admin/perfil', ['titulo' => 'Mi Perfil']);
    }
}
