<?php

session_start();
require_once("../../config/conecta.php");

if (isset($_SESSION['login'])) {
    conecta();

    $emailLogado = $_SESSION['login'];

    $sql = "SELECT nome, email, senha, path_img FROM usuario WHERE email = ?;";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $emailLogado);
    $stmt->execute();

    $usuarioLogado = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
} else {
    $usuarioLogado = [];
}