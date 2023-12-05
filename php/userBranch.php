<!DOCTYPE html>
<html lang = "es">
    <head>
    <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/editClientAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Sucursal</title>
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
$sentencia = $con->prepare("SELECT sucursal_banco.telefono, sucursal_banco.calle, sucursal_banco.numero, sucursal_banco.colonia, sucursal_banco.codigo_postal, sucursal_banco.ciudad, sucursal_banco.estado, sucursal_banco.pais
                            FROM cuenta, sucursal_banco, cuentas_sucursal
                            WHERE cuenta.num_cuenta = ?
                            AND cuentas_sucursal.num_cuenta_cliente = cuenta.num_cuenta
                            AND sucursal_banco.num_sucursal =  cuentas_sucursal.num_sucursal_banco;");
$sentencia->execute([$num_cuenta]);
$branch_data = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>  
        <a href = "homeClient.php?num_cuenta=<?php echo $num_cuenta;?>"> <img src = "../images/back.png" alt= "back button"></a>
        <div class  = "center-container">
            <li class = "profile"><img src = "../images/bank.png" alt = "profile"></li>
            <li class = "title"><h3>Sucursal</h3></li>
            <div class= "userBranchDataTable">
        
            <style>
                table, th, td{
                    border: 1px solid black;
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Teléfono</th>
                        <th>Calle</th>
                        <th>Número </th>
                        <th>Colonia</th>
                        <th>C.P</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($branch_data as $dato){?>
                    <tr>
                        <td><?php echo $dato->telefono?></td>
                        <td><?php echo $dato->calle?></td>
                        <td><?php echo $dato->numero?></td>
                        <td><?php echo $dato->colonia?></td>
                        <td><?php echo $dato->codigo_postal?></td>
                        <td><?php echo $dato->ciudad?></td>
                        <td><?php echo $dato->estado?></td>
                        <td><?php echo $dato->pais?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            </div>
        </div>
    </body>
</html>