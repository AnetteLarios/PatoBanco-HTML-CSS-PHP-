<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/branchesViewAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Sucursales</title>
    </head>

    <body>
        <div class = "principal_bar">
            <ul class = "options_navegation_bar">
                <li class = "pato_logo"><img src = "../images/rubber-duck.png" alt = "logo"></li>
                <li class = "company_name"><h2>PATO BANCO</h2></li>
                <li class = "cerrar_sesion"><a href = "../index.html">Cerrar Sesión</a></li>
            </ul>
        </div>

        <div class  = "center-container">
            <a href= "homeAdmin.php"><img src ="../images/back.png" alt="back__button"></a>

            <ul class = "branches-data">
                <li class= "branches_image"><img src = "../images/bank.png" alt = "bank_image"></li>
                <li class = "title"><h3>Sucursales</h3></li>
            </ul>
        </div>

        <div class = "branches-table">
        <?php
include_once "conexionbd.php";
$con->exec("SET NAMES 'utf8'");
$sentencia = $con->query("SELECT * FROM sucursal_banco;");
$sucursales = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>          
            <style>
                table, th, td{
                    border: 1px solid black;
                }
            </style>

            <table>
                <thead>
                    <tr>
                        <th>Número de sucursal</th>
                        <th>Teléfono</th>
                        <th>RFC Banco</th>
                        <th>Calle</th>
                        <th>Número</th>
                        <th>Colonia</th>
                        <th>Código postal</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($sucursales as $sucursal){?>
                    <tr>
                        <td><?php echo $sucursal->num_sucursal?></td>
                        <td><?php echo $sucursal->telefono?></td>
                        <td><?php echo $sucursal->rfc_banco?></td>
                        <td><?php echo $sucursal->calle?></td>
                        <td><?php echo $sucursal->numero?></td>
                        <td><?php echo $sucursal->colonia?></td>
                        <td><?php echo $sucursal->codigo_postal?></td>
                        <td><?php echo $sucursal->ciudad?></td>
                        <td><?php echo $sucursal->estado?></td>
                        <td><?php echo $sucursal->pais?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </body>
</html>