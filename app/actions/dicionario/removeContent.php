<?php

require_once("../../config/conecta.php");

if (isset($_GET["Id-Video"], $_GET["Categoria"])) {
    $categoria = trim($_GET["Categoria"]);
    $idVideo = trim($_GET["Id-Video"]);

    if (!empty($categoria) && !empty($idVideo)) {
        conecta();
        global $mysqli;

        // Prepara a consulta para verificar a existência do ID
        $query = "SELECT id_elemento FROM $categoria WHERE id_elemento = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt === false) {
            die("Erro na verificação de existência do id: " . $mysqli->error);
        }

        $stmt->bind_param('s', $idVideo);
        $stmt->execute();
        $stmt->store_result();

        // Verifica se encontrou algum registro
        if ($stmt->num_rows > 0) {
            // Prepara a consulta para remover o vídeo
            $query = "DELETE FROM $categoria WHERE id_elemento = ?";
            $stmtRemove = $mysqli->prepare($query);

            if ($stmtRemove === false) {
                die("Erro na preparação da consulta que removeria o vídeo: " . $mysqli->error);
            }

            $stmtRemove->bind_param('s', $idVideo);
            $stmtRemove->execute();

            // Verifica se a remoção foi bem-sucedida
            if ($stmtRemove->affected_rows > 0) {
                echo "Remoção feita com sucesso!";
            } else {
                echo "Remoção sem sucesso.";
            } 
            
            $stmtRemove->close();
        } else {
            echo "O id informado não é compatível com os existentes no banco, portanto, não será possível fazer a remoção.";
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