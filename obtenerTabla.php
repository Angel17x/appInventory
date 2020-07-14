<?php

    require("connect.php");

    try{
        $sql="SELECT * FROM DATA_PROD";
        $exec=$conn->prepare($sql);
        $exec->execute();

        $result=$exec->fetchAll(PDO::FETCH_OBJ);
        $JSON= array();
        foreach($result as $obj):
            
            $JSON[]=array(
                'id' => $obj->ID,
                'ref' => $obj->REF,
                'name_prod' => $obj->NAME_PROD,
                'adm_date' => $obj->ADM_DATE,
                'quantity' => $obj->QUANTITY,
                'price'=> $obj->PRICE
            );
        endforeach;

        $jsonResult = json_encode($JSON);
        echo $jsonResult;

    }catch(Exception $e){
        echo "error al ejecutar la consulta". $e->getLine();
        echo $e->getMessage();
    }
?>