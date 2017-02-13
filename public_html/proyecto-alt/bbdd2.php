<?php

function connect($database) {
    $connection = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $connection;
}

function disconnect($connect) {
    mysqli_close($connection);
}

 ?>
