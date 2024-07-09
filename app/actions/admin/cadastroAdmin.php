<?php
session_start();

require_once("../../config/conecta.php");

# define as credenciais do adm que deseja cadastrar

$email = 'yuri@email.com';
$senha = 'admin1234';
$senhaHash = password_hash($senha, PASSWORD_DEFAULT); 

conecta();

$query = "SELECT email FROM administrador;";

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
    echo "Adm já cadastrado. Tente fazer login!";
} else {
    conecta();

    $sql = "INSERT INTO administrador (email,senha) VALUES (?,?);";

    # prepara a querry sql verificando se esta nos conformes, além de passar os
    # valores de forma segura
    $stmt = $mysqli->prepare($sql);
    if(!$stmt){
            die("Erro ao cadastrar. Problema no acesso ao banco de dados");
    }
    # passa as variaveis que entrarão como os valores do registro
    $stmt->bind_param("ss",$email, $senhaHash);
    $stmt->execute();

    # verifica se foi adicionado algum registro
    if($stmt->affected_rows > 0){
            echo "Adm cadastrado com sucesso.";
    }else{
            echo "Não foi possível inserir.";
    }

    desconecta();
}
?>

<br>
<br>
<a href="../../pages/admin/login-admin.php">Faça login</a>