<?php

require_once("../../config/conecta.php");
require_once("../questoes/getQuestoesAcertou.php");

$email_user = $_SESSION['login'];

// aqui pego a solicitação do JavaScript (request), codifico em array php
$json = file_get_contents("php://input");
$add_banco_php = json_decode($json, true);

// salvo as informações no banco de dados
if (isset($add_banco_php)) {

    // coletando valor numérico do id_questão
    $id_prev = $add_banco_php['id'];
    $arr_id_prev = explode("_", $id_prev);
    $id_questao = intval($arr_id_prev[0]);

    echo $id_questao;

    $acertou = $add_banco_php['check'];

    // passos pelas questões ja respondidas
    if (isset($questoesCheck)) {
        foreach($questoesCheck as $questaoRespondida) {

            // se a questão atual já foi respondida antes
            if ($questaoRespondida[1] == $id_questao) {
                
                // faço uma pequena conexão com o banco para excluir as respostas anteriores da mesma questão
                // assim apenas a útima respota será salva no banco, isso em dados estatísticos e evitar sobrecarregamento 
                conecta();
                $idQuestaoRespondida = $questaoRespondida[0];
                $sql_del = "DELETE FROM acertou_questao WHERE id_acertou = $idQuestaoRespondida;";
                $mysqli->execute_query($sql_del);
                desconecta();
            }
        } 
    }

    // tratamento de segurança adequado
    if (!is_numeric($id_questao)) {
        echo 'ID inválido';
        exit;
    }


    conecta();

    $sql = "INSERT INTO acertou_questao (acertou, id_questao, email_user) VALUES (?,?,?)";

    $stmt = $mysqli->prepare(($sql));
    if (!$stmt) {
        die('Erro ao inserir. Não foi possível acessar o DB!');
    }
    $stmt->bind_param("sis",$acertou, $id_questao, $email_user);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $msg = "Questão cadastrada com sucesso.";
    }else{
        $msg = "Não foi possível inserir.";
    }

    desconecta();
}