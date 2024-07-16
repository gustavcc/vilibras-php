<?php

require_once("../../config/conecta.php");
require_once("../../actions/usuario/identifyUsuarioLogado.php");


$json = file_get_contents("php://input");
$darkmode_str = json_decode($json, true);

if ($darkmode_str === 'true') {
    conecta();

    $sql_select = "SELECT * FROM darkmode;";

    $result = $mysqli->query($sql_select);

    if($result->num_rows > 0){
        $darkmode_del = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $darkmode_del = [];
    }

    if (isset($darkmode_del)) {
        $sql_del = "DELETE FROM darkmode";
        $mysqli->execute_query($sql_del);
    }

    $sql = "INSERT INTO darkmode (status_darkmode) VALUES ('true')";
    $mysqli->execute_query($sql);

    desconecta();

} 
if ($darkmode_str === 'false') {
    conecta();

    $sql_select = "SELECT * FROM darkmode;";

    $result = $mysqli->query($sql_select);

    if($result->num_rows > 0){
        $darkmode_del = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $darkmode_del = [];
    }

    if (isset($darkmode_del)) {
        $sql_del = "DELETE FROM darkmode";
        $mysqli->execute_query($sql_del);
    }

    $sql = "INSERT INTO darkmode (status_darkmode) VALUES ('false')";
    $mysqli->execute_query($sql);

    desconecta();
}

conecta();

$sql_select = "SELECT * FROM darkmode;";

$result = $mysqli->query($sql_select);

if($result->num_rows > 0){
    $darkmode_teste = $result->fetch_all(MYSQLI_ASSOC);
    $darkmode = end($darkmode_teste)['status_darkmode'];
} else {
    $darkmode = 'true';
}

desconecta();