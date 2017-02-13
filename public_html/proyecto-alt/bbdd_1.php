<?php 

//Fans Tabla 1
function selectTabla1Fans() {
    $con = conectar("proyecto");
    $select = "select concierto.dia, concierto.hora, ciudad.nombre, loc.nombre as local, music.nombre as musico, count(*) as votos from concierto
inner join propuesta on propuesta.concierto=concierto.id_concierto
inner join usuario as loc on concierto.local=loc.id_usuario
inner join usuario as music on propuesta.musico = music.id_usuario
inner join ciudad on loc.ciudad=ciudad.id_ciudad
join voto_concierto on voto_concierto.concierto=concierto.id_concierto
where propuesta.aceptado = 1
group by voto_concierto.concierto,concierto.dia, concierto.hora, ciudad.nombre, loc.nombre, music.nombre
";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    desconectar($con);
    // devolvemos el resultado
    return $resultado;
}

//CONEXION BBDD
function connect($database) {
    $connection = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $connection;
}

function disconnect($connect) {
    mysqli_close($connection);
}
 ?>