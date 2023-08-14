<?php

namespace Model;

class vacab extends ActiveRecord {

    // Base de datos
    protected static $tabla = 'vacab';
    protected static $columnasDB = ['id', 'vacab'];

    public $id;
    public $vacab;
   
   

    public function __construct($args =[]){
        $this -> id = $args ['id'] ?? null;
        $this -> vacab = $args ['vacab'] ?? '';
    }
}