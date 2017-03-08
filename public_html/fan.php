<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Fan</title>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/intranet.css">
	<link rel="stylesheet" href="css/fan.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<script src="js/src/menu.js"></script>
</head>
<body>
	<?php require_once 'bbdd_1.php';?>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<div id="container">
		<div id="profile">
			<div class="content-container">
				<div id="profileImg"><a href=""><img src="img/fan.jpg" alt=""></a></div>
				<div id="profile-data">
					<h2>Lance A. Baker</h2>
					<ul id="profile-data-sub">
						<li><span class="fa fa-lg fa-map-marker icon-profile"></span><span>Barcelona</span></li>
						<li><span class="fa fa-lg fa-phone icon-profile"></span><span>674123123</span></li>
						<li><span class="fa fa-envelope icon-profile"></span><span>lance332@yahoo.com</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="main">
			<div id="vote-concert" class="content">
				<div class="content-container">
					<h2><span class="fa fa-comments-o"></span>Vota conciertos</h2>
					<table class="contentTable">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Hora</th>
								<th width="20%">Ciudad</th>
								<th width="25%">Local</th>
								<th width="26%">Músico</th>
								<th>Votos</th>
								<th>Vota</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								//Llamamos a la funcion de la tabla 1 de fans
							$FanVotaConciertos = FanVotaConciertos();

								//Extraccion de datos
							while ($fila = mysqli_fetch_array($FanVotaConciertos)) {
								echo "<tr>";
								extract($fila);
								echo "<td> $dia </td><td> $hora </td><td> $nombre </td><td><a href=''>$local</a></td><td><a href=''>$musico</a></td><td> $votos </td>";
								echo '<td><a href="" title="+1"><i class="fa fa-lg fa-thumbs-o-up thumbsup"></i></a></td>';
								echo "</tr>";
							} 
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div id="vote-music" class="content">
				<div class="content-container">
					<h2><span class="fa fa-comments-o"></span>Vota músicos / grupos</h2>
					<table class="contentTable">
						<thead>
							<tr>
								<th colspan="2">Músico / Grupo</th>
								<th>Género</th>
								<th>Votos</th>
								<th>Vota</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								//Llamamos a la funcion de la tabla 2 de fans
							$FanVotaMusicos = FanVotaMusicos();

								//Extraccion de datos
							while ($fila2 = mysqli_fetch_array($FanVotaMusicos)) {
								echo "<tr>";
								extract($fila2);
								echo "<td><a href=''><img src='$imagen' alt=''></a></td><td width='60%'><a href=''>$nombre</a></td><td width='25%'> $genero </td><td> $votos </td>";
								echo '<td><a href="" title="+1"><i class="fa fa-lg fa-thumbs-o-up thumbsup"></i></a></td>';
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