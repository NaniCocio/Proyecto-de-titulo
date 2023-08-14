<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre','apellidos','email','password', 'admin', 'confirmado','token'];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args =[]){
        $this -> id = $args ['id'] ?? null;
        $this -> nombre = $args ['nombre'] ?? '';
        $this -> apellidos = $args ['apellidos'] ?? '';
        $this -> email = $args ['email'] ?? '';
        $this -> password= $args ['password'] ?? '';
        $this -> admin = $args ['admin'] ?? '0';
        $this -> confirmado = $args ['confirmado'] ?? '0';
        $this -> token = $args ['token'] ?? '';
    }

    //Mensajes de validación para crear cuenta

    public function validarCuentaNueva(){
        if(!$this->nombre){
            self::$alertas['error'][]= 'El Nombre de Usuario es Obligatorio'; 
        }
        if(!$this->apellidos){
            self::$alertas['error'][]= 'Los Apellidos del Usuario son Obligatorios'; 
        }

        if(!$this->email){
            self::$alertas['error'][]= 'Tu correo institucional es obligatorio'; 
        }

        if(!$this->password){
            self::$alertas['error'][]= 'Tu contraseña es obligatoria'; 
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][]='Tu contraseña debe contener al menos 6 caracteres';
        }
        

        return self::$alertas;
    }

    public function validarLogin(){
        if(!$this->email){
            self::$alertas['error'][]='El email es obligatorio';
        }

        if(!$this->password){
            self::$alertas['error'][]='Tu constraseña es obligatoria';
        }

        return self::$alertas;
    }

    public function validarEmail(){
        if(!$this->email){
            self::$alertas['error'][]='El email es obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword(){
        if(!$this->password){
            self::$alertas['error'][]='Tu constraseña es obligatoria';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][]='Tu contraseña debe contener al menos 6 caracteres';
        }
    }

    //Revisa si el usuario existe
    public function existeUsuario (){
        $query =" SELECT * FROM " . self::$tabla . " WHERE email = '" . $this-> email ."' LIMIT 1" ; 

        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            self::$alertas['error'][]= 'El Usuario ya esta registrado';
        }
        return $resultado;
    }

    public function hashPassword (){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken (){
        $this->token= uniqid();
    }

    public function comprobarPasswordVerificado ($password){
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado){
            self::$alertas ['error'][] = 'Contraseña Incorrecta o Tu cuenta no ha sido Confirmada';
        }else{
            return true;
        }
    }

}

