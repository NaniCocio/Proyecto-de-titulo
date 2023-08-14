<?php

namespace Controllers;

use Model\Ingreso;
use Model\Registros;
use Model\Seguimiento;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use \AllowDynamicProperties;
use Symfony\Component\ErrorHandler\Debug;

use function Psy\debug;



#[AllowDynamicProperties]
class RegistroController{
    public static function index (Router $router){

        $router->render ('registro/index', [
            'nombre' => $_SESSION ['nombre']
        ]);
    }

    public static function ingreso(Router $router){
        $ingreso = new Ingreso;

        //Alertas vacias
        $alertas=[];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ingreso->sincronizar($_POST);
            $alertas = $ingreso->ingresoPaciente();

            //Revisar que alerta este vacío
            if(empty($alertas)){
                //Verifica que el usuario no este registrado
                $resultado = $ingreso->pacienteExiste();

                if($resultado->num_rows){
                    $alertas = Ingreso::getAlertas();
                
                }else{
                    //Crear el usuario 
                $resultado = $ingreso->guardar();
                if($resultado){
                    //Alerta de exito
                    Ingreso::setAlerta('exito', 'El Usuario ha sido registrado con éxito');
                }
            }}
        }
        $alertas = Ingreso::getAlertas();
        $router->render ('registro/ingreso',[
        'ingreso' => $ingreso,
        'alertas' => $alertas,
        'nombre' => $_SESSION ['nombre']
        ]);
        
    }

    public static function registros(Router $router){
        error_reporting (E_ALL ^ E_NOTICE);
        $rut = $_GET['rut'];

        //Consultar la base de datos
        $consulta = "SELECT seguimiento.id, seguimiento.rut, CONCAT(seguimiento.nombres,' ',seguimiento.apellidos) as Usuario, ";
        $consulta .= " seguimiento.fecha, vacab.vacab as VACAB, seguimiento.evolucion , seguimiento.imagen ";
        $consulta .= " FROM ingreso ";
        $consulta .= " LEFT OUTER JOIN seguimiento ";
        $consulta .= " on ingreso.rut=seguimiento.rut ";
        $consulta .= " LEFT OUTER JOIN vacab ";
        $consulta .= " on seguimiento.vacabId = vacab.id ";
        $consulta .= " WHERE seguimiento.rut = '$rut' "; 

        $evoluciones = Registros::SQL($consulta);
       
        $router->render ('registro/registros',[
            'nombre' => $_SESSION ['nombre'],
            'evoluciones' => $evoluciones,
            'rut' => $rut,
        ]);
    }

    



    public static function crear (Router $router){
        $alertas=[];
        $seguimiento = new Seguimiento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $seguimiento->sincronizar($_POST);

            //Validar
            $alertas = $seguimiento->guardarNuevo();

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
            'nombre' => $_SESSION ['nombre'],
            'titulo' => 'Guardar Evolución',
            'alertas' => $alertas,
            'seguimiento' => $seguimiento,
            
        ]);         
        }
    }

    //Arreglar para ver formulario con datos listos 
    
    public static function ver(Router $router) {
        $alertas = [];
        //Validar ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id){
            header('Location: /registros');
        }
    
        //Obtener registro
        $registros = Seguimiento::find($id);
        
        $registros->imagen_actual = $registros->imagen;
    
    
        $router -> render ('registro/ver',[
            'nombre' => $_SESSION ['nombre'], 
            'alertas' => $alertas,
            'registros' => $registros
            ]);
    }
    
}
    

   