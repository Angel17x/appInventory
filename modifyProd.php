<?php
    require("connect.php");
    
    if(!isset($_SESSION['sesion'])){
        header("location: index.php");
    }else{

    try{
        $sql="SELECT * FROM DATA_PROD WHERE ID=$id";
        $exec=$conn->prepare($sql);
        $exec->execute();
        $result=$exec->fetchAll(PDO::FETCH_OBJ);

        foreach($result as $obj):
?>
    <div class="contenedor-mody" id="modify">
    <form id="form" class="form" action="validarInfo.php" method="get">
        <h3>ID</h3>
        <input type="text" name="id2">
        <h3>Nombre Producto</h3>
        <input type="text"  placeholder="aqui tu nombre..." name="name2"><span><i class="fas fa-file-signature"></i></span>
        <h3>Fecha De Ingreso</h3>
        <input type="text" placeholder="Fecha..." name="datetime"><span><i class="fas fa-file-signature"></i></span>
        <h3>Cantidad</h3>
        <input type="text" placeholder="Cantidad..." name="quantity"><span><i class="fas fa-user-friends"></i></span>
        <h3>Precio</h3>
        <input type="text"  placeholder="aqui tu precio" name="price"><span><i class="fas fa-lock"></i></span>
        <input class="btn btn-primary" type="submit" value="Modificar" name="modificar1">
        <a class="btn btn-danger" id="reg">Regresar</a>
    </form>
    </div>
<?php

            endforeach;
        }catch(Exception $e){
            echo "error al ejecutar la consulta: ".$e->getMessage();
        }
    }
?>

