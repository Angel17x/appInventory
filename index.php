<?php
    require("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font.google.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <script src="js/all.min.js"></script>
</head>
<body>
    <header>
        <nav>
        <div class="pushbar contenedor" data-pushbar-id="mypushbar1" data-pushbar-direction="top">
                <ul>
                    <li><a href="login.php"><span><i class="fas fa-users"></i></span> Login</a></li>
                    <li><a href="#footer"><span><i class="fas fa-receipt"></i></span> Contact</a></li>
                </ul>
            </div>
            <div class="menu">
                <span><a data-pushbar-target="mypushbar1"><i class="fas fa-bars"></i></a></span>
            </div>
            <ul>
                <li><a href="login.php"><span><i class="fas fa-users"></i></span> Login</a></li>
                <li><a href="#footer"><span><i class="fas fa-receipt"></i></span> Contact</a></li>
            </ul>
        </nav>
    </header>
    <form id="form" class="form" action="validarInfo.php" method="post">
        <h3>Nombre De Usuario</h3>
        <input type="text" name="loginname" id="loginname" placeholder="ingresa tu nombre de usuario"><span><i class="fas fa-user-friends"></i></span>
        <div class="error" id="mensaje1"></div>
        <h3>Contraseña</h3>
        <input type="password" name="password" id="password" placeholder="ingresa tu contraseña"><span><i class="fas fa-lock"></i></span>
        <div class="error" id="mensaje2"></div>
        <input type="submit" value="Entrar" name="entrar" id="entrar">
        <a href="forgot.php">Olvidastes tu contraseña? Entra aqui para recuperar la contraseña</a>
    </form>
    <footer>

    </footer>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/api.js"></script>
    <script src="js/pushbar.js"></script>
    <script>
        const pushbar= new Pushbar({
            overlay: true,
            blur: true
        });
    </script>
    <script>
        
    </script>
    
</body>
</html>