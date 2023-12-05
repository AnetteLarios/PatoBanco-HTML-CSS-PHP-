<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/editClientAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Home Cliente</title>
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
        <a href = "../login.html"> <img src = "../images/back.png" alt= "back button"></a>
        <div class = "center conainer">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "conexionbd.php";
$num_cuenta = $_GET['num_cuenta'];
$sentencia = $con->prepare("SELECT num_cuenta, saldo FROM cuenta WHERE num_cuenta= ?;");
$sentencia->execute([$num_cuenta]);

// Verificar si se encontró una tupla
if ($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) {
    $num_cuenta_mostrar = $fila['num_cuenta'];
    $saldo_mostrar = $fila['saldo'];

} else {
   
}
?>
            <div class = "left-center-container">
                <ul class = "card">
                    <li class = "cardImage"><img src="../images/credit-card.png" alt = "credit_card"></li>
                    <li class ="cardsnumber"><?php echo $num_cuenta?></li>
                    <li class = "saldo"><h3>Saldo: <?php echo $saldo_mostrar?></h3></li>
                </ul>
            </div>

            <div class = "right-center-container">
                <ul class = "options">
                    <li class = "profile"><img src= "../images/profile-user.png" alt = "profile"><a href = "userProfile.php?num_cuenta=<?php echo $num_cuenta;?>"><h3>Perfil</h3></a></li>
                    <li class = "branch"><img src= "../images/bank.png" alt = "profile"><a href = "userBranch.php?num_cuenta=<?php echo $num_cuenta;?>"><h3>Sucursal</h3></a></li>
                    <li class = "loan"><img src= "../images/prestamo.png" alt = "profile"><a href = "userLoan.php?num_cuenta=<?php echo $num_cuenta;?>"><h3>Préstamo</h3></a></li>
                </ul>
            </div>
        </div>
</body>
</html>