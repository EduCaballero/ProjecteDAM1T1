<?php 

function agenda() {
	$connection = connect("proyecto");
	$result = mysqli_query($conenection, "select ");
	disconnect($connection);
    return $result;
}

function ranking() {
	$connection = connect("proyecto");
	$result = mysqli_query($conenection, "select ");
	disconnect($connection);
    return $result;
}

function connect($database) {
    $connection = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $connection;
}

function disconnect($connect) {
    mysqli_close($connection);
}
 ?>