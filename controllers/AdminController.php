<?php

namespace Controllers;

use Model\Cancha;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categoria;
use Model\Distrito;
use Model\Horario;
use Model\Imagen;
use Model\Usuario_x_cancha;
use MVC\Router;

class AdminController
{
    public static function index(Router $router)
    {
      
        $router->render('admin/index', ['titulo' => 'Mi Cancha']);
    }


    public static function cancha(Router $router)
    {   session_start();
        isAuth();
        $distritos = Distrito::all();
        $categorias = Categoria::all();
        $canchasUsuario = Usuario_x_cancha::where('usuario_id', $_SESSION['id']);
        $cancha = Cancha::find($canchasUsuario->cancha_id);
        $cancha->asignarAtributos();
        $router->render('admin/cancha', [
            'titulo' => 'Mi Cancha', 
            'distritos' => $distritos,
            'categorias' => $categorias,
            'cancha' => $cancha]);
    }

    public static function cuenta(Router $router)
    {
        $router->render('admin/cuenta', ['titulo' => 'Estado de Cuenta']);
    }

    public static function perfil(Router $router)
    {
        $router->render('admin/perfil', ['titulo' => 'Mi Perfil']);
    }

    public static function reservaciones(Router $router)
    {
        $router->render('admin/reservaciones', ['titulo' => 'Reservaciones']);
    }


    public static function setCancha(){
       $imagen = new Imagen();
       $horario = new Horario($_POST['horario']);
       $respuesta =  $horario->guardar();
       $cancha = new Cancha($_POST);
       $cancha->horario_id = $respuesta['id'];
       $respuestaCancha = $cancha->guardar();
       $idCancha = $respuestaCancha['id'];

       //relacion usuario cancha
       session_start();
       $usu_cancha = new Usuario_x_cancha();
       $usu_cancha->usuario_id = $_SESSION['id'];
       $usu_cancha->cancha_id = $idCancha;
       $usu_cancha->guardar();
       // GUARDAR IMAGEN DE CANCHA
       $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

       /**Setear imagen */
       if ($_FILES['imagen']['tmp_name']) {
           $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
           $imagen->setImagen($nombreImagen);
          $imagen->cancha_id = $idCancha;
           $imagen->guardar();
       }

       /**Subida de Imagenes */
       //crear carpeta
       if (!is_dir(CARPETA_IMAGENES)) {
           mkdir(CARPETA_IMAGENES);
       }
       //guarda la imagen en el servidor
       $image->save(CARPETA_IMAGENES . $nombreImagen);

       echo json_encode($respuestaCancha);
    }
}
