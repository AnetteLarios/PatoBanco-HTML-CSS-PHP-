<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/loansAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Préstamos</title>
    </head>
<!
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

        <div class = center-container>
        <a href = "homeAdmin.php"><img src = "../images/back.png" alt = "botón atrás"></a>
       
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "conexionbd.php";
$sentencia = $con->query("SELECT cliente.rfc, cuenta.num_cuenta, prestamo.num_prestamo, sucursal_banco.num_sucursal, prestamo.cantidad, prestamo.fecha_tramite, prestamo.fecha_pago
FROM cliente,cuenta,prestamo, prestamo_cliente, cuenta_cliente, prestamo_sucursal, sucursal_banco
WHERE prestamo_cliente.num_prestamo= prestamo.num_prestamo AND prestamo_sucursal.num_prestamo = prestamo.num_prestamo AND sucursal_banco.num_sucursal = prestamo_sucursal.num_sucursal AND cuenta_cliente.rfc_cliente = prestamo_cliente.rfc_cliente AND
cliente.rfc = cuenta_cliente.rfc_cliente AND  cuenta.num_cuenta = cuenta_cliente.num_cuenta_cliente ;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
           

            <ul class = "loans-data">
                <li class = "prestamos_image"><img src = "../images/prestamo.png" alt = "prestamo"></li>
                <li class = "title"><h3>Préstamos</h3></li>
            </ul>
            <div>
            <div class = "loansTable">
            <style>
                table, th, td{
                    border: 1px solid black;
                
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>RFC</th>
                        <th>Número de cuenta</th>
                        <th>Número de préstamo</th>
                        <th>Número de sucursal</th>
                        <th>Cantidad</th>
                        <th>Fecha de trámite</th>
                        <th>Fecha de pago</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultado as $fila){ ?>
                    <tr>
                        <td><?php echo $fila->rfc ?></td>
                        <td><?php echo $fila->num_cuenta ?></td>
                        <td><?php echo $fila->num_prestamo ?></td>
                        <td><?php echo $fila->num_sucursal?></td>
                        <td><?php echo $fila->cantidad?></td>
                        <td><?php echo $fila->fecha_tramite ?></td>
                        <td><?php echo $fila->fecha_pago ?></td>
                        <td><a href="<?php echo "clientViewAdmin.php?num_cuenta=" . $fila->num_cuenta?>">Ver Cliente</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <body>
</html>