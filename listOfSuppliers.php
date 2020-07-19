<?php require("connect.php");

    
    session_start();
    
    if(!isset($_SESSION['sesion']) && !isset($_SESSION['tiempo'])){
        header('location: index.php');
    }
    $time = 3600;
    $value_time = time()-$_SESSION['tiempo'];
    
    if($value_time>$time){

        header('location: logout.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APPINVENTORY - FERRETERIA EL GRAN MARTILLO</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="">
    <script src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="hidden" id="data_prov">
        <div id="preloader" class="preloader">
            <button class="btn btn-successs bg-success" style="border-radius:20px; width: 20rem; height: 5rem;" type="button" disabled>
                <span class="spinner-border spinner-border-sm" style="width: 2rem; height: 2rem;" role="status" aria-hidden="true"></span>
                <h5 class="text-primary">APPINVENTORYFGM</h5>
            </button>
        </div>

    <div class="pushbar bg-dark "  data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul class="list-group bg-dark">
                    <li><a class="btn btn-block btn-secondary active" href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <li></span><a class="btn btn-block btn-danger" href="listOfSuppliers.php"><span><i class="fas fa-user-tie"></i> Proveedores</a></li> 
                     <li></span><a class="btn btn-block btn-warning" href="#"><span><i class="fas fa-child"></i> Clientes</a></li> 
                     <li></span><a class="btn btn-block btn-info" href="data_Prod.php"><span><i class="fas fa-box"></i> Productos</a></li>
                     <li></span><a class="btn btn-block btn-dark" href="#"><span><i class="fas fa-warehouse"></i> Almacen</a></li>
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
                    </nav>
<!-------------------------------BOTON REGRESAR-------------------------------------------------------->                    
    
        <div class="row flex-row-reverse btn-contenedor position-fixed">
                <a class="col-12 btn btn-warning border-danger" href="appInventory.php">
                <span class="btn-regresar"><i class="fas fa-reply"></i></span>
                regresar
                </a>
            </div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-sm-center">            
            <div id="respuesta2" class="card-body">
                
            </div>        
        </div>
      </div>
    </div>
  </div>
</div>
   
    
        
        <!----------------------------RESPUESTA DESPUES DE MODIFICAR----------------------------------------------------------------->
<div id="modal-response">

</div>  
        <!---------------------------TABLA DE DATOS--------------------------------------->
         <div class="container">
         <div id="notRes" class="alert alert-danger p-3 mt-3" style="display: none;"></div>
             <div class="table-responsive">
            <table class="table table-borderess table-hover table-sm mt-2">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE COMERCIAL</th>
                        <th>NOMBRE FISCAL</th>
                        <th>GIRO COMERCIAL</th>
                        <th>DOMICILIO</th>
                        <th>TELEFONO</th>
                    </tr>
                </thead>
            <tbody id="task4" class="bg-light">
                 
            </tbody>
            </table>
            </div>
            </div>



<!----------------------------PIE DE PAGINA--------------------------------------------------------->
<footer>
            <div class="contenido">
                <div class="contenido">
                    <span><a class="color" href="index.php"><i class="fab fa-facebook-square"></i></a></span>
                    <span><a class="text-info" href="index.php"><i class="fab fa-twitter-square"></i></a></span>
                    <span><a class="text-danger" href="index.php"><i class="fab fa-pinterest-square"></i></a></span>
                    <span><a class="text-light" href="index.php"><i class="fab fa-instagram-square"></i></a></span>
                </div>
            </div>
            <div class="copy">
                    <h6><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Reserved - AppInventoryFGM</h6>
                </div>
            
        </footer>      
    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.4.0.0.min.js"></script>
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