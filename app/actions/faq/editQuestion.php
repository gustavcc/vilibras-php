<?php

require_once('../../config/conecta.php');

$id_feedback = $_GET['id_feedback'];
$title_alternation = $_GET['titulo'];
$description_alternation = $_GET['descricao'];

conecta();

$query_verify = 'SELECT * FROM feedback WHERE id_feedback = ?';
$stmt_verify =  $mysqli->prepare($query_verify);
$stmt_verify->bind_param('s',$id_feedback);
$stmt_verify->execute();
$resultado = $stmt_verify->get_result();

$row = $resultado->fetch_assoc();

if ($row['titulo'] != $title_alternation){
    $query_title = 'UPDATE feedback SET titulo = ? WHERE id_feedback = ?';
    $stmt_title = $mysqli->prepare($query_title);
    $stmt_title -> bind_param('ss',$title_alternation, $id_feedback);
    $stmt_title -> execute();
}

if ($row['descricao'] != $description_alternation){
    $query_description = 'UPDATE feedback SET descricao = ? WHERE id_feedback = ?';
    $stmt_description = $mysqli->prepare($query_description);
    $stmt_description -> bind_param('ss',$description_alternation, $id_feedback);
    $stmt_description -> execute();
}

// $elementos_json = json_encode($elementos);


// if ($stmt_verify->num_rows() > 0){
//     $query = 'UPDATE feedback SET id_usuario = ? WHERE id_feedback = ?;';
//     $stmt = prepare($query);
// }







// $query = 'UPDATE feedback SET id_usuario = ? WHERE id_feedback = ?;'
// $stmt 

header("Location: ../../pages/faq/faq.php");

?>