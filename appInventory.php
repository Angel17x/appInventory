<?php require("connect.php");

    session_start();

    if(!isset($_SESSION['sesion'])){
        header('location: index.php');
    }else{
        try{
        $sql="SELECT * FROM DATA_USER WHERE LOGINNAME= :names";
        $exec=$conn->prepare($sql);
        $exec->execute(array("names"=>"$_SESSION[sesion]"));
        $result=$exec->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $fila2):
            
        
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido A AppInventory</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/font.google.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <script src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav>
        <div class="pushbar contenedor" data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul>
                    <li><a href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR"){?>

                    <li></span><a href="register.php"><span><i class="fas fa-folder-plus"></i> Registrar</a></li>
                     <li></span><a href="cargar.php"><span><i class="fas fa-arrow-alt-circle-right"></i> Carga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-left"></i> Descarga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-people-carry"></i> Traslado</a></li>
                     <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li>
                     <?php } ?>
                    <?php if($fila2->TYPE_OF_USER=="USUARIO"){?>
                    <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li> 
                    <?php } ?>
                    <li class="footer"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                    <h5 class="title-mg">Usuario <?php echo $_SESSION['sesion']?></h5>
                </ul>
            </div>
            <div class="menu">
                <span><a data-pushbar-target="mypushbar1"><i class="fas fa-stream"></i></a></span>
                <div class="titulo">
                <!--<h3>USUARIO</h3>-->
                <h6 class="title-mg"><?php echo $fila2->NAME. " " . $fila2->LASTNAME. "</br>";   
                        echo $fila2->TYPE_OF_USER;
                    endforeach; $exec->closeCursor();  ?></h6>
                </div>
                <div class="user">
                    <img src="img/user.jpg" alt="">
                </div>
            </div>
        </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>REFERENCIA</th>
                <th>PRODUCTO</th>
                <th>FECHA</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
        
    
            $exec2=$conn->query("SELECT * FROM DATA_PROD ORDER BY ID ASC")->fetchAll(PDO::FETCH_OBJ);
            $nro=1;
                    foreach($exec2 as $fila):
            ?>
            <tr>
                <td class=""><?php echo $nro ?></td>
                <td><?php echo $fila->REF ?></td>
                <td><?php echo $fila->NAME_PROD ?></td>
                <td><?php echo $fila->ADM_DATE ?></td>
                <td><?php echo $fila->QUANTITY ?></td>
                <td><?php echo $fila->PRICE ?></td>
                <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR"){?>
                <td class=""><button class="btn btn-warning modi" id="modificar" href="modifyProd.php?id=<?php echo $fila->ID?>">Modificar</button></td>
                <td class=""><button class="btn btn-danger eli" id="delete" href="deleteProd.php?id=<?php echo $fila->ID ?>">Eliminar</button></td>
                <?php } ?>
            </tr>
            <?php
            $nro++;
        endforeach;
        $conn=null;
    }catch(Exception $e){
        echo "error mensaje: ". $e->getMessage();
        echo "error linea codigo: ". $e->getLine();
    }
}
    ?>
        </tbody>
    </table>
    <div class="coninfo" id="coninfo">
    </div>
    <div id="ajax">

    </div>
    
    <script src="js/pushbar.js"></script>
    <script>
        const pushbar= new Pushbar({
            overlay: true,
            blur: true
        });
    </script>
   <script src="js/api.js"></script>
</body>
</html>