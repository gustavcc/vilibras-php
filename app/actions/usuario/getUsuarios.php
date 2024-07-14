<?php

require_once("../../config/conecta.php");

conecta();

$sql = "SELECT email, nome FROM usuario";

$result = $mysqli->query($sql);

if ($result->num_rows > 0){
    $users = $result->fetch_all(MYSQLI_ASSOC); 
} else {
    $users = [];
}

desconecta();