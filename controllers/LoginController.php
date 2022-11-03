<?php

namespace Controllers;

use MVC\Router;

class LoginController {

    public static function login( Router $router) {
        $router->render('auth/login');
    }

    public static function logout() {
        echo "cerrando sesion";
    }

    public static function olvide( Router $router) {
        $router->render('auth/olvide-password', [
            
        ]);
    }

    public static function recuperar() {
        echo "recuperar";
    }

    public static function crearCuenta( Router $router) {
        $router->render('auth/crear-cuenta', [

        ]);
    }
}