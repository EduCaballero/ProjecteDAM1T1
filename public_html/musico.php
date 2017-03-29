<?php
require_once 'bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
	if($_SESSION["tipo"]=="M") {
		$userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
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
	<script src="js/src/jquery-3.1.1.min.js"></script>
	<script src="js/src/menu.js"></script>
</head>
<body>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<div id="container">
		<div id="profile">
			<div class="content-container">
				<div id="profileImg"><a href=""><img src="<?php echo $userData["imagen"] ?>" alt=""></a></div>
				<div id="profile-data">
					<h2><?php echo $userData["nombre"] ?></h2>
					<ul id="profile-data-sub">
						<li>
							<span class="fa fa-music icon-profile"></span><span><?php echo getMusicGeneroById($_SESSION["id"]) ?></span>
						</li>
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
                                    extract($fila);
                                    echo "
                                    <tr>
                                    	<td>$dia</td>
                                    	<td>$hora</td>
                                    	<td>$ciudad</td>
                                    	<td>$local</td>
                                    	<td>$genero</td>
                                    	<td>$pago</td>
                                    	<td>$inscritos</td>
                                    	<td><a href=''>Inscribirse </a></td>
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
								<th width="18%">Ciudad</th>
								<th width="23%">Local</th>
								<th width="36%">Dirección</th>
								<th>Pago</th>
							</tr>
						</thead>
						<tbody>

							<?php 
								//Llamamos a la funcion de la tabla 2 de musicos
								$MusicoAsignado = MusicoAsignado($_SESSION["id"]);
								//Extraccion de datos
								while ($fila = mysqli_fetch_array($MusicoAsignado)) {
                                    extract($fila);
                                    echo "
                                    <tr>
                                    	<td>$dia</td>
                                    	<td>$hora</td>
                                    	<td>$ciudad</td>
                                    	<td>$loc</td>
                                    	<td>$direccion</td>
                                    	<td>$pago</td>
                                    </tr>";
                                } ?>
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
	} else {
		if($_SESSION["tipo"]=="F") header("Location: fan.php");
		else if($_SESSION["tipo"]=="L") header("Location: local.php");
	} 
} else header("Location: index.php");
?>