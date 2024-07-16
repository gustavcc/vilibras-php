<?php
session_start();
session_unset();
session_destroy();
header("Location: ../../pages/usuario/login.php");
exit();