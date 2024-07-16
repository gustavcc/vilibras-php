<?php

require_once("../../config/conecta.php");
require_once("../../actions/usuario/identifyUsuarioLogado.php");


$json = file_get_contents("php://input");
$darkmode_str = json_decode($json, true);

if (isset($darkmode_str)){
    if ($darkmode_str['sts'] == 'true' || $darkmode_str['sts'] == 'false') {

        conecta();
    
        $sts = $darkmode_str['sts'];
        $email = $darkmode_str['email'];
    
        $sql_select = "SELECT * FROM darkmode WHERE email_usuario = ?;";
        $stmt = $mysqli->prepare($sql_select);
        $stmt->bind_param('s', $usuarioLogado['email']);
        $stmt->execute();
        $result = $stmt->get_result();
    
        desconecta();
    
        if($result->num_rows > 0){
            $darkmode_del = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $darkmode_del = [];
        }
    
        if (count($darkmode_del)>0) {
            conecta();
            $sql_del = "DELETE FROM darkmode WHERE email_usuario = ?";
            $stmt = $mysqli->prepare($sql_del);
            $stmt->bind_param('s', $usuarioLogado['email']);
            $stmt->execute();
    
            desconecta();
        }
    
        conecta();
    
        $sql_insert = "INSERT INTO darkmode (status_darkmode, email_usuario) VALUES ('$sts','$email');";
    
        $mysqli->execute_query($sql_insert);
    
        desconecta();
    }
} 

conecta();

$sql_select = "SELECT * FROM darkmode WHERE email_usuario = ?;";
$stmt = $mysqli->prepare($sql_select);
$stmt->bind_param('s', $usuarioLogado['email']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $darkmode_teste = $result->fetch_all(MYSQLI_ASSOC);
    $darkmode = end($darkmode_teste)['status_darkmode'];
} else {
    $darkmode = 'true';
}

desconecta();