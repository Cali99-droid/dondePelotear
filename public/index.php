<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\ApiController;
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
$router->get('/admin', [AdminController::class, 'cancha']);
$router->get('/cancha-admin', [AdminController::class, 'cancha']);
//editar cancha
$router->get('/crear-cancha', [AdminController::class, 'crear']);
$router->get('/editar-cancha', [AdminController::class, 'editar']);
$router->get('/reservaciones', [AdminController::class, 'reservaciones']);
$router->get('/cuenta', [AdminController::class, 'cuenta']);
$router->get('/perfil', [AdminController::class, 'perfil']);
//API's ADMIN /api/setCancha
$router->post('/api/set-cancha', [AdminController::class, 'setCancha']);



//API'PUBLICA api/get-canchas
$router->get('/api/get-canchas', [ApiController::class, 'getCanchas']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
