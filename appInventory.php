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
    <div class="pushbar bg-dark "  data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul class="list-group bg-dark">
                    <li><a class="btn btn-block btn-secondary href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                     <li></span><a class="btn btn-block btn-secondary "href="#"><span><i class="fas fa-arrow-alt-circle-right"></i> Carga</a></li>
                     <li></span><a class="btn btn-block btn-secondary "href="#"><span><i class="fas fa-arrow-alt-circle-left"></i> Descarga</a></li>
                     <li></span><a class="btn btn-block btn-secondary "href="#"><span><i class="fas fa-people-carry"></i> Traslado</a></li>
                     <li></span><a class="btn btn-block btn-secondary "href="#"><span><i class="fas fa-warehouse"></i> Proveedores</a></li> 
                     <li></span><a class="btn btn-block btn-secondary "href="#"><span><i class="fas fa-warehouse"></i> Clientes</a></li> 
                    <li><a class="btn btn-block btn-secondary" href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                    <h5 class="btn btn-block btn-secondary active">Usuario <?php echo $_SESSION['sesion']?></h5>
                </ul>
            </div>
        
                    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid justify-content-sm-between">
                <span class="navbar-header mt-2 col-md-4 col-12 col-sm-4" style="font-size: 35px; color: white;"><a data-pushbar-target="mypushbar1"><i class="fas fa-stream"></i></a></span>
                <div class="navbar-brand col-lg-4 col-md-4 col-12 col-sm-4 bg-light flex-lg-row-reverse">
                <h5 class="mt-3" id="titulo"></h5><!--------TITULO DE USUARIO------------->
                </div>
                </div>
                <ul class="navbar-nav ml-auto col-12 col-md-12 col-sm-12 col-lg-2 flex-lg-row-reverse">
                    <form class="form-inline my-2 my-lg-0">
                        <input type="search" id="search" class="form-control mr-sm-2"
                        placeholder="Buscar Producto">
                        </button>
                    </form>
                </ul>
                    </nav>


            <div id="contenedor-md" class="container-fluid mt-5" style='display:none'>
                <div class="row justify-content-sm-center">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div id="respuesta" class="card-body">
                            
                        </div>
                    </div>
                    </div>
                </div>
            </div>

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