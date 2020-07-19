<?php
session_start();
if(!$_SESSION['sesion']){
    session_destroy();
    header("location: index.php");
}else if(isset($_POST['id'])){
    $id = $_POST['id'];
    try{
        require("connect.php");
        $sql="SELECT * FROM DATA_PROV WHERE ID = $id";
        $exec=$conn->prepare($sql);
        $exec->execute();

        $result=$exec->fetchAll(PDO::FETCH_OBJ);
        $JSON=array();
        foreach($result as $obj):
            $JSON[]=array(
                "id"=> $obj->ID,
                "tradename"=> $obj->TRADENAME,
                "fiscal_name"=> $obj->FISCAL_NAME,
                "comercial_business"=> $obj->COMERCIAL_BUSINESS,
                "domicilie"=> $obj->DOMICILIE,
                "telephone"=> $obj->TELEPHONE
            );
        endforeach;

        $jsonresult2 = json_encode($JSON);
        echo $jsonresult2;

    }catch(Exception $e){
        echo "error al ejecutar la consulta". $e->getMessage();
    }   


    }else{
        try{
            require("connect.php");
            $sql="SELECT * FROM DATA_PROV";
            $exec=$conn->prepare($sql);
            $exec->execute();

            $result=$exec->fetchAll(PDO::FETCH_OBJ);
            $JSON=array();
            foreach($result as $obj):
                $JSON[]=array(
                    "id"=> $obj->ID,
                    "tradename"=> $obj->TRADENAME,
                    "fiscal_name"=> $obj->FISCAL_NAME,
                    "comercial_business"=> $obj->COMERCIAL_BUSINESS,
                    "domicilie"=> $obj->DOMICILIE,
                    "telephone"=> $obj->TELEPHONE
                );
            endforeach;

            $jsonresult2 = json_encode($JSON);
            echo $jsonresult2;

        }catch(Exception $e){
            echo "error al ejecutar la consulta". $e->getMessage();
        }   
    
}

?>