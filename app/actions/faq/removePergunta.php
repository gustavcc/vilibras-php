<?php

require_once("../../config/conecta.php");

conecta();

global $mysqli;

$id = $_GET['id_pergunta'];

$query = "DELETE FROM feedback WHERE id_feedback = $id";

$mysqli -> query($query);

desconecta();

header("Location:../../pages/faq/faq.php");
?>
