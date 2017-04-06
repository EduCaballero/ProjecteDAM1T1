<?php 
session_start();
require_once 'bbdd.php';
$errors = array();
if (empty($_POST["concert-date"])) {
	$errors['concert-date'] = 'Campo obligatorio';
} else {
	if (preg_match("/^((\d{2})-(\d{2})-(\d{4}))$/", $_POST["concert-date"])) {
		$date = explode("-",$_POST["concert-date"]);
		// si la fecha es valida, comprueba si es posterior a la hora del servidor
		if (checkdate($date[1],$date[0],$date[2])) {
			$concertdate = strtotime($_POST["concert-date"]);
			$serverdate = strtotime(date('d-m-Y'));
			if ($concertdate < $serverdate) {
				$errors['concert-date'] = 'Fecha posterior plz';
			}
		} else {
			$errors['concert-date'] = 'Fecha invalida';
		}
	} else {
		$errors['concert-date'] = 'Formato invalido';
	}
}

if (empty($_POST["concert-time"])) {
	$errors['concert-time'] = 'Campo obligatorio';
} else {
	// si el formato de la hora no es correcto
	if (!preg_match("/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/", $_POST["concert-time"])) {
		$errors['concert-time'] = 'Hora invalida';
	}
}

if (empty($_POST["pay"])) {
	$errors['pay'] = 'Campo obligatorio';
} else {
	// Si el pago no tiene entre 1 y 6 cifras
	if (!preg_match("/^(\d{1,6})$/", $_POST["pay"])) {
		$errors['pay'] = 'Pago invalido';
	}
}

if (empty($_POST["genre"])) {
	$errors['genre'] = 'Campo obligatorio';
}

if (count($errors) > 0) {
	$errors = array('validation' => false) + $errors;
	echo json_encode($errors);
	exit;
} else {
	// inserto el concierto y devuelvo los datos
	$time = explode(":",$_POST["concert-time"]);
	insertConcierto($date[0], $date[1], $date[2], $time[0], $time[1], $_POST["pay"], $_SESSION["id"], $_POST["genre"]);
	$data = array();
	$data = lastCreatedConcert($_SESSION["id"]);
	$data = array('validation' => true) + $data;
	echo json_encode($data);
}
?>
