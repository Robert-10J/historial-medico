<?php

namespace Model;

class Doctor extends ActiveRecord {
    // DB
    protected static $tabla = 'doctores';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'email', 'password', 'token', 'confirmado'];

    public $id;
    public $nombre;
    public $apellidos;
    public $email;
    public $password;
    public $token;
    public $confirmado;

    public function __construct( $args = [] ) {   
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '0';
    }

    // Mensajes de validación para la creacion de una cuenta
    public function validarNuevaCuenta() {

        if( !$this->nombre ) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if( !$this->apellidos ) {
            self::$alertas['error'][] = 'Los apellidos son obligatorios';
        }
      
        if( !$this->email ) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
      
        if( !$this->password ) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        if( strlen($this->password) < 6 ) {
            self::$alertas['error'][] = 'La contraseña debe ser mayor a 6 caracteres';
        }

        return self::$alertas;
    }

    public function validarLogin() {
        if( !$this->email ) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if( !$this->password ) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        return self::$alertas;
    }

    //Revisa si el usuario ya existe
    public function existeDoctor() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query( $query );
        if( $resultado->num_rows ) {
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado( $password ) {
        $resultado = password_verify( $password, $this->password );

        if( !$resultado || !$this->confirmado ) {
            self::$alertas['error'][] = 'Contraseña incorrecta o tu cuenta no ha sido verificada';
        } else {
            return true;
        }
    }
}