<?php require("connect.php");

    session_start();

    if(!isset($_SESSION['sesion'])){
        session_destroy();
        header('location: index.php');
    }else if($_SESSION['sesion']!="admin"){
        session_destroy();
        header('location: index.php');
    }else{
        try{
        $sql="SELECT * FROM DATA_USER WHERE LOGINNAME= :names";
        $exec=$conn->prepare($sql);
        $exec->execute(array("names"=>"$_SESSION[sesion]"));
        $result=$exec->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $fila2):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido A AppInventory</title>
    <link rel="stylesheet" href="css/estilos2.css">
    <link rel="stylesheet" href="css/font.google.css">
    <link rel="stylesheet" href="css/pushbar.css">
    <script src="js/all.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav>
        <div class="pushbar contenedor" data-pushbar-id="mypushbar1" data-pushbar-direction="left">
                <ul>
                    <li><a href="adminUsers.php"><span><i class="fas fa-home"></i></span> Main</a></li>
                    <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR_USUARIOS"){?>
                    <li></span><a href="register.php"><span><i class="fas fa-folder-plus"></i> Registrar</a></li>
                    <?php } ?>
                    <li class="footer"><a href="logout.php"><span><i class="fas fa-sign-out-alt"></i></span> Cerrar Sesion</a></li>
                </ul>
            </div>
            <div class="menu">
                <span><a data-pushbar-target="mypushbar1"><i class="fas fa-stream"></i></a></span>
                <div class="titulo">
                <!--<h3>USUARIO</h3>-->
                <?php echo "<h5>ADMINISTRADOR DE USUARIOS</h5>";
                    endforeach; $exec->closeCursor();  ?></h5>
                </div>
                <div class="user">
                    <img src="img/user.jpg" alt="">
                </div>
            </div>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>NOMBRE DE USUARIO</th>
                <th>CONTRASEÑA</th>
                <th>TIPO DE USUARIO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
        
    
            $exec2=$conn->query("SELECT * FROM DATA_USER ORDER BY ID ASC")->fetchAll(PDO::FETCH_OBJ);
            $nro=1;
                    foreach($exec2 as $fila):
            ?>
            <?php if($fila2->TYPE_OF_USER=="ADMINISTRADOR_USUARIOS"){?>
            <tr>
                <td> <?php echo $nro ?></td>
                <td><input type="text" value="<?php echo $fila->NAME ?>"></td>
                <td><input type="text" value="<?php echo $fila->LASTNAME ?>"></td>
                <td><input type="text" value="<?php echo $fila->LOGINNAME ?>"></td>
                <td><input type="text" value="<?php echo $fila->PASS ?>"></td>
                <td><input type="text" value="<?php echo $fila->TYPE_OF_USER ?>"></td>
                <td><button class="btn btn-info modi" id="modificar" href="#">Modificar</button></td>
                <td><button class="btn btn-danger eli" id="delete" href="#">Eliminar</button></td>
                <?php } ?>
            </tr>
            <?php
            $nro++;
        endforeach;
        $conn=null;
    }catch(Exception $e){
        echo "error mensaje: ". $e->getMessage();
        echo "error linea codigo: ". $e->getLine();
    }
}
    ?>
        </tbody>
    </table>
    <div class="coninfo" id="coninfo">
    </div>
    <div id="ajax">

    </div>
    
    <script src="js/pushbar.js"></script>
    <script>
        const pushbar= new Pushbar({
            overlay: true,
            blur: true
        });
    </script>
    <script>

document.querySelector("#delete").addEventlistener("click", confirmDelete);
function confirmDelete(){
    let x=confirm("deseas eliminar a este usuario?");
    if(x){
        return true;
    }else{
        return false;
    }
}

   

</script>
</body>
</html>