<?php

require_once("../../config/conecta.php");

conecta();

$sql = "SELECT id_acertou, id_questao, acertou FROM acertou_questao;";

$result = $mysqli->query($sql);

if($result->num_rows > 0){
    $questoesCheck = $result->fetch_all(MYSQLI_ASSOC);
}
$correct = [];
$incorrect = [];
foreach ($questoesCheck as $questaoRespondida) {
    if ($questaoRespondida['acertou'] == 'acertou') {
        array_push($correct, $questaoRespondida);
    }
    if ($questaoRespondida['acertou'] == 'errou') {
        array_push($incorrect, $questaoRespondida);
    }
}

$qtdQuestoesAcertou = count($correct);
$qtdQuestoesErrou = count($incorrect);

desconecta();