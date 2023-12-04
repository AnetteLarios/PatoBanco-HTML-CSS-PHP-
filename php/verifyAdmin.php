<?php
#Salir si alguno de los datos no está presente 
if(!isset($_POST["id_admin"])|| !isset($_POST["contrasena"])) exit();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
#si todos los datos se han llenado...
include_once "conexionbd.php";
$id_admin = $_POST["id_admin"];
$contrasena = $_POST["contrasena"];

$sentencia = $con->prepare("SELECT contrasena FROM acceso_admin WHERE id_admin = ?");
$resultado = $sentencia->execute([$id_admin]);


if($resultado){
    $contrasena_bd = $sentencia->fetchColumn();
    if ($contrasena === $contrasena_bd){
        header("Location: homeAdmin.php");
        exit();
    } else {
        echo "Contraseña incorrecta. Intente nuevamente";
        header("Refresh: 2; URL = ../adminLogin.html");    
    }
} else {
    echo  "User not found";
    header("Refresh: 2; URL = ../adminLogin.html");    
}

?>
