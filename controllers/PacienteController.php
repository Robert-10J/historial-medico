<?php

namespace Controllers;

use Model\Historial;
use Model\Paciente;
use MVC\Router;

class PacienteController {

    public static function index( Router $router ) {

        if( !$_SESSION['nombre'] ) { session_start(); }

        $paciente = new Paciente;
    
        $alertas = [];
        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $paciente->sincronizar($_POST);
            $alertas = $paciente->validarNuevoPaciente();

            if( empty($alertas) ) {
                $resultado = $paciente->existePaciente();

                if( $resultado->num_rows ) {
                    $alertas = Paciente::getAlertas();
                } else {
                    $paciente->guardar();
                }
            }
        }

        $router->render('/pacientes/index', [
            'nombre' => $_SESSION['nombre'],
            'paciente' => $paciente,
            'alertas' => $alertas
        ]);
    }

/*     public static function registrarPaciente( Router $router) {


        $router->render('/pacientes/index', [
        ]);
    } */
}