<?php

namespace Controllers;

use Model\Seguimiento;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class SeguimientoController {
   
    public static function nuevo (Router $router){
        $alertas=[];
        $seguimiento = new Seguimiento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])){
                $imagen = $_FILES['imagen'];
                $carpeta_imagenes = '../public/img/heridas/';

                //Crear la carpeta si no existe
                if (!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                //Subir la imagen
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])-> fit(800,800) ->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])-> fit(800,800) ->encode('webp', 80);

                //Generar nombre imagen
                $nombre_imagen = md5( uniqid (rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;

                move_uploaded_file($imagen['tmp_name'], $carpeta_imagenes . $nombre_imagen . ".jpg");

            }

            $seguimiento->sincronizar($_POST);

            //Validar
            $alertas = $seguimiento-> existePaciente();
            $alertas = $seguimiento-> guardarNuevo();



            //Guardar el registro
            if(empty($alertas)){
                if(isset($nombre_imagen)){
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                   
                }
                //Guardar en la BD
                $resultado = $seguimiento->guardar();

                if ($resultado){
                    Seguimiento::setAlerta('exito', 'El Registro se ha guardado correctamente');

                }
            }

            $alertas = Seguimiento::getAlertas();
        
            $router -> render ('registro/evolucion',[
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Guardar Evolución',
            'alertas' => $alertas,
            'seguimiento' => $seguimiento
            
            ]);         
        }
    }
    

}

