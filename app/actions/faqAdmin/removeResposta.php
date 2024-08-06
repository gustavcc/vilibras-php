<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login-admin'])) {
    header("Location: ../../pages/admin/loginAdmin.php?");
    exit();
}

require_once("../../config/conecta.php");

conecta();

if (isset($_GET['id_pergunta'])){

    $id = $_GET['id_pergunta'];

    $query = "UPDATE feedback SET resposta = NULL WHERE id_feedback = ? ";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s',$id);
    $stmt->execute();
}

else{
    die("Os dados não foram enviados.");
}

desconecta();

header("Location:../../pages/faq/faqAdmin.php");
?>