<?php

session_start();
require_once("../../config/conecta.php");

if (isset($_SESSION['login-admin'])) {
    conecta();

    $emailLogado = $_SESSION['login-admin'];

    $sql = "SELECT email FROM administrador WHERE email = ?;";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $emailLogado);
    $stmt->execute();

    $adminLogado = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

} else {
    $adminLogado = [];
}