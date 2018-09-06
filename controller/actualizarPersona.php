<?php

require "../class/Datos.php";
require "../class/Conectar.php";

header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$json = json_decode($json);

$bd = new Conectar();
$sql = "update personas set nombre=?,apellido=?,ced=?,telefono=?,email=?,tipo=?,fecnac=? where id =?;";

$conn = $bd->getMysqli();
$smtp = $conn->prepare($sql);
$smtp->bind_param("sssssssi", $json->nombre, $json->apellido, $json->ced, $json->telefono, $json->email, $json->tipo, $json->fecNac,$json->id);

$res[] = Array();
if ($smtp->execute()) {
    $res["success"] = "ok";
} else {
    $res["success"] = "no";
}

$smtp->close();
$conn->close();
echo json_encode($res);

