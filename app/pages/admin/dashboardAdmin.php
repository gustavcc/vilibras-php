<?php
require_once("../../actions/admin/identifyAdminLogado.php");

// se não tiver logado, vai para o login
if (!isset($_SESSION['login-admin'])) {
    header("Location: ../admin/login-admin.php?");
    exit();
} ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | VILIBRAS</title>

    
</head>
<body>
    
</body>
</html>