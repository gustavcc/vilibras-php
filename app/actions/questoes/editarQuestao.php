<?php

require_once("../../config/conecta.php");

if (isset($_POST['title']) && isset($_POST['answer_A']) && isset($_POST['answer_B']) && isset($_POST['answer_C']) && isset($_POST['answer_D']) && isset($_POST['answer_E']) && isset($_POST['correct']) && isset($_POST['content']) && isset($_POST['year']) && isset($_POST['test'])) {

    $title = $_POST['title'];

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

    $sql = "UPDATE INTO questoes(test,content,year,title,answer_A,answer_B,answer_C,answer_D,answer_E,correct)VALUES(?,?,?,?,?,?,?,?,?,?);";

    # prepara a querry sql verificando se esta nos conformes, além de passar os
    # valores de forma segura
    $stmt = $mysqli->prepare($sql);
    if(!$stmt){
            die("Erro ao inserir. Problema no acesso ao banco de dados");
    }
    # passa as variaveis que entrarão como os valores do registro
    $stmt->bind_param("ssssssssss",$test,$content,$year,$title,$a,$b,$c,$d,$e,$correct);
    $stmt->execute();

		# verifica se foi adicionado algum registro
    if($stmt->affected_rows > 0){
            $msg = "Questão cadastrada com sucesso.";
    }else{
            $msg = "Não foi possível inserir.";
    }

    desconecta();
}

header("Location: ../../pages/questoes/inserirQuestaoForm.php?msg={$msg}");