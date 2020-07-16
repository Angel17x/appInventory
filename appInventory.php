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
    <title>APPINVENTORY - FERRETERIA EL GRAN MARTILLO</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <link rel="stylesheet" href="">
    <script src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="hidden">
        <div id="preloader" class="preloader">
            <button class="btn btn-successs bg-success" style="border-radius:20px; width: 20rem; height: 5rem;" type="button" disabled>
                <span class="spinner-border spinner-border-sm" style="width: 2rem; height: 2rem;" role="status" aria-hidden="true"></span>
                <h5 class="text-primary">APPINVENTORYFGM</h5>
            </button>
        </div>

    <div class="pushbar bg-dark "  data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul class="list-group bg-dark">
                    <li><a class="btn btn-block btn-secondary active"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <li></span><a class="btn btn-block btn-danger "href="#"><span><i class="fas fa-user-tie"></i> Proveedores</a></li> 
                     <li></span><a class="btn btn-block btn-warning"href="#"><span><i class="fas fa-child"></i> Clientes</a></li> 
                     <li></span><a class="btn btn-block btn-info"href="#"><span><i class="fas fa-box"></i> Productos</a></li>
                     <li></span><a class="btn btn-block btn-dark "href="#"><span><i class="fas fa-warehouse"></i> Almacen</a></li>
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
                    </form>
                </ul>
                    </nav>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row justify-content-sm-center">            
            <div id="respuesta" class="card-body">
                
            </div>        
        </div>
      </div>
    </div>
  </div>
</div>
      
     <!------------------------CONTENEDOR DE OPCIONES--------------------------------------->       
    <div class="container mt-5">
        <div class="row justify-content-lg-center justify-content-md-center" >
            <button class="btn btn-danger col-lg-3 col-md-4 col-sm-12 m-1 p-5">
                <h5 class="text-light">Proveedores</h5>
            </button>
            
            <button class="btn btn-warning col-lg-3 col-md-4 col-sm-12 m-1 p-5">
                <h5 class="text-light">Clientes</h5>
            </button>
            <button class="btn btn-info col-lg-3 col-md-4 col-sm-12 m-1 p-5">
                <h5 class="text-light">Productos</h5>  
            </button>
            <button class="btn btn-dark col-lg-3 col-md-4 col-sm-12 m-1 p-5">
                <h5 class="text-light">Almacen</h5>
            </button>
            <button class="btn btn-secondary col-lg-3 col-md-4 col-sm-12 m-1 p-5">
                <h5 class="text-dark">Otros</h5>
            </button>
        </div>
        </div>
        <!-----------------------------CONTENEDOR DE INFORMACION--------------------------------------------------->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="card col-lg-5 m-1 p-2">
                <div class="card-header">
                    Productos mas vendidos
                </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5><span><i class="fas fa-chart-bar"></i></span> Titulo</h5>
                        </div>
                        <div class="card-text p-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Fuga, tempora mollitia! Veritatis distinctio quis, dolorem 
                            minima at obcaecati doloribus atque? asdaw.
                        </div>
                    </div>
                </div>
                <div class="card col-lg-5 m-1 p-2">
                <div class="card-header">
                    Productos recien agregados
                </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h5><span><i class="fas fa-chart-bar"></i></span> Titulo</h5>
                        </div>
                        <div class="card-text p-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Fuga, tempora mollitia! Veritatis distinctio quis, dolorem 
                            minima at obcaecati doloribus atque? asdaw.
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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