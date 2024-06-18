<?php

require_once("../../config/conecta.php");

// Buscando as variáveis para a consulta
$id = $_GET[]
$titulo = $_GET['Title-Video'];
$rc= $_GET['Src'];
$descricao = $_GET['Descricao'];

// Conectar ao banco de dados
conecta();

global $mysqli;

// Construir a consulta SQL
$query = "INSERT INTO (id_elemento, titulo, width, height, src, title, descricao)
          VALUES ('$titulo', '$src', '$descricao')";

// Executar a consulta diretamente
$mysqli->query($query);

// Desconectar do banco de dados
desconecta();

?>