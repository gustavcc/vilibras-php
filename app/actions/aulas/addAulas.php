<?php

require_once("../../config/conecta.php");

// Buscando as variáveis para a consulta
if (isset($_GET['Id-Aula']) && isset($_GET['Titulo']) && isset($_GET['Iframe']) && isset($_GET['Descricao']) && isset($_GET['Resumo'])) {

    $id = trim($_GET['Id-Aula']);
    $titulo = trim($_GET['Titulo']);
    $iframe = trim($_GET['Iframe']);
    $descricao = trim($_GET['Descricao']);
    $resumo = trim($_GET['Resumo']);

    if (!empty($id) && !empty($titulo) && !empty($iframe) && !empty($descricao) && !empty($resumo)){

        conecta();

        $query = "SELECT id FROM aulas WHERE id = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt === false) {
            die("Erro na verificação de existência do id: " . $mysqli->error);
        }

        $stmt->bind_param('s', $id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {

            $query = "INSERT INTO aulas (id, titulo, descricao, resumo, iframe)
                      VALUES (?, ?, ?, ?, ?)";

            $stmtAdd = $mysqli->prepare($query);

            if ($stmtAdd === false) {
                die("Erro na preparação da consulta que adicionaria a aula: " . $mysqli->error);
            }

            $stmtAdd->bind_param('sssss', $id, $titulo, $descricao, $resumo, $iframe);
            $stmtAdd->execute();

            if ($stmtAdd->affected_rows > 0) {
                echo "Aula adicionada com sucesso!";
            } else {
                echo "Não foi possível adicionar a aula.";
            }

            $stmtAdd->close();

        } else {
            die("Já existe uma aula com o id informado, portanto, não será possível adicionar.");
        }

        $stmt->close();

        desconecta();   

    } else {
        echo "Informações vazias não são válidas.";
    }

} else {
    echo "Os dados não foram enviados.";
}

?>
