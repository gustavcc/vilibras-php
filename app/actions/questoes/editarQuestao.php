<?php

require_once("../../config/conecta.php");

if (isset($_POST['title']) && isset($_POST['answer_A']) && isset($_POST['answer_B']) && isset($_POST['answer_C']) && isset($_POST['answer_D']) && isset($_POST['answer_E']) && isset($_POST['correct']) && isset($_POST['content']) && isset($_POST['year']) && isset($_POST['test']) && isset($_POST['id'])) {

    $title = $_POST['title'];

    $id = $_POST['id'];

    $a = $_POST["answer_A"];
    $b = $_POST["answer_B"];
    $c = $_POST["answer_C"];
    $d = $_POST["answer_D"];
    $e = $_POST["answer_E"];

    $correct = $_POST['correct'];
    $test = $_POST['test'];
    $content = $_POST['content'];
    $year = $_POST['year'];

    conecta();

    $sql = "UPDATE questoes SET test=?,content=?,year=?,title=?,answer_A=?,answer_B=?,answer_C=?,answer_D=?,answer_E=?,correct=? WHERE id_questao=?;";

    $stmt = $mysqli->prepare($sql);     
    if(!$stmt){
        die("Erro ao editar. Problema no acesso ao banco de dados");
    }

    $stmt->bind_param("ssssssssssi",$test,$content,$year,$title,$a,$b,$c,$d,$e,$correct,$id);
    $stmt->execute();

    if($stmt->affected_rows>0){
            $msg = "Questão ". $id ." editada com sucesso.";
    }else{
            $msg = "Não foi possível Editar.";
    }

    desconecta();
}

header("Location: ../../pages/questoes/questoes.php?msg={$msg}");        