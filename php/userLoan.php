<!DOCTYPE html>
<html lang = "es">
    <head>
    <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/editClientAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Préstamo</title>
    </head>
    <body>
        <div class = "principal_bar">
            <nav>
                <ul class = "options_navegation_bar">
                    <li class = "pato_logo"><img src = "../images/rubber-duck.png"alt = "logo"></li>
                    <li class = "company_name"><h2>PATO BANCO</h2></li>
                    <li class = "cerrar_sesion"><a href = "../index.html">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </div>
        <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "conexionbd.php";
$con->exec("SET NAMES 'utf8'");
$num_cuenta = $_GET['num_cuenta'];
$sentencia = $con->prepare("SELECT prestamo.num_prestamo, prestamo.cantidad, prestamo.fecha_tramite, prestamo.fecha_pago
                            FROM prestamo, prestamo_sucursal, cliente, cuenta, cuenta_cliente, prestamo_cliente
                            WHERE cuenta.num_cuenta = ?
                            AND cuenta_cliente.num_cuenta_cliente = cuenta.num_cuenta
                            AND cliente.rfc = cuenta_cliente.rfc_cliente
                            AND prestamo_cliente.rfc_cliente = cliente.rfc
                            AND prestamo.num_prestamo = prestamo_cliente.num_prestamo
                            LIMIT 1");
$sentencia->execute([$num_cuenta]);
$loan_data = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>  
        <a href = "homeClient.php?num_cuenta=<?php echo $num_cuenta;?>"> <img src = "../images/back.png" alt= "back button"></a>
        <div class  = "center-container">
            <li class = "profile"><img src = "../images/bank.png" alt = "profile"></li>
            <li class = "title"><h3>Sucursal</h3></li>
            <div class= "userLoanDataTable">
        
            <style>
                table, th, td{
                    border: 1px solid black;
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Número de préstamo</th>
                        <th>Cantidad</th>
                        <th>Fecha trámite</th>
                        <th>Fecha pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($loan_data as $dato){?>
                    <tr>
                        <td><?php echo $dato->num_prestamo?></td>
                        <td><?php echo $dato->cantidad?></td>
                        <td><?php echo $dato->fecha_tramite?></td>
                        <td><?php echo $dato->fecha_pago?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
    </body>
</html>