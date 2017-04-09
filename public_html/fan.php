<?php
require_once 'bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
	if($_SESSION["tipo"]=="F") {
		$userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
    ?>
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
	<?php 
		if (isset($_POST["vote"])) {
			switch ($_POST["vote"]) {
				case "voteConcert":
					$conId = $_POST["conId"];
					addConVote($_SESSION["id"],$conId);
					break;
				case "delVoteConcert":
					$conId = $_POST["conId"];
					delConVote($_SESSION["id"],$conId);
					break;
				case "voteMusic":
					$musicId = $_POST["musicId"];
					addMusicVote($_SESSION["id"],$musicId);
					break;
				case "delVoteMusic":
					$musicId = $_POST["musicId"];
					delMusicVote($_SESSION["id"],$musicId);
					break;
			}
		}
	?>
	<header>
		<?php require_once 'includes/header-intranet.php'; ?>
	</header>
	<div id="container">
		<div id="profile">
			<?php require_once 'includes/fan-profile.php'; ?>
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
								<th width="26%">Local</th>
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
								extract($fila);
								echo "<tr>
										<td>$dia</td>
										<td>$hora</td>
										<td>$municipio</td>
										<td>$local</td>
										<td>$musico</td>
										<td>$votos</td>";
								// Comprobamos si el fan ha votado a este concierto
								// Si ha votado puede retirar el voto, si no ha votado puede votar.
								if (fanVoteConcert($id_concierto,$_SESSION["id"])) {
									echo "<td>
									<form action='' method='post'>
									<input type='hidden' name='conId' value='$id_concierto'>
									<button name='vote' value='delVoteConcert' class='fa fa-lg fa-thumbs-o-down thumbsdown' title='-1'>
									</form>
									</td>
									</tr>";
								} else {
								echo "<td>
									<form action='' method='post'>
									<input type='hidden' name='conId' value='$id_concierto'>
									<button name='vote' value ='voteConcert' class='fa fa-lg fa-thumbs-o-up thumbsup' title='+1'>
									</form>
									</td>
									</tr>";
								}
							} ?>
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
								<th width="25%">Género</th>
								<th>Votos</th>
								<th>Vota</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								//Llamamos a la funcion de la tabla 2 de fans
							$FanVotaMusicos = FanVotaMusicos();
								//Extraccion de datos
							while ($fila = mysqli_fetch_array($FanVotaMusicos)) {
								extract($fila);
								echo "<tr>
										<td><img src='img/".$imagen."' alt=''></td>
										<td width='60%'>$nombre</td>
										<td>$genero</td>
										<td>$votos</td>";
								// Comprobamos si el fan ha votado a este musico
								// Si ha votado puede retirar el voto, si no ha votado puede votar.		
								if (fanVoteMusic($musico,$_SESSION["id"])) {
									echo "<td>
									<form action='' method='post'>
									<input type='hidden' name='musicId' value='$musico'>
									<button name='vote' value='delVoteMusic' class='fa fa-lg fa-thumbs-o-down thumbsdown' title='-1'>
									</form>
									</td>
									</tr>";
								} else {
								echo "<td>
									<form action='' method='post'>
									<input type='hidden' name='musicId' value='$musico'>
									<button name='vote' value ='voteMusic' class='fa fa-lg fa-thumbs-o-up thumbsup' title='+1'>
									</form>
									</td>
									</tr>";
								}
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
		if ($_SESSION["tipo"]=="L") header("Location: local.php");
		else if ($_SESSION["tipo"]=="M") header("Location: musico.php");
	} 
} else header("Location: index.php");
?>