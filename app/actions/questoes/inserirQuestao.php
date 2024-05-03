<?php

require_once("../../config/conecta.php");

$msg_erro;
$msg;

# verifica de as variaveis foram definidas ou se estão vazias
if(empty($_POST['title'])){
    $msg_erro = "Presencha o titulo";
}
elseif(empty($_POST['answer_A'])){
    $msg_erro = "Preencha todas as respostas";
}elseif(empty($_POST['answer_B'])){
    $msg_erro = "Preencha todas as respostas";
}elseif(empty($_POST['answer_C'])){
    $msg_erro = "Preencha todas as respostas";
}elseif(empty($_POST['answer_D'])){
    $msg_erro = "Preencha todas as respostas";
}elseif(empty($_POST['answer_E'])){
    $msg_erro = "Preencha todas as respostas";
}
elseif(empty($_POST['correct'])){
    $msg_erro = "Escolha a resposta correta";
// }elseif(empty($_POST['test'])){
//     $msg_erro = "Preencha o campo prova";
// }elseif(empty($_POST['content'])){
//     $msg_erro = "Preencha o campo prova";
// }elseif(empty($_POST['year'])){
//     $msg_erro = "Preencha o campo prova";

}else{

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

    $sql = "INSERT INTO questoes(test,content,year,title,answer_A,answer_B,answer_C,answer_D,answer_E,correct)VALUES(?,?,?,?,?,?,?,?,?,?);";

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
            $msg = "Produto cadastrado com sucesso.";
    }else{
            $msg_erro = "Não foi possível inserir.";
    }

    desconecta();
}

header("Location: ../../pages/questoes/inserirQuestaoForm.php?msg={$msg}%?msg_erro={$msg_erro}");