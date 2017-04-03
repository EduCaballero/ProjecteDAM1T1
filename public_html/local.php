<?php
require_once 'bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
	if($_SESSION["tipo"]=="L") {
		$userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
		if (isset($_POST["create"])) {
			$date = explode("-",$_POST["concert-date"]);
			$hour = explode(":",$_POST["concert-time"]);
			$genre = $_POST["genre"];
			$pago = $_POST["pago"];
			insertConcierto($date[0],$date[1],$date[2],$hour[0],$hour[1],$pago,$_SESSION["id"],$genre);
		}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Local</title>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/local.css">
	<link rel="stylesheet" href="css/intranet.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<script src="js/src/jquery-3.1.1.min.js"></script>
	<script src="js/src/mobile.js"></script>
	<!-- documentación en momentjs.com/docs -->
	<script src="js/src/moment.min.js"></script>
</head>
<body>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<script type="text/javascript">
		function checkdate(date_inp,time_inp) {
			var validDate = moment(date_inp, "DD-MM-YYYY").isValid();
			if (!validDate) {
				alert("Formato de la fecha invalido");
				$("#concert-date").select();
				return false;
			}
			var validTime = moment(time_inp, "HH:mm").isValid();
			if (!validTime) {
				alert("Formato de la hora invalido");
				$("#concert-hour").select();
				return false;
			}

			/*
			var serverdate = moment("<?php echo date("d-m-Y") ?>","DD-MM-YYYY");
			var date = moment(date_inp,"DD-MM-YYYY");
			var isBefore = moment(date).isBefore(serverdate,'day');
			if (isBefore) {
				alert("La fecha no puede ser anterior a la actual");
				$("#concert-date").select();
				return false;
			}
			*/
			
			var isBefore;
			$.ajax({
				type : "POST",
				async: false,
				url : "server-date.php",
				dataType : "json",
				data: {date: $("#concert-date").val()},
				success: (function(data) {
		       		isBefore = data;
		    	})
			});
			if (isBefore) {
				alert("La fecha no puede ser anterior a la actual");
				$("#concert-date").select();
				return false;
			}
			return true;
		}
	</script>
	<!--
	<script type="text/javascript">
	function checkdate(dateinp,hourinp) {
		var validformatDate=/^\d{2}\-\d{2}\-\d{4}$/;
		var validformatHour=/^\d?\d:\d{2}$/; 	
		var day = <?php echo date("d") ?>;
		var month = <?php echo date("m") ?>;
		var year = <?php echo date("Y") ?>;

		if (!validformatDate.test(dateinp.value)) {
			alert("Formato de la fecha invalido");
			dateinp.select();
		} else if (!validformatHour.test(hourinp.value)) {
			alert("Formato de la hora invalido");
			hourinp.select();
		} else {
			var monthfield=dateinp.value.split("-")[1];
			var dayfield=dateinp.value.split("-")[0];
			var yearfield=dateinp.value.split("-")[2];
			var hourfield=hourinp.value.split(":")[0];
			var minfield=hourinp.value.split(":")[1];
			var dateconc = new Date(yearfield, monthfield-1, dayfield, hourfield, minfield);
			var dateserv = new Date(anyo, mes-1, dia);
			if (dateconc.getMonth()+1 != monthfield || dateconc.getDate() != dayfield || dateconc.getFullYear() != yearfield) {
				alert("Fecha incorrecta");
				dateinp.select();
			} else if (hourfield > 23 || hourfield < 0 || minfield > 59 || minfield < 0) {
				alert("Hora incorrecta");
				hourinp.select();
			} else if (dateconc<dateserv) {
				alert("La fecha no puede ser anterior a la actual");
				dateinp.select();
			} else { 
				return true;
			}
		}
		return false;
	}
	</script>
	-->
	<div id="container">
		<div id="profile">
			<?php require_once 'includes/local-profile.php'; ?>
		</div>
		<div id="main">
			<div id="create" class="content">
				<div class="content-container">
					<h2><span class="fa fa-calendar-plus-o"></span>Crear concierto</h2>
					<form onSubmit="return checkdate($('#concert-date').val(),$('#concert-time').val())" action="" method="post">
						<div class="form-crt-row">
							<div class="form-crt-row-sub">
								<label>Fecha</label><input type="text" id="concert-date" name="concert-date" placeholder="dd-mm-aaaa" required/>
							</div><div class="form-crt-row-sub">				
							<label>Hora</label><input type="text" id="concert-time" name="concert-time" placeholder="hh:mm" required/> 
						</div>
					</div><div class="form-crt-row">
					<div class="form-crt-row-sub">
						<label>Género</label><select name="genre" required>
							<option value="">Elige un género</option>
						<?php
						$generos = AllGeneros();
							while ($fila = mysqli_fetch_array($generos)) {
	        					extract($fila);
	       						echo "<option value='$id_genero'>$nombre</option>";
    						}
    					?>
					</select>
				</div><div class="form-crt-row-sub">
				<label>Pago</label><input type="text" name="pago" pattern="\d*" placeholder="€" required/></div>
			</div>
			<input type="submit" value="Crear" name="create" class="btn btn-submit"/>
		</form>
	</div>
</div>
<div id="pending" class="content">
	<div class="content-container">
		<h2><span class="fa fa-calendar"></span>Conciertos pendientes de asignar</h2>
		<table class="contentTable">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Hora</th>
					<th width="45%">Género</th>
					<th>Pago</th>
					<th>Inscritos</th>
					<th colspan="2" width="25%">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$concCreated = concCreatedLoc($_SESSION["id"]);
			while ($row = mysqli_fetch_array($concCreated)) {
				echo "
				<tr>
					<td>".$row["dia"]."</td>
					<td>".$row["hora"]."</td>
					<td>".$row["genero"]."</td>
					<td>".$row["pago"]."</td>
					<td>".$row["inscritos"]."</td>
					<td><a href=''>Eliminar</a></td>
					<td><a href=''>Modificar</a></td>
				</tr>";
			} ?>
			</tbody>
		</table>
	</div>
</div>
<div id="assigned" class="content">
	<div class="content-container">
		<h2><span class="fa fa-calendar-check-o"></span>Conciertos asignados</h2>
		<table class="contentTable">
			<thead>
				<tr>
					<th>Fecha</th>
					<th>Hora</th>
					<th width="18%">Género</th>
					<th width="30%">Musico/Grupo</th>
					<th>Pago</th>
					<th>Votos</th>
					<th colspan="2" width="25%" >Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$concAssign = concAssignLoc($_SESSION["id"]);
			while ($row = mysqli_fetch_array($concAssign)) {
				echo "
				<tr>
					<td>".$row["dia"]."</td>
					<td>".$row["hora"]."</td>
					<td>".$row["genero"]."</td>
					<td>".$row["musico"]."</td>
					<td>".$row["pago"]."</td>
					<td>".$row["votos"]."</td>
					<td><a href=''>Eliminar</a></td>
					<td><a href=''>Modificar</a></td>
				</tr>";
			} ?>
			</tbody>
		</table>
	</div>
</div>
<footer class="footer">
	<div class="content-container">
		<?php require_once 'includes/footer.php'; ?>
	</div>
</footer>
</div>
</div>
</body>
</html>
<?php
	} else {
		if ($_SESSION["tipo"]=="F") header("Location: fan.php");
		else if ($_SESSION["tipo"]=="M") header("Location: musico.php");
	} 
} else header("Location: index.php");
?>