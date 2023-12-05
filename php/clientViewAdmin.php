<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/homeAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Datos Cliente</title>
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

         <ul class = "accounts-data">
                <li class = "back_button"><a href = "accountsViewAdmin.php"></a><img src = "../images/back.png"></li>
                <li class = "profile_image"><img src = "../images/profile.png" alt = "accounts"></li>
                <li class = "title"><h3>Datos del cliente</h3></li>
        </ul>
        </div>

        <div class = "accounts-table">

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "conexionbd.php";
$num_cuenta = $_GET['num_cuenta'];

$sentencia = $con->prepare("SELECT cuenta.num_cuenta, cuenta.contrasena, cuenta.fecha_afiliacion, cliente.rfc, cliente.nombre, cliente.apellido_materno, cliente.apellido_paterno, cliente.telefono, direcciones_cliente.calle, direcciones_cliente.numero, direcciones_cliente.colonia, direcciones_cliente.codigo_postal, direcciones_cliente.ciudad, direcciones_cliente.estado, direcciones_cliente.pais 
                            FROM cuenta, cliente, cuenta_cliente, direccion_cliente, direcciones_cliente
                            WHERE cuenta.num_cuenta = ?
                            AND cuenta.num_cuenta = cuenta_cliente.num_cuenta_cliente
                            AND cliente.rfc = cuenta_cliente.rfc_cliente
                            AND cuenta_cliente.rfc_cliente = direccion_cliente.rfc_cliente
                            AND direccion_cliente.id_direccion_cliente = direcciones_cliente.id_direccion");
$sentencia->execute([$num_cuenta]);
$resultado= $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
            <style>
                table, th, td{
                    border: 1px solid black;
                
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Número de cuenta</th>
                        <th >Contraseña</th>
                        <th>Fecha de afiliación</th>
                        <th>RFC</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                        <th>Calle</th>
                        <th>Número</th>
                        <th>Colonia</th>
                        <th>Código Postal</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($resultado as $fila){ ?>
                    <tr>
                        <td><?php echo $fila->num_cuenta; ?></td>
                        <td class = "password"><?php echo $fila->contrasena; ?></td>
                        <td><?php echo $fila->fecha_afiliacion; ?></td>
                        <td><?php echo $fila->rfc; ?></td>
                        <td><?php echo $fila->nombre; ?></td>
                        <td><?php echo $fila->apellido_paterno; ?></td>
                        <td><?php echo $fila->apellido_materno; ?></td>
                        <td><?php echo $fila->telefono; ?></td>
                        <td><?php echo $fila->calle; ?></td>
                        <td><?php echo $fila->numero; ?></td>
                        <td><?php echo $fila->colonia; ?></td>
                        <td><?php echo $fila->codigo_postal; ?></td>
                        <td><?php echo $fila->ciudad; ?></td>
                        <td><?php echo $fila->estado; ?></td>
                        <td><?php echo $fila->pais; ?></td>
                        <td><a href="<?php echo "editClientAdmin.php?num_cuenta=" . $fila->num_cuenta?>">Editar datos</td>
                        <td><a href="<?php echo "delete.php?num_cuenta=" . $fila->num_cuenta?>">Eliminar</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>   
    </body>




</html>

