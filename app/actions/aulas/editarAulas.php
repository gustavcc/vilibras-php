<?php

require_once("../../config/conecta.php");

conecta();

if (!empty(trim($_GET["Id-Aula"]))){
    $idAula = trim($_GET["Id-Aula"]);
    $alteracao = 0;

    $query = "SELECT id FROM aulas WHERE id = ?";

    $stmt = $mysqli->prepare($query);

    if ($stmt === false){
        die ("Erro na preparação da consulta que verificaria a existência do id informado: " . $mysqli->error);
    }

    $stmt->bind_param('s', $idAula);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0){
        
        if (!empty(trim($_GET['Title-Aula']))){
            $titleAula = $_GET['Title-Aula'];
            $query = "UPDATE aulas SET titulo = ? WHERE id = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o título: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $titleAula, $idAula);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['Descricao']))){
            $descricao = $_GET['Descricao'];
            $query = "UPDATE aulas SET descricao = ? WHERE id = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria a descrição: " . $mysqli->error;
            }
            
            $stmt_update->bind_param('ss', $descricao, $idAula);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['Src']))){
            $src = $_GET['Src'];
            $query = "UPDATE aulas SET iframe = ? WHERE id = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o Src do iframe: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $src, $idAula);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['NovoId']))){
            $novoId = $_GET['NovoId'];
            $query = "UPDATE aulas SET id = ? WHERE id = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o Id: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $novoId, $idAula);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }

        if ($alteracao > 0){
            echo "Alteração feita com sucesso! Total de alterações: " . $alteracao;
        }
        else{
            echo "Não houve alteração.";
        }
        
    }
    else{
        die ("O id informado não é compatível com os existentes no banco.");
    }

    // Fechar o statement principal após todas as operações
    $stmt->close();
}
else {
    die ("Id vazio não é válido.");
}

desconecta();

?>
