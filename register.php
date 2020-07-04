<?php 

    require("connect.php");
    session_start();
    if(!isset($_SESSION['sesion'])){

        header("location: index.php");
    }
    try{
    $sql="SELECT * FROM DATA_USER WHERE LOGINNAME= :names";
        $exec=$conn->prepare($sql);
        $exec->execute(array("names"=>"$_SESSION[sesion]"));
        $result=$exec->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $fila2):
            $fila2->TYPE_OF_USER;
        endforeach;

        if($fila2->TYPE_OF_USER=="USUARIO"){
            header("location: appInventory.php");
        }

        $exec->closeCursor();
    }catch(Exception $e){
        echo "error en consulta: error mesaje ". $e->getMessage();
    }
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
                <li><a href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <li></span><a href="register.php"><span><i class="fas fa-folder-plus"></i> Registrar Producto</a></li>
                    <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-right"></i> Carga</a></li>
                    <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-left"></i> Descarga</a></li>
                    <li></span><a href="#"><span><i class="fas fa-people-carry"></i> Traslado</a></li>
                    <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li>
                    <li class="footer"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Logout</a></li>
                </ul>
            </div>
            <div class="menu">
                <span><a data-pushbar-target="mypushbar1"><i class="fas fa-bars"></i></a></span>
            </div>
            <ul>
                <li><a href="#footer"><span><i class="fas fa-receipt"></i></span> Contact</a></li>
            </ul>
        </nav>
    </header>
    <form class="form" action="validarInfo.php" method="post">
        <h3>Referencia</h3>
        <input type="text" placeholder="aqui tu referencia..." name="ref"><span><i class="fas fa-file-signature"></i></span>
        <h3>Nombre Producto</h3>
        <input type="text" placeholder="aqui tu nombre..." name="name_prod"><span><i class="fas fa-file-signature"></i></span>
        <h3>Fecha De Ingreso</h3>
        <input type="text" placeholder="Fecha..." name="datetime"><span><i class="fas fa-file-signature"></i></span>
        <h3>Cantidad</h3>
        <input type="text" placeholder="Cantidad..." name="quantity"><span><i class="fas fa-user-friends"></i></span>
        <h3>Precio</h3>
        <input type="text"  placeholder="aqui tu precio" name="price"><span><i class="fas fa-lock"></i></span>
        <input type="submit" value="Registrar" name="registrar">
        <a href="appInventory.php">Regresar a appInventory</a>
    </form>
    <script src="js/pushbar.js"></script>
    <script>
        const pushbar= new Pushbar({
            overlay: true,
            blur: true
        });
    </script>
</body>
</html>