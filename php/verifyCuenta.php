<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica si se ha enviado por POST

    // Obtén los datos del formulario
    $num_cuenta = $_POST["num_cuenta"];
    $contrasena = $_POST["contrasena"];

    // Validaciones adicionales si es necesario
    // ...

    // Incluye el archivo de conexión a la base de datos
    include_once "conexionbd.php";

    try {
        // Prepara la consulta para obtener la contraseña almacenada
        $stmt = $con->prepare("SELECT contrasena FROM cuenta WHERE num_cuenta = ?");
        $stmt->execute([$num_cuenta]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Compara la contraseña hasheada almacenada con la contraseña ingresada
            if (password_verify($contrasena, $row["contrasena"])) {
                // Contraseña válida, puedes redirigir o realizar otras acciones aquí
                header("Location: homeClient.php?num_cuenta=$num_cuenta");
                exit();
            } else {
                // Contraseña incorrecta
                echo "Contraseña incorrecta. Inténtalo de nuevo.";
                header("Refresh: 7; URL = ../login.html");
            }
        } else {
            // No se encontró el número de cuenta
            echo "Número de cuenta no encontrado.";
            header("Refresh: 7; URL = ../index.html");
        }
    } catch (PDOException $e) {
        // Manejo de errores de la base de datos
        echo "Error: " . $e->getMessage();
    }
} else {
    // Acceso no autorizado, redirigir o mostrar un mensaje de error
    echo "Acceso no autorizado.";
}
?>