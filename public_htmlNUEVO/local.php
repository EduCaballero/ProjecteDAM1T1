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
	<?php require_once 'bbdd.php'; ?>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<div id="container">
		<div id="profile">
			<div class="content-container">
				<div id="profileImg"><a href=""><img src="img/razzmatazz.jpg" alt=""></a></div>
				<div id="profile-data">
					<h2>Razzmatazz</h2>
					<ul id=profile-data-sub>
						<li><span class="fa fa-lg fa-map-marker icon-profile"></span><span>Barcelona</span></li>
						<li><span class="fa fa-lg fa-phone icon-profile"></span><span>93 123 1231</span></li>
						<li><span class="fa fa-envelope icon-profile"></span><span>info@razzmatazz.com</span></li>
						<li><span class="fa fa-link icon-profile"></span><a href=""><span>razzmatazz.com</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="main">
			<div id="create" class="content">
				<div class="content-container">
					<h2><span class="fa fa-calendar-plus-o"></span>Crear concierto</h2>
					<?php
					require_once 'bbdd_1.php';
					if (isset($_POST['crear'])) {
    				// Recogemos las variables del POST
    					$day = $_POST['day'];
    					$month = $_POST['month'];
						$year = $_POST['year'];
    					$time = $_POST['time'];
    					$genre = $_POST['genre'];
    					$pago = $_POST['pago'];
    					altaNuevoConcierto($day, $month, $year, $time, $genre, $pago);

					} else {
					?>
					<form action="" method="POST">
						<div class="form-crt-row">
							<div class="form-crt-row-sub">
								<label>Fecha</label>
							
								<select name="day">
									<option value="">Dia</option>
									<?php
									for ($i=1; $i<32;$i++) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
									?>
								</select>
							<select name="month">
								<option value="">Mes</option>
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>	
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						<select name="year">
							<option value="">Año</option>
							<?php
							for ($i=2016; $i>1900;$i--) {
								echo '<option value="'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
							</div><div class="form-crt-row-sub">				
							<label>Hora</label>
							<input type="time" name="time" max="23:59:59" min="00:00:00" step="1" required>
						</div>
					</div><div class="form-crt-row">
					<div class="form-crt-row-sub">
						<label>Género</label><select name="genre" required>
						<?php
						$generos = AllGeneros();
							while ($fila = mysqli_fetch_array($generos)) {
        					extract($fila);
       						echo "<option value='$id_genero'>$nombre";
        					echo "</option>";
    						}
    						?>
					</select>
				</div><div class="form-crt-row-sub">
				<label>Pago</label><input type="text" name="pago" pattern="\d*" placeholder="€" required/></div>
			</div>
			<input type="submit" name="crear" value="Crear" class="btn btn-submit"/>
		</form>
		<?php } ?>
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
			$concCreated = concCreatedLoc();
			while ($row = mysqli_fetch_array($concCreated)) {
				echo"
				<tr>
					<td>".$row["dia"]."</td>
					<td>".$row["hora"]."</td>
					<td>".$row["genero"]."</td>
					<td>".$row["pago"]."</td>
					<td>".$row["inscritos"]."</td>
					<td><a href=''>Eliminar</a></td>
					<td><a href=''>Modificar</a></td>
				</tr>";
			}
			?>
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
			$concAssign = concAssignLoc();
			while ($row = mysqli_fetch_array($concAssign)) {
				echo"
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
			}
			?>
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