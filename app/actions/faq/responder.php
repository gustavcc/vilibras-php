<?php
require_once("../../config/conecta.php");

session_start();

$msg;

if (isset($_GET['Resposta']) && isset($_GET['id_pergunta'])) {

    if (!empty(trim($_GET['Resposta']))) {

        $resposta = trim($_GET['Resposta']);
        $id_pergunta = trim($_GET['id_pergunta']);
        
        conecta();

        $query_verify = 'SELECT * FROM feedback WHERE id_feedback = ?';
        $stmt_verify =  $mysqli->prepare($query_verify);
        $stmt_verify->bind_param('i',$id_pergunta);
        $stmt_verify->execute();
        $resultado = $stmt_verify->get_result();

        $row = $resultado->fetch_assoc();

        if ($row['resposta']) {
            // die('Pergunta já possui resposta!');
            $msg = 'Pergunta já possui resposta!';
            header("Location: ../../pages/faq/listFaq.php?msg=$msg");
        } else {

            $query = "UPDATE feedback SET resposta = ? WHERE id_feedback = (?)";
            $stmt = $mysqli->prepare($query);
    
            if ($stmt == false) {
                die("Erro na preparação da consulta que adicionaria a pergunta.");
            }
    
            $stmt->bind_param('si', $resposta, $id_pergunta);
    
            if ($stmt->execute()) {
                if ($stmt->affected_rows > 0) {
                    $msg = 'Resposta inserida!';
                    header("Location: ../../pages/faq/listFaq.php?msg=$msg");
                } else {
                    echo "Não foi possível adicionar a resposta.";
                }
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }
        }

        $stmt->close();
        desconecta();
    } else {
        die("Dados vazios não são válidos!");
    }
} else {
    die("Os dados não foram enviados.");
}
