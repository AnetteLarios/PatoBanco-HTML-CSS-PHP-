<!DOCTYPE html>
<html lang = "es">
    <head>
    <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/editClientAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Perfil</title>
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

        <?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "conexionbd.php";
$con->exec("SET NAMES 'utf8'");
$num_cuenta = $_GET['num_cuenta'];
$sentencia = $con->prepare("SELECT cuenta.num_cuenta, cliente.rfc, cliente.nombre, cliente.apellido_materno, cliente.apellido_paterno, cliente.telefono, direcciones_cliente.calle, direcciones_cliente.numero, direcciones_cliente.colonia, direcciones_cliente.codigo_postal, direcciones_cliente.ciudad, direcciones_cliente.estado, direcciones_cliente.pais
                            FROM cuenta, cliente, direcciones_cliente, direccion_cliente, cuenta_cliente 
                            WHERE cuenta.num_cuenta = ?
                            AND cuenta_cliente.num_cuenta_cliente = cuenta.num_cuenta 
                            AND cliente.rfc = cuenta_cliente.rfc_cliente 
                            AND direccion_cliente.rfc_cliente = cliente.rfc 
                            AND direcciones_cliente.id_direccion = direccion_cliente.id_direccion_cliente;");
$sentencia->execute([$num_cuenta]);
$user_data = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>  
        <a href = "homeClient.php?num_cuenta=<?php echo $num_cuenta;?>"> <img src = "../images/back.png" alt= "back button"></a>
        <div class  = "center-container">
            <li class = "profile"><img src = "../images/profile-user.png" alt = "profile"></li>
            <li class = "title"><h3>Perfil</h3></li>
            <div class= "userDataTable">
        
            <style>
                table, th, td{
                    border: 1px solid black;
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Cuenta</th>
                        <th>RFC</th>
                        <th>Nombre(s)</th>
                        <th>Apellido Materno</th>
                        <th>Apellido Paterno</th>
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
                    <?php foreach($user_data as $dato){?>
                    <tr>
                        <td><?php echo $dato->num_cuenta?></td>
                        <td><?php echo $dato->rfc?></td>
                        <td><?php echo $dato->nombre?></td>
                        <td><?php echo $dato->apellido_paterno?></td>
                        <td><?php echo $dato->apellido_materno?></td>
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