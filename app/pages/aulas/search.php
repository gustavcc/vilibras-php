<?php
require_once("../../config/conecta.php");

$query = $_GET['query'];

conecta();
global $mysqli;

$sql = "SELECT titulo, descricao FROM aulas WHERE titulo LIKE ? OR descricao LIKE ?";
$stmt = $mysqli->prepare($sql);
$searchTerm = '%' . $query . '%';
$stmt->bind_param('ss', $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$aulas = [];
while ($row = $result->fetch_assoc()) {
    $aulas[] = $row;
}

echo json_encode($aulas);

desconecta();
?>
