<?php
session_start();

require_once("../../config/conecta.php");

$msg;

# verifica de as variaveis foram definidas ou se estão vazias
if(empty($_POST['nome'])){
    $msg = "Presencha o nome";
}elseif(empty($_POST['senha'])){
    $msg = "Preencha a senha";
}elseif(empty($_POST['email'])){
    $msg = "Preencha o email";
}else{

    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $path_img = '../../../public/images/user/user.png';

    conecta();

    $query = "SELECT email FROM usuario;";
    
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $emails = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $emails = [];
    }

    desconecta();

    // define que nao existe um email igual
    $existe = false;

    // se já houver um email cadastrado, faço a verificação
    if (count($emails)>0){
        foreach($emails as $email_user) {

            // se o emeil for igual a um existente, define como true
            if ($email == $email_user['email']) {
                $existe = true;
                break;
            }
        }
    }

    if ($existe) {
        $msg = "Usuário já cadastrado. Tente fazer login!";
        header("Location: ../../pages/usuario/cadastro.php?msg={$msg}");
        exit();
    } else {
        conecta();

        $sql = "INSERT INTO usuario (email,senha,nome,path_img) VALUES (?,?,?,?);";

        # prepara a querry sql verificando se esta nos conformes, além de passar os
        # valores de forma segura
        $stmt = $mysqli->prepare($sql);
        if(!$stmt){
                die("Erro ao cadastrar. Problema no acesso ao banco de dados");
        }
        # passa as variaveis que entrarão como os valores do registro
        $stmt->bind_param("ssss",$email, $senha, $nome, $path_img);
        $stmt->execute();

        # verifica se foi adicionado algum registro
        if($stmt->affected_rows > 0){
                $msg = "Usuário cadastrado com sucesso.";
        }else{
                $msg = "Não foi possível inserir.";
        }

        desconecta();

        header("Location: ../../pages/dashboard/dashboard.php?");
        exit();
    }
}
header("Location: ../../pages/usuario/cadastro.php?msg={$msg}");
exit();