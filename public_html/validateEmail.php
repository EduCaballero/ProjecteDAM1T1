<?php 
	require_once 'bbdd.php';

	$reqEmail = $_POST["email"];
	if (checkEmail($reqEmail)->num_rows == 0)  echo 'true';
	else echo 'false';
 ?>