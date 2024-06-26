<?php

require_once("../../config/conecta.php");

conecta();

global $mysqli;

if (isset($_GET["Id-Video"]) && isset($_GET["Categoria"])){
    $categoria = $_GET["Categoria"];
    $idVideo = $_GET["Id-Video"];
    $query = "DELETE FROM $categoria WHERE id_elemento = '$idVideo'";
    $mysqli->query($query);
}

desconecta()
?>