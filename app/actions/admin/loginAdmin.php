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

    # verifica se esse email é de um adm
    conecta();

    // fazendo a busca no banco para coletar todos os email e senha
    $query_adm = "SELECT email, senha FROM administrador WHERE email = ?;";

    $stmt = $mysqli->prepare($query_adm);
    $stmt->bind_param('s', $emailForm);
    $stmt->execute();

    $credential_adm = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    if (empty($credential_adm)){
        $credential_adm = [];
    }

    desconecta();

    // se o adm requisitado existir
    if (count($credential_adm) > 0) {

        if (password_verify($senhaForm, $credential_adm['senha'])){

            // define a sessão como logada e atribue o email
            $_SESSION['login-admin'] = $credential_adm['email'];
            
            header("Location: ../../pages/admin/dashboardAdmin.php");
            exit();
        } else {
            $msg = 'Senha incorreta!';
            header("Location: ../../pages/admin/loginAdmin.php?msg={$msg}");
        }
    } else {
        $msg = "Admin não cadastrado ou dados inválidos!";
        header("Location: ../../pages/admin/loginAdmin.php?msg={$msg}");
    }
}