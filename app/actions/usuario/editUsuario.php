<?php

require_once("../../config/conecta.php");

if (isset($_POST['user']) && isset($_POST['nome']) && isset($_POST['email']) ) 
{

    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $email = $_POST['email'];

    if (!isset($_POST["imagem"]) && empty($_POST["imagem"])){
        $msg ="Escolha um arquivo em Fotos!";
    } else {
    
        $imagem = explode('.', $_POST['imagem']);
        $imagemName = $imagem[0];
        $imagemType = $imagem[1];

    
        if (($imagemType == 'png') OR ($imagemType == 'jpeg') OR ($imagemType == 'jpg')) {
            $imagemDB = "../../../public/images/user/".$_POST['imagem'];

            move_uploaded_file($_POST['imagem'], $imagemDB);

            conecta();

            $sql = "UPDATE usuario SET nome=?,email=?,path_img=? WHERE email=?;";

            $stmt = $mysqli->prepare($sql);     
            if(!$stmt){
                die("Erro ao editar. Problema no acesso ao banco de dados");
            }

            $stmt->bind_param("ssss",$nome,$email,$imagemDB,$user);
            $stmt->execute();

            if($stmt->affected_rows>0){
                $msg = "Dados editados com sucesso!";
            }else{
                    $msg = "Não foi possível Editar.";
            }

            desconecta();   
        } else {
            $msg = 'Selecione um imagem válida!';
        }
    }
} else {
    $msg = "Erro aqui";
}

header("Location: ../../pages/perfil/perfil.php?msg={$msg}");        