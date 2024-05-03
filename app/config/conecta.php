<?php

define('user','root');
define('password','admin');
define('host','localhost');
define('db','vilibras');

$mysqli;

function conecta(){

    global $mysqli;

    $mysqli = new mysqli(host,user,password,db);
    if($mysqli->connect_errno){
        die("Falha ao conectar {$mysqli->connect_errno}");
    }
}

function desconecta(){
    global $mysqli;
    $mysqli->close();
}