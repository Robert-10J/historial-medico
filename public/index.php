<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\LoginController;
use Controllers\PacienteController;
use MVC\Router;

$router = new Router();

//Iniciar Sesión
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

//Recuperar Password
$router->get('/olvide', [LoginController::class, 'olvide']);
$router->post('/olvide', [LoginController::class, 'olvide']);
$router->get('/recuperar', [LoginController::class, 'recuperar']);
$router->post('/recuperar', [LoginController::class, 'recuperar']);

//Crear Cuenta
$router->get('/crear-cuenta', [LoginController::class, 'crearCuenta']);
$router->post('/crear-cuenta', [LoginController::class, 'crearCuenta']);
//Confirmar Cuenta
$router->get('/confirmar-cuenta', [LoginController::class, 'confirmarCuenta']);
$router->get('/mensaje', [LoginController::class, 'mensaje']);

//Area privada
$router->get('/pacientes', [PacienteController::class, 'index']);
$router->post('/pacientes', [PacienteController::class, 'index']);
//$router->get('/ver-paciente', [PacienteController::class, 'infoPaciente']);
$router->get('/ver-paciente', [PacienteController::class, 'infoPaciente']);
$router->post('/ver-paciente', [PacienteController::class, 'infoPaciente']);

// API Pacientes
$router->get('/api/pacientes', [APIController::class, 'index']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();