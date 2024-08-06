<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: ../../pages/usuario/login.php?");
    exit();
}

require_once("../../config/conecta.php");

if (isset($_SESSION['login']) && isset($_SESSION['usuario'])) {
    $id_usuario = $_SESSION['usuario'];
} 

if (isset($_GET['Title']) && isset($_GET['Content-Question'])) {
    if (!empty(trim($_GET['Title'])) && !empty(trim($_GET['Content-Question']))) {
        $titulo = trim($_GET['Title']);
        $descricao = trim($_GET['Content-Question']);
        $data = date('Y/m/d');
        
        conecta();

        $query = "INSERT INTO feedback (titulo, descricao, id_usuario,data_dia) VALUES (?, ?, ?,?)";
        $stmt = $mysqli->prepare($query);

        if ($stmt == false) {
            die("Erro na preparação da consulta que adicionaria a pergunta.");
        }

        $stmt->bind_param('ssis', $titulo, $descricao, $id_usuario,$data);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                header("Location: ../../pages/faq/faq.php");
            } else {
                echo "Não foi possível adicionar a pergunta.";
            }
        } else {
            echo "Erro ao executar a consulta: " . $stmt->error;
        }

        $stmt->close();
        desconecta();
    } else {
        die("Dados vazios não são válidos!");
    }
} else {
    die("Os dados não foram enviados.");
}
