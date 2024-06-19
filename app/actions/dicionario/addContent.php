<?php

require_once("../../config/conecta.php");

// Buscando as variáveis para a consulta
$id = $_GET['Id-Video'];
$titulo = $_GET['Title-Video'];
$src= $_GET['Src'];
$descricao = $_GET['Descricao'];
$categoria = $_GET['Categoria'];

// Conectar ao banco de dados
conecta();

global $mysqli;

// Construir a consulta SQL
$query = "INSERT INTO $categoria (id_elemento, titulo, width, height, src, title, descricao)
          VALUES ('$id','$titulo','100%','100%', '$src', 'YouTube video player','$descricao')";

// Executar a consulta diretamente
$mysqli->query($query);

// Desconectar do banco de dados
desconecta();

?>