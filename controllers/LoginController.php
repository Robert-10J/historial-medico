<?php

namespace Controllers;

use Clases\Email;
use Model\Doctor;
use MVC\Router;

class LoginController {

    public static function login( Router $router) {
        $alertas = [];
        
        if( $_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Doctor($_POST);
            $alertas = $auth->validarLogin();

            if( empty($alertas) ) {
                $doctor = Doctor::where('email', $auth->email);

                if( $doctor ) {
                    if( $doctor->comprobarPasswordAndVerificado( $auth->password ) ) {
                        // Autenticar el usuario
                        session_start();
                        $_SESSION['id'] = $doctor->id;
                        $_SESSION['nombre'] = $doctor->nombre . " " . $doctor->apellidos;
                        $_SESSION['email'] = $doctor->email;
                        $_SESSION['login'] = true;

                        // Redireccionamiento
                        header('Location: /admin');
                    }
                } else {
                    Doctor::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Doctor::getAlertas();
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
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
        $doctor = new Doctor;
        
        // Alertas vacias
        $alertas = [];
        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
           
            $doctor->sincronizar($_POST);
            $alertas = $doctor->validarNuevaCuenta();

            // Revisar que el arreglo de alertas este vacío
            if( empty($alertas) ) {
                // Verificar que el usuario no este registrado
                $resultado = $doctor->existeDoctor();
                
                if( $resultado->num_rows ) {
                    $alertas = Doctor::getAlertas();
                } else {
                    //hashear password
                    $doctor->hashPassword();
                    // Generar token
                    $doctor->crearToken();
                    //Enviar Email
                    $email = new Email( 
                        $doctor->nombre, 
                        $doctor->email, 
                        $doctor->token
                    );
                    
                    $email->enviarConfirmacion();

                    // Crear el usuario
                    $resultado = $doctor->guardar();
                    if( $resultado) {
                        header('Location: /mensaje');
                    }
                    
                    //debuguear($doctor);
                }
            }
        }

        $router->render('auth/crear-cuenta', [
            'doctor' => $doctor,
            'alertas' => $alertas
        ]);
    }

    public static function mensaje( Router $router ) {
        $router->render('auth/mensaje');
    }

    public static function confirmarCuenta( Router $router) {
        $alertas = [];
        $token = s($_GET['token']);
        $doctor = Doctor::where('token', $token);

        if( empty($doctor) ) {
            Doctor::setAlerta('error', 'Token no válido');
        } else {
            $doctor->confirmado = "1";
            $doctor->token = null;
            $doctor->guardar();
            Doctor::setAlerta('exito', 'Cuenta comprobada correctamente');
        }

        $alertas = Doctor::getAlertas();
        $router->render('auth/confirmar-cuenta', [
            'alertas' => $alertas
        ]);
    }
}