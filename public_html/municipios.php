<?php
	require_once 'bbdd_1.php';

	$id = $_POST["id"];
	$municipios = selectMunicipiosByProv($id);
	$data = $municipios->fetch_all(MYSQLI_ASSOC);
	echo (json_encode($data));
 ?>