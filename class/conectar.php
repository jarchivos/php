<?php

class conectar {
    // vamos a crear driver de conexión
    // variable de puente de conexión
    private $mysqli;

    function __construct() {
        $this->conectar();
    }

    // Metodo constructor
    private function conectar() {
        $valores = new Datos();
        $this->mysqli = new mysqli($valores->getHostname(), $valores->getUser(), $valores->getPassword(), $valores->getBd());
        if ($this->mysqli->connect_errno) {
            return "Fallo la conexión a MySql: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
            //exit
        } else {
            $this->mysqli->query("SET NAMES 'utf8'");
            return "OK";
        }
    }
    // Metodo conectar
    public function getMysqli() {
        return $this->mysqli;
    }

}
