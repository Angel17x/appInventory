<?php

    require("connect.php");
    try{
        $id = $_POST['id'];

        $tradename = $_POST['tradename'];
        $fiscalname = ucwords($_POST['fiscalname']);
        $comercial_business = $_POST['comercial_business'];
        $domicilie = $_POST['domicilie'];
        $telephone = $_POST['telephone'];

        if(empty($id  && $tradename && $fiscalname && $comercial_business && $domicilie && $telephone)){
            echo "no puedes enviar datos vacios porfavor completa los datos";
        }else{

            $sql = "UPDATE DATA_PROV SET TRADENAME = '$tradename', 
            FISCAL_NAME = '$fiscalname', COMERCIAL_BUSINESS = '$comercial_business',
            DOMICILIE = '$domicilie', TELEPHONE = '$telephone' WHERE ID = $id";

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