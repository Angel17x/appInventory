<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify User</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font.google.css">
    <script src="js/all.min.js"></script>
</head>
<body>
<?php

    session_start();
    require("connect.php");
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

    if(!isset($_SESSION['sesion'])){
        header("location: index.php");
    }else{
    
    $id=$_GET['id'];
    try{
        $sql="SELECT * FROM DATA_PROD WHERE ID=$id";
        $exec=$conn->prepare($sql);
        $exec->execute();
        $result=$exec->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $obj):
?>

    <form class="form" action="validarInfo.php" method="get">
        <h3>ID</h3>
        <input type="text" name="id2" value="<?php echo $obj->ID?>">
        <h3>Nombre Producto</h3>
        <input type="text" value="<?php echo $obj->NAME_PROD?>" placeholder="aqui tu nombre..." name="name2"><span><i class="fas fa-file-signature"></i></span>
        <h3>Fecha De Ingreso</h3>
        <input type="text" value="<?php echo $obj->ADM_DATE?>" placeholder="Fecha..." name="datetime"><span><i class="fas fa-file-signature"></i></span>
        <h3>Cantidad</h3>
        <input type="text" value="<?php echo $obj->QUANTITY?>" placeholder="Cantidad..." name="quantity"><span><i class="fas fa-user-friends"></i></span>
        <h3>Precio</h3>
        <input type="text" value="<?php echo $obj->PRICE?>" placeholder="aqui tu precio" name="price"><span><i class="fas fa-lock"></i></span>
        <input class="btn btn-primary" type="submit" value="Modificar" name="modificar">
        <a href="appInventory.php">Regresar</a>
    </form>
    
<?php

            endforeach;
        }catch(Exception $e){
            echo "error al ejecutar la consulta: ".$e->getMessage();
        }
    }
?>

</body>
</html>