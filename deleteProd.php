<?php require("connect.php");

    try{
    $id=$_GET['id'];
    $exec=$conn->query("DELETE FROM DATA_PROD WHERE ID='$id'");

        if($exec!=false){
            echo "producto eliminado";
        }
    }catch(Exception $e){
        echo "error al ejecutar la consulta". $e->getMessage();
        echo "error linea: ".$e->getLine();
    }
?>
