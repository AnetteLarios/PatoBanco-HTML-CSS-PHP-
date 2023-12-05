<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/accountsViewAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Cuentas</title>

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
            <a href = "homeAdmin.php"><img src = "../images/back.png" alt = "boton atrás"></a>

<?php

include_once "conexionbd.php";


$sentencia = $con->query("SELECT * FROM cuenta;");
$cuentas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
            <ul class = "accounts-data">
                <li class = "accounts_image"><img src = "../images/accounts.png" alt = "accounts"></li>
                <li class = "title"><h3>Cuentas</h3></li>
                <li class = "addAccount"><a href = "../addAccountAdmin.html">Añadir Cuenta</a>
            </ul>
        </div>

        <div class = "accounts-table">
            <style>
                table, th, td{
                    border: 1px solid black;
                
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Número de cuenta</th>
                        <th>Saldo</th>
                        <th>Fecha de afiliación</th>
                        <th>Contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($cuentas as $cuenta){ ?>
                    <tr>
                        <td><?php echo $cuenta->num_cuenta?></td>
                        <td><?php echo $cuenta->saldo?></td>
                        <td><?php echo $cuenta->fecha_afiliacion?></td>
                        <td><?php echo $cuenta->contrasena?></td>
                        <td><a href ="<?php echo "clientViewAdmin.php?num_cuenta=" . $cuenta->num_cuenta?>">></td> 
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>    
    </body>

</html>
