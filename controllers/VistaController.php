<?php

namespace Controllers;

use Model\Vista;
use MVC\Router;

class VistaController {
    public static function ver (Router $router){
        $rut = $_GET['rut'];
        $rut = filter_var($rut, FILTER_VALIDATE_INT);

        $registros = Vista::find($rut);
        
        //Consultar la base de datos
        $consulta = "SELECT seguimiento.id, seguimiento.rut,seguimiento.fecha,";
        $consulta = " CONCAT (seguimiento.nombres,' ',seguimiento.apellidos) as Usuario, vacab.vacab as VACAB, seguimiento.evolucion , seguimiento.imagen";
        $consulta = "FROM seguimiento";
        $consulta = "LEFT OUTER JOIN vacab";
        $consulta = "on seguimiento.vacabId = vacab.id";
           
        $evol = Vista::SQL($consulta);
    
        $router->render ('registro/ver',[
            'nombre' => $_SESSION ['nombre'],
            'registros' => $registros,
            'evol' => $evol,
            'rut' => $rut,
        ]);
    }
}