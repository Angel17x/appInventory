<?php 
    require("connect.php");
    session_start();
    $sesion = $_SESSION['sesion'];
    try{
    
    $sql = "SELECT * FROM DATA_USER WHERE LOGINNAME = '$sesion'";
    $exec = $conn->prepare($sql);
    $exec->execute();
    $result=$exec->fetchAll(PDO::FETCH_OBJ);

    $JSON = array();
    foreach($result as $obj):
        $JSON[] = array(
            "name"=> $obj->NAME,
            "lastname"=> $obj->LASTNAME,
            "type_of_user"=>$obj->TYPE_OF_USER
        );
    endforeach;
    
    $resultjson=json_encode($JSON);
    echo $resultjson;




    }catch(Exception $e){
        echo "error al ejecutar la consulta, mensaje error: ".$e->getMessage();
        echo "error linea: ".$e->getLine();
    }
?>