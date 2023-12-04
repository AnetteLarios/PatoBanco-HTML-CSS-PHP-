<?php
/*Datos de conexion a la base de datos*/
$db_host = "localhost";
$db_port = "3307";
$db_user = "root";
$db_pass = "12345678";
$db_name = "admin_banco";
try {
    $con = new PDO('mysql:host=' . $db_host . ';port=' . $db_port . ';dbname=' . $db_name, $db_user, $db_pass);
} catch (Exception $e) {
    echo 'No se pudo conectar a la base de datos : ' . $e->getMessage();
}
?>