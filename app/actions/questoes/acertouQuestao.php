<?php

require_once("../../config/conecta.php");
require_once("../questoes/getQuestoesAcertou.php");

// aqui pego a solicitação do JavaScript (request), codifico em array php
$json = file_get_contents("php://input");
$add_banco_php = json_decode($json, true);

// salvo as informações no banco de dados
if (isset($add_banco_php)) {

    $id_questao = $add_banco_php['id'][0];
    $acertou = $add_banco_php['check'];

    // passos pelas questões ja respondidas
    $listRespondidaAnteriormente = [];
    if (isset($questoesCheck)) {
        foreach($questoesCheck as $questaoRespondida) {

            // se a questão atual já foi respondida antes
            if ($questaoRespondida['id_questao'] == $id_questao) {
                
                // faço uma pequena conexão com o banco para excluir as respostas anteriores da mesma questão
                // assim apenas a útima respota será salva no banco, isso em dados estatísticos e evitar sobrecarregamento 
                conecta();
                $idQuestaoRespondida = $questaoRespondida['id_acertou'];
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

    $sql = "INSERT INTO acertou_questao (acertou, id_questao) VALUES (?,?)";

    $stmt = $mysqli->prepare(($sql));
    if (!$stmt) {
        die('Erro ao inserir. Não foi possível acessar o DB!');
    }
    $stmt->bind_param("si",$acertou, $id_questao);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        $msg = "Questão cadastrada com sucesso.";
    }else{
        $msg = "Não foi possível inserir.";
    }

    desconecta();
}

