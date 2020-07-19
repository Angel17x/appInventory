<?php require("connect.php");

    try{
    $id=$_GET['id'];
    $exec=$conn->query("DELETE FROM DATA_PROV WHERE ID='$id'");

        if($exec!=false){
            echo "proveedor eliminado exitosamente";
        }
    }catch(Exception $e){
        echo "error al ejecutar la consulta". $e->getMessage();
        echo "error linea: ".$e->getLine();
    }
?>
