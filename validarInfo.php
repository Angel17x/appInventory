<?php

require("connect.php");
    if(isset($_POST['entrar'])){
        try{

            $sql=("SELECT * FROM data_user WHERE LOGINNAME= :user AND PASS= :pass");
            $user=htmlentities(addslashes($_POST['loginname']));
            $pass=htmlentities(addslashes($_POST['password']));
            $exec=$conn->prepare($sql);
            $exec->bindValue(':user', $user);
            $exec->bindValue(':pass',$pass);
            $exec->execute();
            $nroreg=$exec->rowCount();

            if($nroreg!=0){
                session_start();

                $_SESSION['sesion']=$_POST['loginname'];
                if($user=="admin"){
                    header('location: adminUsers.php');
                    }else if($_SESSION['sesion']=$_POST['loginname']){
                    header('location: appInventory.php');
                        }else{
                        $exec->closeCursor();
                        header('location: index.php'); 
                        }
            }else{
            $exec->closeCursor();
            header('location: index.php'); 
            }
        }catch(Exception $e){
            echo "error mensaje". $e->getMessage();
            echo "error linea". $e->getLine();
        }
    }

    if(isset($_POST['registrar'])){

        $ref=strtolower($_POST['ref']);
        $name=strtolower($_POST['name_prod']);
        $datetime=strtolower($_POST['datetime']);
        $quantity=$_POST['quantity'];
        $price=$_POST['price'];
        $encrypt=password_hash($pass, PASSWORD_DEFAULT);

        try{
            if(empty($name && $datetime && $quantity && $price)){
                echo "<script>alert('debes completar todos los campos')</script>";
            }else{
            $sql="INSERT INTO DATA_PROD (REF ,NAME_PROD, ADM_DATE, QUANTITY, PRICE) VALUES ('$ref','$name', '$datetime'
            ,'$quantity','$price')";
            $exec=$conn->prepare($sql);
            $exec->execute();

            if($exec==true){

                header("location: appInventory.php");
            }
            }
        }catch(Exception $e){

            echo "error mensaje: ". $e->getMessage();
            echo "error linea: ". $e->getLine();

        }
    }


    if(isset($_GET['modificar'])){

        $id2=$_GET['id2'];
        $name2=$_GET['name2'];
        $datetime=$_GET['datetime'];
        $quantity=$_GET['quantity'];
        $price=$_GET['price'];
        $encrypt2=password_hash($pass2, PASSWORD_DEFAULT);

        
        try{

            $sql="UPDATE DATA_PROD SET NAME_PROD='$name2', ADM_DATE='$datetime', QUANTITY='$quantity',
            PRICE='$price' WHERE ID='$id2'";
            $exec=$conn->prepare($sql);
            $exec->execute();
            if($exec){
                header('location:appInventory.php');
            }

           

        }catch(Exception $e){
            echo "error mensaje: ".$e->getMessage();
            echo "error linea codigo: ".$e->getCode(); 
        }
    }


?>