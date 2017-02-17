<?php 

//Musicos Tabla 1
function MusicoPendienteAsignar() {
    $con = connect("db4959381_proyecto");
    $select = "select concierto.dia, concierto.hora, ciudad.nombre as ciudad, usuario.nombre as local, 
genero.nombre as genero, concierto.pago, count(*) as inscritos
from propuesta
join concierto on propuesta.concierto=concierto.id_concierto
join usuario on concierto.local=usuario.id_usuario
join ciudad on usuario.ciudad=ciudad.id_ciudad
join genero on concierto.genero=genero.id_genero
where concierto.asignado = 0
group by concierto.dia, concierto.hora, ciudad.nombre, propuesta.concierto, usuario.nombre, genero.nombre, concierto.pago
order by concierto.dia asc limit 7
";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    disconnect($con);
    // devolvemos el resultado
    return $resultado;
}

//Musicos Tabla 2
function MusicoAsignado() {
    $con = connect("db4959381_proyecto");
    $select = "select concierto.dia, concierto.hora, ciudad.nombre as ciudad, usuario.nombre as loc, local.direccion, concierto.pago
from concierto
join usuario on usuario.id_usuario = concierto.local
join ciudad on usuario.ciudad=ciudad.id_ciudad
join local on local.id_local = usuario.id_usuario
join propuesta on propuesta.concierto=concierto.id_concierto
where propuesta.aceptado = 1 and propuesta.musico = 3 limit 7
";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    disconnect($con);
    // devolvemos el resultado
    return $resultado;
}

//Fans Tabla 1
function FanVotaConciertos() {
    $con = connect("db4959381_proyecto");
    $select = "select concierto.dia, concierto.hora, ciudad.nombre, loc.nombre as local, music.nombre as musico, count(*) as votos 
from concierto
inner join propuesta on propuesta.concierto=concierto.id_concierto
inner join usuario as loc on concierto.local=loc.id_usuario
inner join usuario as music on propuesta.musico = music.id_usuario
inner join ciudad on loc.ciudad=ciudad.id_ciudad
join voto_concierto on voto_concierto.concierto=concierto.id_concierto
where propuesta.aceptado = 1
group by voto_concierto.concierto,concierto.dia, concierto.hora, ciudad.nombre, loc.nombre, music.nombre
ORDER BY dia ASC LIMIT 5
";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    disconnect($con);
    // devolvemos el resultado
    return $resultado;
}


//Fans Tabla 2
function FanVotaMusicos() {
    $con = connect("db4959381_proyecto");
    $select = "select usuario.imagen, usuario.nombre, genero.nombre as genero, count(*) as votos
from musico
inner join genero on genero.id_genero=musico.genero
inner join usuario on usuario.id_usuario=musico.id_musico
left join voto_musico on voto_musico.musico=usuario.id_usuario
group by usuario.imagen, voto_musico.musico, usuario.nombre, genero.nombre
order by votos desc limit 7
";
    // Ejecutamos la consulta y recogemos el resultado
    $resultado = mysqli_query($con, $select);
    disconnect($con);
    // devolvemos el resultado
    return $resultado;
}

//CONEXION BBDD
function connect($database) {
    $con = mysqli_connect("mysql131int.srv-hostalia.com", "u4959381_dam1t1", "1j/g1~aU@Zc;WFOx", $database)
            or die("No se ha podido conectar a la BBDD");
    mysqli_set_charset($con,"utf8");        
    return $con;
}

function disconnect($connect) {
    mysqli_close($connect);
}
 ?>