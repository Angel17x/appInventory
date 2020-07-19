<?php

    require("connect.php");
    session_start();
    if(!isset($_SESSION['sesion'])){
        session_destroy();
        header("location: index.php");

    }

    if(isset($_POST['id'])){

        $id = $_POST['id'];
        try{
            $sql="SELECT * FROM DATA_PROD WHERE ID = $id";
            $exec=$conn->prepare($sql);
            $exec->execute();
    
            $result=$exec->fetchAll(PDO::FETCH_OBJ);
            $JSON= array();
            foreach($result as $obj):
                
                $JSON[] = array(
                    'id' => $obj->ID,
                    'ref' => $obj->REF,
                    'name_prod' => $obj->NAME_PROD,
                    'adm_date' => $obj->ADM_DATE,
                    'quantity' => $obj->QUANTITY,
                    'price'=> $obj->PRICE,
                    'price_2'=> $obj->PRICE_2,
                    'price_3'=> $obj->PRICE_3,
                    'warehouse'=> $obj->WAREHOUSE
                );
            endforeach;
    
            $jsonResult = json_encode($JSON);
            echo $jsonResult;
    
        }catch(Exception $e){
            echo "error al ejecutar la consulta". $e->getLine();
            echo $e->getMessage();
        }
    }else if(!empty($_POST['search'])){

        $search = $_POST['search'];
        try{
            $sql = "SELECT * FROM DATA_PROD WHERE NAME_PROD LIKE '$search%'";
            $exec = $conn->prepare($sql);
            $exec->execute();

            if(!$exec){
                echo "no se encuentra tu busqueda";
                
            }else{
            $result = $exec->fetchAll(PDO::FETCH_OBJ);
            
            $JSON = array();

            foreach($result as $obj):
                $JSON[] = array(
                    'id' => $obj->ID,
                    'ref' => $obj->REF,
                    'name_prod' => $obj->NAME_PROD,
                    'adm_date' => $obj->ADM_DATE,
                    'quantity' => $obj->QUANTITY,
                    'price'=> $obj->PRICE,
                    'price_2'=> $obj->PRICE_2,
                    'price_3'=> $obj->PRICE_3,
                    'warehouse'=> $obj->WAREHOUSE
                );
            endforeach;

           $jsonresult = json_encode($JSON);
           echo $jsonresult;
            }
        }catch(Exception $e){
            echo "error de consulta: ".$e->getLine();
        }
    }
    else{
        
        try{
            $sql="SELECT * FROM DATA_PROD";
            $exec=$conn->prepare($sql);
            $exec->execute();
    
            $result=$exec->fetchAll(PDO::FETCH_OBJ);
            $JSON= array();
            foreach($result as $obj):
                
                $JSON[] = array(
                    'id' => $obj->ID,
                    'ref' => $obj->REF,
                    'name_prod' => $obj->NAME_PROD,
                    'adm_date' => $obj->ADM_DATE,
                    'quantity' => $obj->QUANTITY,
                    'price'=> $obj->PRICE,
                    'price_2'=> $obj->PRICE_2,
                    'price_3'=> $obj->PRICE_3,
                    'warehouse'=> $obj->WAREHOUSE
                );
            endforeach;
    
            $jsonResult = json_encode($JSON);
            echo $jsonResult;
    
        }catch(Exception $e){
            echo "error al ejecutar la consulta". $e->getLine();
            echo $e->getMessage();
        }
    }

    if(isset($_GET['prov'])){
        echo "proveedores";
    }
?>