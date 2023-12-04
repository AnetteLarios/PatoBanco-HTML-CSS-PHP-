<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/homeAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Home Admin</title>

    </head>



    <body>
        <div class = "principal_bar">
            <nav>
                <ul class = "options_navegation_bar">
                    <li class = "pato_logo"><img src = "../images/rubber-duck.png"alt = "logo"></li>
                    <li class = "company_name"><h2>PATO BANCO</h2></li>
                    <li class = "cerrar_sesion"><a href = "../index.html"> Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>


        <div class = "center-container">
        <?php
include_once "conexionbd.php";

// Definir manualmente el valor del RFC
$rfc = "PPA830831LJ23";
// Preparar y ejecutar la consulta SQL
$sentencia = $con->prepare("SELECT rfc, nombre, telefono FROM banco_principal WHERE rfc = ?");
$sentencia->execute([$rfc]);

// Verificar si se encontró una tupla
if ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
    $rfc_mostrar = $fila['rfc'];
    $nombre_mostrar = $fila['nombre'];
    $telefono_mostrar = $fila['telefono'];
} else {
    echo "No se encontró ninguna tupla con ese RFC.";
    exit();
}
?>
            <div class = "left-center-container">
                <ul class = "content-left-container">
                    <li class = "title-left-container"><h4>Banco Principal</h4></li>
                    <li class = "bank_image"><img src = "../images/bank.png" alt = "bank"></li>
                    <li class = "rfc"><h4>RFC: <?php echo $rfc_mostrar?></h4></li>
                    <li class = "nombre"><h4>Nombre: <?php echo  $nombre_mostrar?></h4></li>
                    <li class = "telefono"><h4>Teléfono: <?php echo  $telefono_mostrar?></h4></li>
                </ul>
            </div>  
            <div class = "right-center-container">
                <ul class = "content-right-container">
                    <li class = "accounsViewAdmin"><img src = "../images/accounts.png" alt = "account"><a href = "accountsViewAdmin.php"><h4>Cuentas</h4></a></li>
                    <li class = "branchesViewAdmin"><img src = "../images/bank.png" alt = "banco"><a href = "branchesViewAdmin.php"><h4>Sucursales</h4></a></li>
                    <li class = "loansViewAdmin"><img src = "../images/prestamo.png" alt = "prestamo" ><a href = "loansViewAdmin.php"><h4>Préstamos</h4></a></li>
                </ul>
            </div>
        </div>

    </body>

</html>