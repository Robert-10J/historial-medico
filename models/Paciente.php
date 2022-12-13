<?php

namespace Model;

use mysqli;

class Paciente extends ActiveRecord {
    protected static $tabla = 'pacientes';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'sexo','fechaNacimiento', 'antecedentePersonal', 'enfermedadActual', 'antecedenteEnfermedad', 'antecedenteFamiliar'];

    public $id;
    public $nombre;
    public $apellidos;
    public $sexo;
    public $fechaNacimiento;
    public $antecedentePersonal;
    public $enfermedadActual;
    public $antecedenteEnfermedad;
    public $antecedenteFamiliar;
    public $ultimaCita;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->sexo = $args['sexo'] ?? '';
        $this->fechaNacimiento = $args['fechaNacimiento'] ?? '09-04-2001';
        $this->antecedentePersonal = $args['antecedentePersonal'] ?? '';
        $this->enfermedadActual = $args['enfermedadActual'] ?? '';
        $this->antecedenteEnfermedad = $args['antecedenteEnfermedad'] ?? '';
        $this->antecedenteFamiliar = $args['antecedenteFamiliar'] ?? '';
        $this->ultimaCita = $args['ultimaCita'] ?? '';
    }

    public function validarNuevoPaciente() {
        if( !$this->nombre ) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if( !$this->apellidos ) {
            self::$alertas['error'][] = 'Los apellidos son obligatorios';
        }
        if( !$this->sexo ) {
            self::$alertas['error'][] = 'El genero es obligatorio';
        }
        if( !$this->fechaNacimiento ) {
            self::$alertas['error'][] = 'La fecha de nacimiento es obligatoria';
        }
        if (!$this->antecedentePersonal) {
            self::$alertas['error'][] = 'No ingreso los antecedentes personales';
        }
        if (!$this->enfermedadActual) {
            self::$alertas['error'][] = 'No ingreso la enfermedad actual';
        }
        if (!$this->antecedenteEnfermedad) {
            self::$alertas['error'][] = 'No ingreso el antecedente de la enfermedad';
        }
        if (!$this->antecedenteFamiliar) {
            self::$alertas['error'][] = 'No ingreso los antecedente familiar';
        }

        return self::$alertas;
    }

    public function existePaciente() {
        $query = "SELECT * FROM ". self::$tabla . " WHERE nombre = '" . $this->nombre . "' AND apellidos = '" . $this->apellidos . "' LIMIT 1";
        $resultado = self::$db->query( $query );
        if( $resultado->num_rows ) {
            self::$alertas['error'][] = 'El paciente ya esta registrado';
        }
        return $resultado;
    }

    public function getInfoPaciente( $id ) {
        $query = "SELECT * FROM ". self::$tabla. " WHERE id = '". $id ."'";
        $resultado = self::$db->query( $query );
        $data = mysqli_fetch_array( $resultado );
        return $data;
    }

    public function updateCita( $id ) {
        $query = "UPDATE ". self::$tabla ." SET ultimaCita = '". $this->ultimaCita ."' ,";
        $query .= "antecedentePersonal = '". $this->antecedentePersonal ."', ";
        $query .= "enfermedadActual = '". $this->enfermedadActual ."', ";
        $query .= "antecedenteEnfermedad = '". $this->antecedenteEnfermedad ."', ";
        $query .= "antecedenteFamiliar = '". $this->antecedenteFamiliar ."'";
        $query .= " WHERE id = '". $id ."'";
        $resultado = self::$db->query( $query );
        return $resultado;
    }
}