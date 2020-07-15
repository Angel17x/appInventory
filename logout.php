<?php
    require("connect.php");

    session_start();
    session_destroy();
    $conn = null;
    header("location: index.php");
?>