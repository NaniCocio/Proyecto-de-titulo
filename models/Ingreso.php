<?php

namespace Model;

class Ingreso extends ActiveRecord {
    //Base de datos

    protected static $tabla = 'ingreso';
    protected static $columnasDB = ['id', 'rut','admision','nombres','apellidos','nacimiento', 'braden', 'diagrama'];

    public $id;
    public $rut;
    public $admision;
    public $nombres;
    public $apellidos;
    public $nacimiento;
    public $braden;
    public $diagrama;
    

    public function __construct($args =[]){
        $this -> id = $args ['id'] ?? null;
        $this -> rut = $args ['rut'] ?? '';
        $this -> admision = $args ['admision'] ?? '';
        $this -> nombres = $args ['nombres'] ?? '';
        $this -> apellidos = $args ['apellidos'] ?? '';
        $this -> nacimiento= $args ['nacimiento'] ?? '';
        $this -> braden = $args ['braden'] ?? '';
        $this -> diagrama = $args ['diagrama'] ?? '';
    }

    public function ingresoPaciente(){
        if(!$this->rut){
            self::$alertas['error'][]= 'El Rut del Paciente es Obligatorio'; 
        }

        if(!$this->admision){
            self::$alertas['error'][]= 'Favor agregar admisión del usuario'; 
        }

        if(!$this->nombres){
            self::$alertas['error'][]= 'Los Nombres del Usuario son Obligatorios'; 
        }

        if(!$this->apellidos){
            self::$alertas['error'][]= 'Los Apellidos del Usuario son Obligatorios'; 
        }

        if(!$this->nacimiento){
            self::$alertas['error'][]= 'La fecha de nacimiento del usuario es necesaria'; 
        }

        if(!$this->braden){
            self::$alertas['error'][]= 'El puntaje de la Escala de Braden es necesaria para el registro'; 
        }
        if(!$this->diagrama){
            self::$alertas['error'][]='El puntaje del Diagrama de Valoración de Heridas es necesario';
        }

        return self::$alertas;
    }


    public function pacienteExiste (){
        $query =" SELECT * FROM " . self::$tabla . " WHERE rut = '" . $this-> rut ."' LIMIT 1" ; 

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][]= 'El Paciente ya se encuentra registrado en el sistema';
        }
        return $resultado;
    }
}

    
