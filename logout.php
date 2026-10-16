/*
Logout se encarga de cerrar sesion y redirigirte a la ruta principal de ardunova    
*/
<?php
session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();
?>