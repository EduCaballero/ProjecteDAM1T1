<?php
require_once 'bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
	if($_SESSION["tipo"]=="L") {
		$userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
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
	<script src="js/src/menu.js"></script>
</head>
<body>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<script type="text/javascript">
	function checkdate(dateinp,hourinp) {
		var validformat=/^\d{2}\-\d{2}\-\d{4}$/;
		var validformatHour=/^\d?\d:\d{2}$/; 	
		var dia = <?php echo date("d") ?>;
		var mes = <?php echo date("m") ?>;
		var anyo = <?php echo date("Y") ?>;

		if (!validformat.test(dateinp.value)) {
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
	<?php
	if (isset($_POST["create"])) {
		$date = explode("-",$_POST["mydate"]);
		$hour = explode(":",$_POST["mytime"]);
		$genre = $_POST["genre"];
		$pago = $_POST["pago"];
		$local = 6;
		insertConcierto($date[0],$date[1],$date[2],$hour[0],$hour[1],$pago,$local,$genre);
	}
	?>
	<div id="container">
		<div id="profile">
			<div class="content-container">
				<div id="profileImg"><a href=""><img src="<?php echo $userData["imagen"] ?>" alt=""></a></div>
				<div id="profile-data">
					<h2><?php echo $userData["nombre"] ?></h2>
					<ul id=profile-data-sub>
						<li>
							<span class="fa fa-lg fa-map-marker icon-profile"></span><span><?php echo getMunicipioById($userData["ciudad"]) ?></span>
						</li>
						<?php if (isset($userData["telefono"])) { ?>
						<li>
							<span class="fa fa-lg fa-phone icon-profile"></span><span><?php echo $userData["telefono"] ?></span>
						</li>
						<?php } ?>
						<li>
							<span class="fa fa-envelope icon-profile"></span><span><?php echo $userData["mail"] ?></span>
						</li>
						<?php if (isset($userData["web"])) {
							$url = explode("://",$userData["web"],2);
						?>
						<li>
							<span class="fa fa-link icon-profile"></span><a href=""><span><?php echo $url[1] ?></span></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div id="main">
			<div id="create" class="content">
				<div class="content-container">
					<h2><span class="fa fa-calendar-plus-o"></span>Crear concierto</h2>
					<form onSubmit="return checkdate(this.mydate,this.mytime)" action="" method="post">
						<div class="form-crt-row">
							<div class="form-crt-row-sub">
								<label>Fecha</label><input type="text" name="mydate" placeholder="dd-mm-aaaa" required/>
							</div><div class="form-crt-row-sub">				
							<label>Hora</label><input type="text" name="mytime" placeholder="hh:mm" required/> 
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