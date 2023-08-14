<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\RegistroController;
use Controllers\SeguimientoController;
use MVC\Router;

$router = new Router();

// Iniciar sesión
$router -> get('/', [LoginController::class, 'login']);
$router -> post('/', [LoginController::class, 'login']);
$router -> get('/logout', [LoginController::class, 'logout']);


//Recuperar Password
$router -> get('/olvide', [LoginController::class, 'olvide']);
$router -> post('/olvide', [LoginController::class, 'olvide']);
$router -> get('/recuperar', [LoginController::class, 'recuperar']);
$router -> post('/recuperar', [LoginController::class, 'recuperar']);

//Crear Cuenta
$router -> get('/crear-cuenta', [LoginController::class, 'crear']);
$router -> post('/crear-cuenta', [LoginController::class, 'crear']); 

//Confirmar Cuenta
$router -> get('/confirmar-cuenta', [LoginController::class, 'confirmar']);
$router -> get('/mensaje', [LoginController::class, 'mensaje']);


// AREA PRIVADA
//Area Usuario
$router -> get('/registro', [RegistroController::class, 'index']);

//Ingreso usuario
$router -> get('/ingreso', [RegistroController::class, 'ingreso']);
$router -> post('/ingreso', [RegistroController::class, 'ingreso']);

//Seguimiento Usuario
$router -> get('/seguimiento', [SeguimientoController::class, 'nuevo']);
$router -> post('/seguimiento', [SeguimientoController::class, 'nuevo']);

//Registros previos Usuario
$router -> get('/registros', [RegistroController::class, 'registros']);

$router -> get('/ver', [RegistroController::class, 'ver']);
$router -> post('/ver', [RegistroController::class,'ver']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();