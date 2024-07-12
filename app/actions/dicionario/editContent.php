<?php

require_once("../../config/conecta.php");

conecta();

global $mysqli;

if (!empty(trim(isset($_GET["Id-Video"]))) && !empty(trim(isset($_GET['Categoria'])))){
    $idVideo = trim($_GET["Id-Video"]);
    $categoria = trim($_GET["Categoria"]);
    $alteracao = 0;

    $query = "SELECT id_elemento FROM $categoria WHERE id_elemento = ?";

    $stmt = $mysqli->prepare($query);

    if ($stmt === false){
        die ("Erro na preparação da consulta que verificaria a existência do id informado: " . $mysqli->error);
    }

    $stmt->bind_param('s', $idVideo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0){
        
        if (!empty(trim($_GET['Title-Video']))){
            $titleVideo = $_GET['Title-Video'];
            $query = "UPDATE $categoria SET titulo = ? WHERE id_elemento = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o titulo: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $titleVideo, $idVideo);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['Descricao']))){
            $descricao = $_GET['Descricao'];
            $query = "UPDATE $categoria SET descricao = ? WHERE id_elemento = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria a descrição: " . $mysqli->error;
            }
            
            $stmt_update->bind_param('ss', $descricao, $idVideo);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['Src']))){
            $src = $_GET['Src'];
            $query = "UPDATE $categoria SET src = ? WHERE id_elemento = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o Src do iframe: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $src, $idVideo);
            $stmt_update->execute();

            if ($stmt_update->affected_rows > 0){
                $alteracao++;
            }

            $stmt_update->close();
        }
        
        if (!empty(trim($_GET['NovoId']))){
            $novoId = $_GET['NovoId'];
            $query = "UPDATE $categoria SET id_elemento = ? WHERE id_elemento = ?";
    
            $stmt_update = $mysqli->prepare($query);
    
            if ($stmt_update === false){
                echo "Erro na preparação da consulta que alteraria o Id: " . $mysqli->error;
            }
    
            $stmt_update->bind_param('ss', $novoId, $idVideo);
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
    die ("Id ou categoria vazia não é válido.");
}

desconecta();

?>