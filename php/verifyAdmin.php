<?php
#Salir si alguno de los datos no está presente 
if(!isset($_POST["id_admin"])|| !isset($_POST["contraseña"])) exit();

#si todos los datos se han llenado...
include_once "conexionbd.php";
$id_admin = $_POST["id_admin"];
$contraseña = $_POST["contraseña"];

$sentencia = $con->prepare("SELECT contraseña FROM acceso_admin WHERE id_admin = ?");
$sentencia->execute([$id_admin]);

$resultado = $sentencia->fetch();

if($resultado){
    $contrasena_bd = $resultado['contraseña'];
    if ($contraseña === $contrasena_bd) {
        header("Refresh: 2; URL = ../homeAdmin.html");
    } else {
        echo "Contraseña incorrecta. Intente nuevamente";
        header("Refresh: 2; URL = ../adminLogin.html");    
    }
} else {
    echo  "User not found";
    header("Refresh: 2; URL = ../adminLogin.html");    
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
