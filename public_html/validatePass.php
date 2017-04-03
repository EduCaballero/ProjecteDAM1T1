<?php 
	require_once 'bbdd.php';
	if (checkPass($_POST["currentPass"],$_POST["id"])->num_rows == 0)  echo 'false';
	else echo 'true';
 ?>