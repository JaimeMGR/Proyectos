<?php
    session_start();

    if($_POST["username"]=="admin" && $_POST["password"]=="admin"){
        $_SESSION["nombre"]=$_POST["username"];
        $_SESSION["tipo"]="admin";
    }else{
        $_SESSION["nombre"]=$_POST["username"];
        $_SESSION["tipo"]="normal";
    }
    

    header("Location:$_POST[origen]");
?>