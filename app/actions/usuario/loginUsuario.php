<?php
session_start();

require_once("../../config/conecta.php");

$msg;

# verifica de as variaveis foram definidas ou se estão vazias
if(empty($_POST['email'])){
    $msg = "Presencha o email";
}
elseif(empty($_POST['senha'])){
    $msg = "Preencha a senha";
}else{

    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];

    conecta();

    // fazendo a busca no banco para coletar todos os email e senha
    $query = "SELECT email, senha, nome FROM usuario WHERE email = ? AND senha = ?;";
    
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $emailForm, $senhaForm);
    $stmt->execute();

    $credential = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if (empty($credential)){
        $credential = [];
    }

    // se o usuário requisitado existir
    if (count($credential) > 0) {

        if ($credential)
        // define a sessão como logada
        $_SESSION['login'] = $credential['nome'];
        
        header("Location: ../../pages/dashboard/dashboard.php");
        exit();
    } else {
        $msg = "Dados inválidos!";
        header("Location: ../../pages/usuario/login.php?msg={$msg}");
    }

    desconecta();

}
header("Location: ../../pages/usuario/login.php?msg={$msg}");
exit();