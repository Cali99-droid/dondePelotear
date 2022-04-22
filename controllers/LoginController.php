<?php

namespace Controllers;

use Classes\Email;
use Model\Cancha;
use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);

            $alertas = $auth->validarLogin();
            if (empty($alertas)) {
                //comprobar que exista el usuario
                $usuario = Usuario::where('correo', $auth->correo);
                if ($usuario) {
                    //verificar pass
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)) {
                        //autenticar el usuaario
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['login'] = true;

                        //redireccionamiento;
                        if ($usuario->admin === '1') {
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header('Location: /admin');
                        } else {
                            header('Location: /cita');
                        }
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/login', ['alertas' => $alertas]);
    }

    public static function inicio(Router $router)
    {
        $canchas = Cancha::all();
        $router->render('public/index',['canchas' => $canchas]);
    }
    public static function cancha(Router $router)
    {
        $router->render('public/cancha');
    }


    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function olvide(Router $router)
    {
        $alertas = [];

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $auth = new Usuario($_POST);
        //     $alertas = $auth->validarEmail();
        //     if (empty($alertas)) {
        //         $usuario = Usuario::where('email', $auth->email);
        //         if ($usuario && $usuario->confirmado === '1') {
        //             //generar u ntoken
        //             $usuario->crearToken();
        //             $usuario->guardar();

        //             //Enviar email
        //             $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
        //             $email->enviarInstrucciones();

        //             //alerta exito
        //             Usuario::setAlerta('exito', 'Revisa tu email');
        //         } else {
        //             Usuario::setAlerta('error', 'el usuario no existe o tu cuenta no esta confirmada');
        //             $alertas = Usuario::getAlertas();
        //         }
        //     }
        // }
        // $alertas = Usuario::getAlertas();
        $router->render('auth/olvide-password', ['alertas' => $alertas]);
    }

    public static function recuperar(Router $router)
    {
        $alertas = [];
        $error = false;
        $token = s($_GET['token']);
        //buscar usuario por token
        // $usuario = Usuario::where('token', $token);

        // if (empty($usuario)) {
        //     Usuario::setAlerta('error', 'Token no válido');
        //     $error = true;
        // }

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     //lleer el nuevo password y guadralo
        //     $password = new Usuario($_POST);
        //     $alertas = $password->validarPassword();

        //     if (empty($alertas)) {
        //         $usuario->password = null;
        //         $usuario->password = $password->password;
        //         $usuario->hashPassword();
        //         $usuario->token = null;
        //         $resultado = $usuario->guardar();

        //         if ($resultado) {
        //             header('Location: /');
        //         }
        //     }
        // }

        // $alertas = Usuario::getAlertas();
        $router->render('auth/recuperar-password', [
            'alertas' => $alertas, 'error' => $error
        ]);
    }

    public static function crear(Router $router)
    {
        $usuario = new Usuario;

        //alertas
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            //verificar errores
            if (empty($alertas)) {
                //verificar que el usuario no este registrado
                $resultado = $usuario->existeUsuario();
                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    //hashsear pass
                    $usuario->hashPassword();

                    //generar token unico
                    $usuario->crearToken();
                    $email = new Email($usuario->correo, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();
                    //crear usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        $router->render('auth/crear-cuenta', ['usuario' => $usuario, 'alertas' => $alertas]);
    }


    public static function mensaje(Router $router)
    {
        $router->render('auth/mensaje');
    }

    public static function confirmar(Router $router)
    {
        $alertas = [];
        $token = s($_GET['token']);
        $usuario = Usuario::where('token', $token);
        if (empty($usuario)) {
            //mostrar mensajes de eerror
            Usuario::setAlerta('error', 'Token no válido');
        } else {
            //modificar a usuario confirmao
            $usuario->confirmado = "1";
            $usuario->token = null;
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Cuenta Comprobada Correctamente');
        }
        //rendirozar la vitas
        $alertas = Usuario::getAlertas();
        $router->render('auth/confirmar-cuenta', ['alertas' => $alertas]);
    }
}
