<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require "../class/Datos.php";
require "../class/conectar.php";
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$json = json_decode($json);
$bd = new conectar();
$conn = $bd->getMysqli();
$sql = "";
if ($json->item == 1) {
    $sql = "select * from personas;";
    $smtp = $conn->prepare($sql);
} else {
    $sql = "select * from personas where " . $json->item . " like ?;";
    $smtp = $conn->prepare($sql);
    $json->criterio = "%" . $json->criterio . "%";
    $smtp->bind_param("s", $json->criterio);
}
$smtp->execute();
$data = $smtp->get_result();
$res = array();
$res["success"] = "no";
$res["row"] = $data->num_rows;
while ($fila = $data->fetch_assoc()) {
    $res["result"][] = $fila;
    $res["success"] = "ok";
}
$smtp->close();
$conn->close();
echo json_encode($res);

