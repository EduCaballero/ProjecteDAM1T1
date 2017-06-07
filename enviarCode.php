<?php
require_once 'bbdd.php';
$mail = $_GET["mail"];
$verificado = verificacion($mail);
$codigo = selectCode($mail);
if($codigo!=1){
    enviarMail($mail,$codigo);
    header('Location:index.php');
}else echo'Ya has verificado tu cuenta';
?>