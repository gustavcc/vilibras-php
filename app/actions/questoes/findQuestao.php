<?php

require_once("../../config/conecta.php");

function findQuestao($id) {
    conecta();

    $sql = "SELECT * FROM questoes WHERE id = $id";

    $result = $mysqli->query($sql);

    $questao = $result->fetch_all(MYSQLI_ASSOC);

    return $questao;
    
    desconecta();
}
