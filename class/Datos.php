<?php

class Datos {
    //put your code here
    private $hostname = "localhost";
    private $user="root"; // Esto no se debe hacer (Se debe crear un usuario
    private $password="";
    private $bd = "flas011"; // Nombre de la B.D. creada
    
    //Metodos de lectura para poder leer los datos, manual o dinamico
    // Manual
    
   /* public function getHostname(){
        return $this->hostname;
    }
    */
    
   function getHostname() {
       return $this->hostname;
   }

   function getUser() {
       return $this->user;
   }

   function getPassword() {
       return $this->password;
   }

   function getBd() {
       return $this->bd;
   }
}
