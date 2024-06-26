<?php

require_once("../../config/conecta.php");

conecta();

$sql = "SELECT id_questao,title,test,content,year,correct,answer_A,answer_B,answer_C,answer_D,answer_E FROM questoes;";

$result = $mysqli->query($sql);

if($result->num_rows > 0){
    $questoes = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $questoes = [];
}

$qtdQuestoes = count($questoes);

desconecta();