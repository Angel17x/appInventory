<?php

require("connect.php");

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
                
                if($_SESSION['sesion']=$_POST['loginname']){
                    echo "haz conectado satisfactoriamente";
                    }else{
                            echo "el usuario no existe en la base de datos";
                        $exec->closeCursor();
                    }
            }else{
                echo "no existe ese registro";
            $exec->closeCursor();

            }
        }catch(Exception $e){
            echo "error mensaje". $e->getMessage();
            echo "error linea". $e->getLine();
        }

