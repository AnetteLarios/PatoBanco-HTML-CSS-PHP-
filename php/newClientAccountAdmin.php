<?php
#Salir si alguno de los datos no está presente 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(!isset($_POST["num_cuenta"])|| !isset($_POST["rfc_cliente"]) || !isset($_POST["saldo"]) || !isset($_POST["fecha_afiliacion"]) || !isset($_POST["contrasena"])) exit();
include_once "conexionbd.php";


$num_cuenta = $_POST["num_cuenta"];
$rfc_cliente = $_POST["rfc_cliente"];
$saldo = $_POST["saldo"];
$fecha_afiliacion= $_POST["fecha_afiliacion"];
$contrasena = $_POST["contrasena"];
$calle = $_POST["calle"];
$numero = $_POST["numero"];
$colonia= $_POST["colonia"];
$codigo_postal = $_POST["codigo_postal"];
$ciudad = $_POST["ciudad"];
$estado = $_POST["estado"];
$pais = $_POST["pais"];

$hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
$sentencia = $con->prepare("INSERT INTO cuenta VALUES(?,?,?,?);");
$resultado = $sentencia->execute([$num_cuenta, $saldo, $fecha_afiliacion, $hashed_password]);

$sentencia_cuenta_cliente = $con->prepare("INSERT INTO cuenta_cliente VALUES (?,?);");
$resultado_cuenta_cliente = $sentencia_cuenta_cliente->execute([$rfc_cliente, $num_cuenta]);

$sentencia_direcciones_cliente = $con->prepare("INSERT INTO direcciones_cliente(calle, numero, colonia, codigo_postal, ciudad, estado, pais) VALUES(?,?,?,?,?,?,?);");
$resultado_direcciones_cliente = $sentencia_direcciones_cliente->execute([$calle, $numero, $colonia, $codigo_postal, $ciudad, $estado, $pais]);

$id_direccion_cliente  = $con->lastInsertId();

$sentencia_direccion_cliente = $con->prepare("INSERT INTO direccion_cliente VALUES(?,?);");
$resultado_direccion_cliente = $sentencia_direccion_cliente->execute([$rfc_cliente, $id_direccion_cliente]);

if($resultado === TRUE && $resultado_cuenta_cliente ===TRUE && $resultado_direcciones_cliente ===TRUE && $resultado_direccion_cliente === TRUE){
    header("Refresh: 2; URL = accountsViewAdmin.php");
    echo "Cuenta añadida exitosamente";
    

} 
else echo "Couldn't add user, please try again.";
?>