<?php

require_once("../../config/conecta.php");

// Buscando as variáveis para a consulta
$titulo = $_GET['Title-Video'];
$iframe = $_GET['Iframe'];
$descricao = $_GET['Descricao'];

// Conectar ao banco de dados
conecta();

global $mysqli;

// Construir a consulta SQL
$query = "INSERT INTO dicionario_sinais (titulo, iframe, descricao) 
          VALUES ('$titulo', '$iframe', '$descricao')";

// Executar a consulta diretamente
$mysqli->query($query);

// Desconectar do banco de dados
desconecta();

?>