<?php
#Salir si alguno de los datos no está presente 
if(!isset($_POST["id_admin"])|| !isset($_POST["contraseña"])) exit();

#si todos los datos se han llenado...
include_once "conexionbd.php";
$id_admin = $_POST["id_admin"];
$contraseña = $_POST["contraseña"];

$sentencia = $con->prepare("SELECT contraseña FROM acceso_admin WHERE id_admin = ?");
$sentencia->bind_param("s", $id_admin);
$sentencia->execute();
$resultado = $sentencia->get_result();

if($resultado->num_rows > 0 ){
    $fila = $resultado->fetch_assoc();
    $contrasena_bd = $fila['contraseña']; // Aquí estaba el error
    if ($contraseña === $contrasena_bd) { // Y aquí
        header("Refresh: 2; URL = ../homeAdmin.html");
    } else {
        echo "Contraseña incorrecta. Intente nuevamente";
        header("Refresh: 2; URL = ../adminLogin.html");    
    }

} else {
    echo  "User not found";
    header("Refresh: 2; URL = ../adminLogin.html");    
}
$sentencia->close();
$con->close();
?>