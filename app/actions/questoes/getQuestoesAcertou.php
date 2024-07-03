<?php

require_once("../../actions/usuario/identifyUsuarioLogado.php");

$email_user = $_SESSION['login'];

require_once("../../config/conecta.php");

conecta();

$sql = "SELECT id_acertou, id_questao, acertou FROM acertou_questao WHERE email_user = ?;";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $email_user);
$stmt->execute();

if ($stmt){
    $questoesCheck = mysqli_fetch_all(mysqli_stmt_get_result($stmt)); 
} else {
    $questoesCheck = [];
}

$correct = [];
$incorrect = [];

foreach ($questoesCheck as $questaoRespondida) {
    if ($questaoRespondida[2] == 'acertou' && isset($questaoRespondida)) {
        array_push($correct, $questaoRespondida);
    }
    if ($questaoRespondida[2] == 'errou' && isset($questaoRespondida)) {
        array_push($incorrect, $questaoRespondida);
    }
}

$qtdQuestoesAcertou = count($correct);
$qtdQuestoesErrou = count($incorrect);

desconecta();