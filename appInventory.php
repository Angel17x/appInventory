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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido A AppInventory</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/font.google.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <script src="js/all.min.js"></script>
</head>
<body>
    <header>
        <nav>
        <div class="pushbar contenedor" data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul>
                    <li><a href="appInventory.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR"){?>

                    <li></span><a href="register.php"><span><i class="fas fa-folder-plus"></i> Registrar</a></li>
                     <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-right"></i> Carga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-arrow-alt-circle-left"></i> Descarga</a></li>
                     <li></span><a href="#"><span><i class="fas fa-people-carry"></i> Traslado</a></li>
                     <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li>
                     <?php } ?>
                    <?php if($fila2->TYPE_OF_USER=="USUARIO"){?>
                    <li></span><a href="#"><span><i class="fas fa-warehouse"></i> Consultar</a></li> 
                    <?php } ?>
                    <li class="footer"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                    <h3>USUARIO <?php echo $_SESSION['sesion']?></h3>
                </ul>
            </div>
            <div class="menu">
                <span><a data-pushbar-target="mypushbar1"><i class="fas fa-stream"></i></a></span>
                <div class="user">
                    <img src="img/user.jpg" alt="">
                </div>

                <div class="titulo">
                <!--<h3>USUARIO</h3>-->
                <h3><?php echo $fila2->NAME. " " . $fila2->LASTNAME. "</br>";   
                        echo $fila2->TYPE_OF_USER;
                    endforeach; $exec->closeCursor();  ?></h3>
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

                    foreach($exec2 as $fila):
            ?>
            <tr>
                <td><?php echo $fila->ID ?></td>
                <td><?php echo $fila->REF ?></td>
                <td><?php echo $fila->NAME_PROD ?></td>
                <td><?php echo $fila->ADM_DATE ?></td>
                <td><?php echo $fila->QUANTITY ?></td>
                <td><?php echo $fila->PRICE ?></td>
                <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR"){?>
                <td><a class="modi" id="modificar" href="modifyProd.php?id=<?php echo $fila->ID?>">Modificar</a></td>
                <td><a class="eli" id="delete" href="deleteProd.php?id=<?php echo $fila->ID ?>">Eliminar</a></td>
                <?php } ?>
            </tr>
            <?php
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
    <script>

document.querySelector("#delete").addEventlistener("click", confirmDelete);
function confirmDelete(){
    let x=confirm("deseas eliminar a este usuario?");
    if(x){
        return true;
    }else{
        return false;
    }
}

   

</script>
</body>
</html>