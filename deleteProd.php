<?php require("connect.php");

    $id=$_GET['id'];
    $exec=$conn->query("DELETE FROM DATA_PROD WHERE ID='$id'");
    header("location: appInventory.php");
?>
