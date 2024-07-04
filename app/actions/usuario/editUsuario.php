<?php

require_once("../../config/conecta.php");

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

    // pego a imagem pelo formulário
    $imagem = $_FILES["imagem"];
    
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

        if($stmt->affected_rows>0){
            $msg = "Dados editados com sucesso!";
        }else{
                $msg = "Não foi possível Editar.";
        }

        desconecta();   
    } else {
        $msg = $imagem['name'];

    }
}

header("Location: ../../pages/perfil/perfil.php?msg={$msg}");        