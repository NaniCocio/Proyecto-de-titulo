<?php

namespace Model;

use function Psy\debug;

class Registros extends ActiveRecord {
    protected static $tabla = 'seguimiento';
    protected static $columnasDB = ['id', 'rut', 'Usuario', 'fecha', 'VACAB', 'evolucion', 'imagen'];

    public $id;
    public $rut;
    public $Usuario;
    public $fecha;
    public $VACAB;
    public $evolucion;
    public $imagen;

    public function __construct()
    {
        $this->id = $args ['id'] ?? null;
        $this->rut = $args ['rut'] ?? '';
        $this->Usuario = $args ['Usuario'] ?? '';
        $this->fecha = $args ['fecha'] ?? '';
        $this->VACAB = $args ['VACAB'] ?? '';
        $this->evolucion = $args ['evolucion'] ?? '';
        $this->imagen = $args ['imagen'] ?? '';
    }



}



?>