<?php

namespace Model;

use function Psy\debug;

class Vista extends ActiveRecord {
    protected static $tabla = 'seguimiento';
    protected static $columnasDB = ['id','rut','fecha', 'Usuario' , 'VACAB', 'evolucion', 'imagen'];

    public $id;
    public $rut;
    public $fecha;
    public $Usuario;
    public $VACAB;
    public $evolucion;
    public $imagen;

    public function __construct()
    {
        $this->id = $args ['id'] ?? null;
        $this->rut = $args ['rut'] ?? '';
        $this->fecha = $args ['fecha'] ?? '';
        $this->Usuario = $args ['Usuario'] ?? '';
        $this->VACAB = $args ['VACAB'] ?? '';
        $this->evolucion = $args ['evolucion'] ?? '';
        $this->imagen = $args ['imagen'] ?? '';
    }

}



?>