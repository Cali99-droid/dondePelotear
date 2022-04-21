<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;
use Controllers\LoginController;

$router = new Router();

//iniciar session
$router->get('/', [LoginController::class, 'inicio']);
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/cancha', [LoginController::class, 'cancha']);
//recuperar pass
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//crear cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crear']);
$router->post('/crear-cuenta', [LoginController::class, 'crear']);

//confirmar cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Zona privada 
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/cancha-admin', [AdminController::class, 'cancha']);
$router->get('/cuenta', [AdminController::class, 'cuenta']);
$router->get('/perfil', [AdminController::class, 'perfil']);
//API's ADMIN /api/setCancha
$router->post('/api/set-cancha', [AdminController::class, 'setCancha']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
