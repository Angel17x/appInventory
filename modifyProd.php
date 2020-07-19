<?php

    require("connect.php");
    try{
        $id = $_POST['id'];
        $ref = $_POST['ref'];
        $name_prod = ucwords($_POST['name_prod']);
        $adm_date = $_POST['adm_date'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $price_2 = $_POST['price2'];
        $price_3 = $_POST['price3'];
        $warehouse = $_POST['warehouse'];

        if(empty($ref && $name_prod && $adm_date && $quantity && $price && $price_2 && $price_3 && $warehouse)){
            echo "no puedes enviar datos vacios porfavor completa los datos";
        }else{

            $sql = "UPDATE DATA_PROD SET REF = '$ref', NAME_PROD = '$name_prod', ADM_DATE = '$adm_date',
            QUANTITY = $quantity, PRICE = '$price', PRICE_2 = '$price_2', PRICE_3 = '$price_3',
            WAREHOUSE = '$warehouse' WHERE ID = $id";

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