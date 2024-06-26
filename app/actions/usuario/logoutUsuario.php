<?php
session_start();

session_destroy();
header("Location: ../../pages/usuario/login.php");
exit();