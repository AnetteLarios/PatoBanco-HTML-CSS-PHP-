<!DOCTYPE html>
<html lang= "es">
<head>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
        <link rel = "stylesheet" type = "text/css" href = "../css/editClientAdminStyles.css">
        <link rel="icon" href="../images/rubber-duck.png" type="image/png">
        <title>Editar Cliente</title>
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
            <div class = "change-data-form">
                <img src = "../images/profile-user.png" alt = "cambiar_datos">
                <h3>Cambiar datos<h3>
                <form action="changeDataUserAdmin.php" method= "post">
                    
                    <input type = "hidden" value="<?php echo $_GET['num_cuenta'];?>" name= "num_cuenta" readonly>

                    <label for="new_password">Nueva Contraseña</label>
                    <input id ="contrasena" required type = "password"name="contrasena" >

                    <input type="submit" value="Cambiar datos">
                </form>
            </div>
        </div>
    </body>
</html>