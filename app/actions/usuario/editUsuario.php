<?php

require_once("../../config/conecta.php");

if (!isset($_FILES['img']) && $_FILES['imagem']['error'] != 0){
    $msg ="aquivo nao definido";
}

if (isset($_POST['user']) && isset($_POST['nome']) && isset($_POST['email']) ) 
{

    $nome = $_POST['nome'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $img = $_FILES['img'];

    $arquivoType = explode('.',$img['name']);

    if (($arquivoType[sizeof($arquivoType)-1] == 'png') OR ($arquivoType[sizeof($arquivoType)-1] == 'jpeg') OR ($arquivoType[sizeof($arquivoType)-1] == 'jpg')){

        $imagemDB = "../../public/img/user/".$_FILES["img"]["name"];

        move_uploaded_file($imagem["tmp_name"], "../../public/img/user/".$_FILES["img"]["name"]);

        conecta();

        $sql = "UPDATE usuario SET nome=?,email=?,path_img=? WHERE email=?;";

        $stmt = $mysqli->prepare($sql);     
        if(!$stmt){
            die("Erro ao editar. Problema no acesso ao banco de dados");
        }

        $stmt->bind_param("ssss",$nome,$email,$img,$user);
        $stmt->execute();

        if($stmt->affected_rows>0){
                $msg = "Questão ". $id ." editada com sucesso.";
        }else{
                $msg = "Não foi possível Editar.";
        }

        desconecta();
    } else {
        $msg = $_FILES["img"]["name"];
    }
} else {
    $msg = "Erro aqui";
}

header("Location: ../../pages/perfil/perfil.php?msg={$msg}");        