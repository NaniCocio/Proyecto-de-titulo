<?php

namespace Model;
use \AllowDynamicProperties; // Para ignorar Dynamic Properties Deprecation
#[AllowDynamicProperties]


class Seguimiento extends ActiveRecord {

    // Base de datos
    protected static $tabla = 'seguimiento';
    protected static $columnasDB = ['id', 'rut','fecha', 'nombres','apellidos','vacabId', 'evolucion', 'imagen'];

    public $id;
    public $rut;
    public $fecha;
    public $nombres;
    public $apellidos;
    public $vacabId;
    public $evolucion;
    public $imagen;

    public function __construct($args =[]){
        $this -> id = $args ['id'] ?? null;
        $this -> rut = $args ['rut'] ?? '';
        $this -> fecha = $args ['fecha'] ?? '';
        $this -> nombres = $args ['nombres'] ?? '';
        $this -> apellidos = $args ['apellidos'] ?? '';
        $this -> vacabId= $args ['vacabId'] ?? '';
        $this -> evolucion = $args ['evolucion'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
    }
    public function existePaciente (){
        $query =" SELECT * FROM " . self::$tabla . " WHERE rut = '" . $this-> rut ."' LIMIT 1" ; 
    
        $resultado = self::$db->query($query);
    
        if($resultado->num_rows){
            self::$alertas['exito'][]= 'El Usuario se encuentra registrado, puede continuar con su registro';
        }else{
            self::$alertas['error'][]= 'El Paciente ya se encuentra registrado en el sistema';
        }
        return $resultado;
    }
    public function guardarNuevo(){

        if(!$this->rut){
            self::$alertas['error'][]= 'El Rut del Paciente es Obligatorio'; 
        }

        if(!$this->fecha){
            self::$alertas['error'][]= 'Favor colocar fecha de curación'; 
        }

        if(!$this->nombres){
            self::$alertas['error'][]= 'Los Nombres del Usuario son Obligatorios'; 
        }

        if(!$this->apellidos){
            self::$alertas['error'][]= 'Los Apellidos del Usuario son Obligatorios'; 
        }

        if(!$this->vacabId){
            self::$alertas['error'][]= 'El Vacab es obligatorio, para poder categorizar la herida'; 
        }

        if(!$this->evolucion){
            self::$alertas['error'][]= 'Debe ingresar una evolución de la herida'; 
        }
        if(!$this->imagen['name']){
            self::$alertas['error'][]='Debe subirse al menos una imagen correspondiente a la curación';
        }

        return self::$alertas;
    
    }
    
}


