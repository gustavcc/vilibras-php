<?php

require_once("../../config/conecta.php");
require_once("../../actions/usuario/identifyUsuarioLogado.php");


$json = file_get_contents("php://input");
$darkmode_str = json_decode($json, true);

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

desconecta();

if ($darkmode_str == 'true') {
    conecta();

    $sql = "INSERT INTO darkmode (satatus_darkmode) VALUES ('false')";
    $mysqli->execute_query($sql);

    desconecta();

} else {
    conecta();

    $sql = "INSERT INTO darkmode (satatus_darkmode) VALUES ('true')";
    $mysqli->execute_query($sql);

    desconecta();
}

conecta();

$sql_select = "SELECT * FROM darkmode;";

$result = $mysqli->query($sql_select);

if($result->num_rows > 0){
    $darkmode_teste = $result->fetch_all(MYSQLI_ASSOC);
    $darkmode = end($darkmode_teste)['satatus_darkmode'];
} else {
    $darkmode = [];
}

echo $darkmode;

desconecta();