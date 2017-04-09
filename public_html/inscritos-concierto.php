<?php 
require_once 'bbdd.php';
$inscritos = inscritosConcert($_POST["concert"]);
$tableRow = "";
while ($row = mysqli_fetch_array($inscritos)) {
	$tableRow = $tableRow."
	<tr>
		<input type='hidden' value='".$_POST["concert"]."'>
		<input type='hidden' value='".$row["musico"]."'>
		<td><img src='img/".$row["imagen"]."'></td>
		<td>".$row["nombre"]."</td>
		<td>".$row["genero"]."</td>
		<td>".$row["votos"]."</td>
		<td><span class='act-accept'>Aceptar</span></td>
	</tr>";
}
if ($tableRow == "") {
	$data = array('table' => "<h3>No hay ningun músico inscrito en este concierto</h3>");
	echo json_encode($data);
} else {
	$table = "
	<table id='inscritos-table' class='contentTable'>
		<thead>
			<tr>
				<th colspan='2'>Músico / Grupo</th>
				<th width='25%''>Género</th>
				<th>Votos</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>".$tableRow."</tbody>
	</table>";
	$data = array('table' => $table);
	echo json_encode($data);
}
?>