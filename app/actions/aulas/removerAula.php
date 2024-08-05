<?php

require_once("../../config/conecta.php");

if (isset($_GET["Id-Aula"])) {
    $idAula = trim($_GET["Id-Aula"]);

    if (!empty($idAula)) {
        conecta();

        // Prepara a consulta para verificar a existência do ID
        $query = "SELECT id FROM aulas WHERE id = ?";
        $stmt = $mysqli->prepare($query);

        if ($stmt === false) {
            die("Erro na verificação de existência do id: " . $mysqli->error);
        }

        $stmt->bind_param('s', $idAula);
        $stmt->execute();
        $stmt->store_result();

        // Verifica se encontrou algum registro
        if ($stmt->num_rows > 0) {
            // Prepara a consulta para remover a aula
            $query = "DELETE FROM aulas WHERE id = ?";
            $stmtRemove = $mysqli->prepare($query);

            if ($stmtRemove === false) {
                die("Erro na preparação da consulta que removeria a aula: " . $mysqli->error);
            }

            $stmtRemove->bind_param('s', $idAula);
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
