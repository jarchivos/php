<?php

require "../class/Datos.php";
require "../class/Conectar.php";

header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$json = json_decode($json);

// Parte Lógica de Insert a la B.D.
// bd nombre de instancia que creo
$bd = new conectar();
$sql = "insert into personas (nombre,apellido,ced,telefono,email,tipo,fecnac)"
        . "values (?,?,?,?,?,?,?);";

$conn = $bd->getMysqli();
$smtp = $conn->prepare($sql);
$smtp->bind_param("sssssss", $json->nombre, $json->apellido, $json->ced, $json->telefono, $json->email, $json->tipo, $json->fecnac);

$res[] = Array();
if ($smtp->execute()) {
    $res["success"] = "ok";
} else {
    $res["success"] = "no";
}
$res["json"] = $json;
$smtp->close();
$conn->close();
echo json_encode($res);

/* 
 * registro.php
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

