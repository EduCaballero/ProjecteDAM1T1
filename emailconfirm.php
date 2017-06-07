<?php
require_once 'bbdd.php';
$mail = $_GET['mail'];
$code = $_GET['code'];

$codigo_veri = verificarCodigo($mail);

if ($codigo_veri == $code) {
    cuentaVerificada($mail);
    header('Location:index.php');
}else{
    echo "No se ha podido verificar la cuenta";
}
?>