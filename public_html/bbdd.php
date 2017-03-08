<?php 

function agenda() {
	$con = connect("db4959381_proyecto");
	$select = "select concierto.dia, local.nombre as local, musico.nombre as musico
		  	   from concierto
			   inner join usuario as local on concierto.local = local.id_usuario
			   inner join propuesta on propuesta.concierto = concierto.id_concierto
			   inner join usuario as musico on propuesta.musico = musico.id_usuario
			   where propuesta.aceptado=1
			   order by dia asc
			   limit 7";
	$result = mysqli_query($con, $select);
	disconnect($con);
    return $result;
}

function ranking() {
	$con = connect("db4959381_proyecto");
	$select = "select usuario.imagen, usuario.nombre as musico, genero.nombre as genero, count(*) as votos 
		       from voto_musico
			   inner join usuario on voto_musico.musico = usuario.id_usuario
			   inner join musico on musico.id_musico = usuario.id_usuario
			   inner join genero on musico.genero = genero.id_genero
			   group by voto_musico.musico
			   order by votos desc
			   limit 5";
	$result = mysqli_query($con, $select);
	disconnect($con);
    return $result;
}

function concCreatedLoc() {
	$con = connect("db4959381_proyecto");
	$select = "select concierto.dia, concierto.hora, genero.nombre as genero, concierto.pago, count(*) as inscritos
			   from concierto 
			   join propuesta on propuesta.concierto = concierto.id_concierto
			   join usuario on concierto.local = usuario.id_usuario
			   join genero on concierto.genero = genero.id_genero
			   where concierto.asignado = 0 and usuario.id_usuario = 7
			   group by propuesta.concierto, concierto.dia, concierto.hora, genero.nombre";
	$result = mysqli_query($con, $select);
	disconnect($con);
    return $result;
}

function concAssignLoc() {
	$con = connect("db4959381_proyecto");
	$select = "select concierto.dia, concierto.hora, genero.nombre as genero, usuario.nombre as musico, concierto.pago, count(*) as votos
			   from concierto
			   join genero on concierto.genero = genero.id_genero
			   join propuesta on concierto.id_concierto = propuesta.concierto
			   join usuario on propuesta.musico = usuario.id_usuario 
			   join voto_concierto on voto_concierto.concierto = concierto.id_concierto
			   where propuesta.aceptado = 1 and concierto.local=6 
			   group by voto_concierto.concierto, concierto.dia, concierto.hora, genero.nombre, usuario.nombre, concierto.pago";
	$result = mysqli_query($con, $select);
	disconnect($con);
    return $result;
}

function connect($database) {
    $con = mysqli_connect("mysql131int.srv-hostalia.com", "u4959381_dam1t1", "1j/g1~aU@Zc;WFOx", $database)
            or die("No se ha podido conectar a la BBDD");
    mysqli_set_charset($con,"utf8");        
    return $con;
}

function disconnect($con) {
    mysqli_close($con);
}
 ?>