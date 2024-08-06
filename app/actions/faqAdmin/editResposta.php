<?php

require_once('../../config/conecta.php');

conecta();

if (isset($_GET['id_feedback']) && isset($_GET['resposta'])){

    $id_feedback = $_GET['id_feedback'];
    $response_alternation = $_GET['resposta'];

    $query_verify = 'SELECT resposta FROM feedback WHERE id_feedback = ?';
    $stmt_verify =  $mysqli->prepare($query_verify);
    $stmt_verify->bind_param('s',$id_feedback);
    $stmt_verify->execute();
    $resultado = $stmt_verify->get_result();

    $row = $resultado->fetch_assoc();


    if ($row['resposta'] != $response_alternation){
        $query_title = 'UPDATE feedback SET resposta = ? WHERE id_feedback = ?';
        $stmt_title = $mysqli->prepare($query_title);
        $stmt_title -> bind_param('ss',$response_alternation, $id_feedback);
        $stmt_title -> execute();
    }

}

else{
    die ("Os dados não foram enviados.");
}

desconecta();

header("Location: ../../pages/faq/faqAdmin.php");

?>