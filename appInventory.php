<?php require("connect.php");

    session_start();

    if(!isset($_SESSION['sesion'])){
        header('location: index.php');
            
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido A AppInventory</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <script src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="pushbar contenedor"  data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul>
                    <li><a href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    

                    <li></span><a href="register.php"><span><i class="fas fa-folder-plus"></i> Registrar</a></li>
                     <li></span><a href="cargar.php"><span><i class="fas fa-arrow-alt-circle-right"></i> Carga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-left"></i> Descarga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-people-carry"></i> Traslado</a></li>
                     <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li>
                     
                    
                    <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li> 
                   
                    <li class="footer"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                    <h5>Usuario <?php echo $_SESSION['sesion']?></h5>
                </ul>
            </div>
        
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid justify-content-sm-between">
                <span class="navbar-header mt-2 col-md-4 col-12 col-sm-4" style="font-size: 35px; color: white;"><a data-pushbar-target="mypushbar1"><i class="fas fa-stream"></i></a></span>
                <div class="navbar-brand col-md-4 col-12 col-sm-4 bg-light">
                <h5 class="mt-3" id="titulo"></h5><!--------TITULO DE USUARIO------------->
                </div>
                </div>
                <ul class="navbar-nav ml-auto col-12 col-md-4 col-sm-4">
                    <form class="form-inline my-2 my-lg-0">
                        <input type="search" id="search" class="form-control mr-sm-2"
                        placeholder="Buscar Producto">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">
                            Buscar
                        </button>
                    </form>
                </ul>
                    </nav>

        <!---------------------------TABLA DE DATOS--------------------------------------->
         <div class="container">
             <div class="table-responsive">
            <table class="table table-borderess table-hover table-sm mt-5">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>REFERENCIA</th>
                        <th>PRODUCTO</th>
                        <th>FECHA</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                    </tr>
                </thead>
            <tbody id="task" class="bg-light">
                 
            </tbody>
            </table>
            </div>
            </div>
            <div class="container-fluid bg-light">
                <div class="row justify-content-sm-center">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form class="form p-4" id="form">
                                <div class="form-group col-md-12">
                                    <label class="bg-light" for="ref">Referencia Del Producto</label>
                                    <input class="form-control" type="text" name="ref" id="ref">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="bg-light" for="name_prod">Nombre del Producto</label>
                                    <input class="form-control" type="text" name="name_prod" id="name_prod">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="bg-light" for="adm_date">Fecha de ingreso</label>
                                    <input class="form-control" type="text" name="adm_date" id="adm_date">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="bg-light" for="quantity">Cantidad</label>
                                    <input class="form-control" type="text" name="quantity" id="quantity">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="bg-light" for="price">Precio</label>
                                    <input class="form-control" type="text" name="price" id="price">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block text-center" value="Modificar" name="modificar" id="modificar">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/app.js"></script>
    <script src="js/pushbar.js"></script>
    <script>
        const pushbar= new Pushbar({
            overlay: true,
            blur: true
        });
    </script>
</body>
</html>