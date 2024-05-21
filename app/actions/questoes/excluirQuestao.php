<?php

require_once("../../config/conecta.php");

$msg = '';

if (!is_numeric($_GET['id'])){
    die("Não foi possível excluir");
}

conecta();

$id = $_GET["id"];

$sql = "DELETE FROM questoes WHERE id_questao=?";

$stmt = $mysqli->prepare($sql);

if (!$stmt){
    die('Erro ao excluir');
}

$stmt->bind_param("i",$id);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    $msg = "Pessoa excluida fom sucesso";
} else {
    $msg = "Não houve exclusão";}

desconecta();

header("Location: ../../pages/questoes/questoes.php?msg={$msg}");


