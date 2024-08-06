<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: ../../pages/usuario/login.php?");
    exit();
}

require_once("../../config/conecta.php");

conecta();

$id = $_GET['id_pergunta'];

$query = "DELETE FROM feedback WHERE id_feedback = ? ";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$id);
$stmt->execute();

desconecta();

header("Location:../../pages/faq/faq.php");
?>
