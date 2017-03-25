<?php
session_start();
if (isset($_SESSION["id"])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Músico</title>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/musico.css">
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
				<div id="profileImg"><a href=""><img src="img/musico.jpg" alt=""></a></div>
				<div id="profile-data">
					<h2>Darth Vader</h2>
					<ul id="profile-data-sub">
						<li><span class="fa fa-music icon-profile"></span><span>Clásica</span></li>
						<li><span class="fa fa-lg fa-map-marker icon-profile"></span><span>Estrella de la Muerte</span></li>
						<li><span class="fa fa-lg fa-phone icon-profile"></span><span>666 123 123</span></li>
						<li><span class="fa fa-envelope icon-profile"></span><span>darthvader@starwars.com</span></li>
						<li><span class="fa fa-link icon-profile"></span><a href=""><span>darthvader.com</span></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="main">
			<div id="pending" class="content">
				<div class="content-container">
					<h2><span class="fa fa-calendar"></span>Conciertos pendientes de asignar</h2>
					<table class="contentTable">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Hora</th>
								<th width="18%">Ciudad</th>
								<th width="23%">Local</th>
								<th width="18%">Género</th>
								<th>Pago</th>
								<th>Inscritos</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								//Llamamos a la funcion de la tabla 1 de musicos
								$MusicoPendienteAsignar = MusicoPendienteAsignar();

								//Extraccion de datos
								while ($fila = mysqli_fetch_array($MusicoPendienteAsignar)) {
                                	echo "<tr>";
                                    extract($fila);
                                    echo "<td> $dia </td><td> $hora </td><td> $ciudad </td><td><a href=''>$local</a></td><td>$genero</td><td>$pago</td><td>$inscritos</td>";
                                    echo '<td><a href="">Inscribirse</a></td>';
                                    echo "</tr>";
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
								<th width="18%">Ciudad</th>
								<th width="23%">Local</th>
								<th width="36%">Dirección</th>
								<th>Pago</th>
							</tr>
						</thead>
						<tbody>

							<?php 
								//Llamamos a la funcion de la tabla 2 de musicos
								$MusicoAsignado = MusicoAsignado();

								//Extraccion de datos
								while ($fila = mysqli_fetch_array($MusicoAsignado)) {
                                	echo "<tr>";
                                    extract($fila);
                                    echo "<td>$dia</td><td>$hora</td><td>$ciudad</td><td>$loc</td><td>$direccion</td><td>$pago</td>";
                                    echo "</tr>";
                                } 
                               	?>
						</tbody>
					</table>
				</div>
			</div>
			<footer class="footer">
				<?php require_once 'includes/footer.php'; ?>
			</footer>
		</div>
	</div>
</body>
</html>
<?php
}else header("Location: index.php");
?>