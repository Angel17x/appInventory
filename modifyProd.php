<?php

    require("connect.php");
    try{
        $id = $_POST['id'];
        $ref = $_POST['ref'];
        $name_prod = $_POST['name_prod'];
        $adm_date = $_POST['adm_date'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];

        if(empty($ref && $name_prod && $adm_date && $quantity && $price)){
            echo "no puedes enviar datos vacios porfavor completa los datos";
        }else{

            $sql = "UPDATE DATA_PROD SET REF = '$ref', NAME_PROD = '$name_prod', ADM_DATE = '$adm_date',
            QUANTITY = $quantity, PRICE = '$price' WHERE ID = $id";
            $exec=$conn->prepare($sql);
            $exec->execute();

                if($exec!=false){
                    echo "Modificacion Exitosa";
                }else{
                    echo "error al ejecutar la consulta";
                }
        }
    }catch(Exception $e){
        echo "error linea: ".$e->getLine();
        echo "error mensaje: ".$e->getMessage();
    }

?>