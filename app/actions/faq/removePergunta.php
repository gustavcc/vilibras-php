<?php

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
