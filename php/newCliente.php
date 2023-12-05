<?php
#Salir si alguno de los datos no está presente 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_POST["rfc"])|| !isset($_POST["nombre"]) || !isset($_POST["apellido_materno"]) || !isset($_POST["apellido_paterno"]) || !isset($_POST["telefono"])) exit();

#si todos los datos se han llenado...
include_once "conexionbd.php";
$rfc = $_POST["rfc"];
$nombre = $_POST["nombre"];
$apellido_paterno = $_POST["apellido_paterno"];
$apellido_materno = $_POST["apellido_materno"];
$telefono = $_POST["telefono"];


$sentencia = $con->prepare("INSERT INTO cliente(rfc, nombre, apellido_paterno, apellido_materno, telefono) VALUES(?,?,?,?,?);") ;
$resultado = $sentencia->execute([$rfc, $nombre, $apellido_paterno, $apellido_materno, $telefono]);

if($resultado === TRUE ){
    $html = file_get_contents('../userAddedSuccessfully.html');
    echo $html;
    header("Refresh: 15; URL = ../index.html");
} 
else echo "Couldn't add user, please try again.";
?>