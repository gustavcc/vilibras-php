<?php

require_once("../../config/conecta.php");

// Buscando as variáveis para a consulta
if (isset($_GET['Id-Video']) && isset($_GET['Title-Video']) && isset($_GET['Src']) && isset($_GET['Descricao']) && isset($_GET['Categoria'])) {

    $categoria = trim($_GET['Categoria']);
    $id = trim($_GET['Id-Video']);
    $titulo = trim($_GET['Title-Video']);
    $src = trim($_GET['Src']);
    $descricao = trim($_GET['Descricao']);

    if (!empty($titulo) && !empty($src) && !empty($descricao) && !empty($categoria) && !empty($id)){

    global $mysqli;

    conecta();

    $query = "SELECT id_elemento FROM $categoria WHERE id_elemento = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        die("Erro na verificação de existência do id: " . $mysqli->error);
    }

    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {

        $query = "INSERT INTO $categoria (id_elemento, titulo, width, height, src, title, descricao)
                  VALUES (?,?,'100%','100%',?, 'YouTube video player',?)";

        $stmtAdd = $mysqli->prepare($query);

        if ($stmtAdd === false) {
            die("Erro na preparação da consulta que adicionaria o vídeo: " . $mysqli->error);
        }

        $stmtAdd->bind_param('ssss', $id, $titulo, $src, $descricao);
        $stmtAdd->execute();

        if ($stmtAdd->affected_rows > 0) {
            echo "Vídeo adicionado com sucesso!";
        } else {
            echo "Não foi possível adicionar o vídeo.";
        }

        $stmtAdd->close();

    } else {
        die("Já existe um elemento com o id informado, portanto, não será possível adicionar.");
    }

    $stmt->close();

    desconecta();   

    }

    else{
        echo "Informações vazias não são válidas.";
    }


} else {
    echo "Os dados não foram enviados.";
}

?>