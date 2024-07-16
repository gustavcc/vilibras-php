<?php

require_once("../../config/conecta.php");
require_once("identifyUsuarioLogado.php");

if(!isset($_FILES['imagem']) && $_FILES['imagem']['error'] != 0){
    $msg = "Selecione um arquivo em Fotos!";
}elseif(empty($_POST['nome'])){
    $msg = "Preencha o nome!";
}elseif(empty($_POST['email'])){
    $msg = "Preencha o campo email!";

}else {

    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $email = $_POST['email'];

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
                if ($email == $usuarioLogado['email']) {
                    $existe = false;
                } 
                break;
            }
        }
    }

    if ($existe) {
        $msg = "Usuário já cadastrado. Tente outro email.";
        header("Location: ../../pages/perfil/perfil.php?msg={$msg}");
        exit();
    } else {

        // pego a imagem pelo formulário
        $imagem = $_FILES["imagem"];
    
        if (!empty($_FILES["imagem"])) {
            // divido o nome dela para verificar o tipo da imagem
            $imagemType = explode('.', $imagem['name']);

            // verifico se o tipo da imagem é válido
            if (($imagemType[sizeof($imagemType)-1] == 'png') || ($imagemType[sizeof($imagemType)-1] == 'jpeg') || ($imagemType[sizeof($imagemType)-1] == 'jpg')) {
                // essa variavel será salva no banco de dados com o nome da imagem
                $imagemDB = "../../../public/images/user/".$_FILES["imagem"]["name"];
        
                // insiro a imagem na pasta para ser acessada
                move_uploaded_file($imagem["tmp_name"], $imagemDB);
        
                conecta();
        
                $sql = "UPDATE usuario SET nome=?,email=?,path_img=? WHERE email=?;";
        
                $stmt = $mysqli->prepare($sql);     
                if(!$stmt){
                    die("Erro ao editar. Problema no acesso ao banco de dados");
                }
        
                $stmt->bind_param("ssss",$nome,$email,$imagemDB,$user);
                $stmt->execute();
        
                $_SESSION['login'] = $email;
        
                if($stmt->affected_rows>0){
                    $msg = "Dados editados com sucesso!";
                }else{
                    $msg = "Não foi possível Editar.";
                }
        
                desconecta();   
            } else {
                $msg = 'Selecione uma imagem válida!';
        
            }
        }
    }
}

header("Location: ../../pages/perfil/perfil.php?msg={$msg}");        