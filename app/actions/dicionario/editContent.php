<?php

require_once("../../config/conecta.php");

conecta();

global $mysqli;

if (isset($_GET["Id-Video"]) && isset($_GET['Categoria'])){
    $idVideo = $_GET["Id-Video"];

    if ($_GET['Title-Video'] !== ''){
        $categoria = $_GET['Categoria'];
        $titleVideo = $_GET['Title-Video'];
        $query = "UPDATE $categoria SET titulo = '$titleVideo' WHERE id_elemento = '$idVideo'";
        $mysqli->query($query);
    }
    
    if ($_GET['Descricao'] !== ''){
        $categoria = $_GET['Categoria'];
        $descricao = $_GET['Descricao'];
        $query = "UPDATE $categoria SET descricao = '$descricao' WHERE id_elemento = '$idVideo'";
        $mysqli->query($query);
    }
    
    if ($_GET['Src'] !== ''){
        $categoria = $_GET['Categoria'];
        $src = $_GET['Src'];
        $query = "UPDATE $categoria SET src = '$src' WHERE id_elemento = '$idVideo'";
        $mysqli->query($query);
    }
    
    if ($_GET['NovoId'] !== ''){
        $categoria = $_GET['Categoria'];
        $novoiId = $_GET['NovoId'];
        $query = "UPDATE $categoria SET id_elemento = '$novoiId' WHERE id_elemento = '$idVideo'";
        $mysqli->query($query);
    }

} else {
    // Se 'Id-Video' não está definido, sair do script
    die("Categoria não está definida");
}

desconecta()

?>
