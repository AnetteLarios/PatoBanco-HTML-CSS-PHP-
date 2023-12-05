<?php
include_once "conexionbd.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $num_cuenta = $_POST["num_cuenta"];
    $new_password = $_POST["new_password"];

    // Codificar la nueva contraseña (puedes usar password_hash)
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $sentencia = $con->prepare("UPDATE cuenta SET contrasena = ? WHERE num_cuenta = ?");
    $resultado = $sentencia->execute([$hashed_password, $num_cuenta]);

    if ($resultado) {
        echo "Contraseña cambiada exitosamente.";
        header("Refresh: 2; URL = accountsViewAdmin.php");
    } else {
        echo "Hubo un error al cambiar la contraseña.";
    }
}
?>