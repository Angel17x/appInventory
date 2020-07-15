<?php
    require("connect.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <script src="js/all.min.js"></script>
    
</head>
<body>
    <header>
        <nav class="nav navbar-expand-lg bg-dark navbar-dark p-4 justify-content-center">
        <a class="navbar-brand bg-success p-2" href="index.php">APPINVENTORY</a>
        <span class="navbar-nav p-2 navbar-brand">FERRETERIA EL GRAN MARTILLO</span>
        </nav>
    </header>
    <style>
        form input.tamaño{
            font-size: 18px;
        }
    </style>
    <!---BOOTSTRAP CONTENEDOR----->
    <div class="container mt-4 p-4">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">

                    <!---FORMULARIO DE SESION PHP----->
                    <form id="form" class="form" method="post">
                    <div class="form-group mt-2">
                        <label class="card-title" for="loginname">Nombre De Usuario</label>
                        <input type="text" placeholder="&#xf2bd;" style="font-family: FontAwesome;" class="form-control tamaño" name="loginname" id="loginname" >
                    </div>
                        <div class="form-group mt-2">
                        <label class="card-title" for="password">Contraseña</label>
                            <input type="password" placeholder="&#xf023;" style="font-family: FontAwesome;" class="form-control tamaño" name="password" id="password" >
                        </div>

                        <input type="submit" class="btn btn-primary btn-block text-center" value="Entrar" name="entrar" id="entrar">
                    <div class="form-group text-center mt-2 p-2">
                    <a class="alert alert-link" href="forgot.php">Olvidastes tu contraseña? Entra aqui para recuperar la contraseña</a>
                    </div>
                    </form>
                    <!---CIERRE DE FORMULARIO DE SESION PHP----->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---CIERRE DE BOOTSTRAP CONTENEDOR----->


    <footer>

    </footer>
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/app.js"></script>
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