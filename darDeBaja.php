<?php
session_start();
require_once 'bbdd.php';
    if(isset($_POST["delete"])){
         darDeBaja($_SESSION["id"]);
    }else{
         header('Location:index.php');
    }
?>