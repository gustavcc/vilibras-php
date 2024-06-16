<?php

require_once("../../config/conecta.php");

conecta();
global $mysqli;
desconecta();

function findQuestao($id) {
    $id_questao = intval($id); 

    conecta();

    global $mysqli;

    $sql = "SELECT * FROM questoes WHERE id_questao=?;";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param('i', $id_questao);
    
    $stmt->execute();

    // $result = $mysqli->query($sql);


    $questao = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));    
    // $questao = $stmt->fetch_all(MYSQLI_ASSOC);

    
    desconecta();

    return $questao;
}
