<?php

namespace Controllers;

use Model\Paciente;

class APIController {
    public static function index() {
        $pacientes = Paciente::all();
        echo json_encode( $pacientes );
    }
}