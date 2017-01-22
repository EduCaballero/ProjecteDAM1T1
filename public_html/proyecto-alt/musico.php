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
							<tr>
								<td>12-12-2016</td>
								<td>11:30 PM</td>
								<td>Barcelona</td>
								<td><a href="">Chachipiruli</a></td>
								<td>Pop</td>
								<td>300€</td>
								<td><a href="">3</a></td>
								<td><a href="">Inscribirse</a></td>
							</tr>
							<tr>
								<td>14-12-2016</td>
								<td>09:00 PM</td>
								<td>Sabadell</td>
								<td><a href="">Sala Rock</a></td>
								<td>Rock</td>
								<td>400€</td>
								<td><a href="">6</a></td>
								<td><a href="">Inscribirse</a></td>
							</tr>
							<tr>
								<td>15-12-2016</td>
								<td>10:30 PM</td>
								<td>Terrasa</td>
								<td><a href="">Rave Cave</a></td>
								<td>Electronica</td>
								<td>325€</td>
								<td><a href="">4</a></td>
								<td><a href="">Inscribirse</a></td>
							</tr>
							<tr>
								<td>16-12-2016</td>
								<td>11:30 PM</td>
								<td>Granollers</td>
								<td><a href="">Classic Hall</a></td>
								<td>Clasica</td>
								<td>300€</td>
								<td><a href="">5</a></td>
								<td><a href="">Baja</a></td>
							</tr>
							<tr>
								<td>17-12-2016</td>
								<td>06:30 PM</td>
								<td>Barcelona</td>
								<td><a href="">Fun Haus</a></td>
								<td>House</td>
								<td>375€</td>
								<td><a href="">7</a></td>
								<td><a href="">Inscribirse</a></td>
							</tr>
							<tr>
								<td>17-12-2016</td>
								<td>09:00 PM</td>
								<td>Madrid</td>
								<td><a href="">Mazo Punk</a></td>
								<td>Punk</td>
								<td>250€</td>
								<td><a href="">2</a></td>
								<td><a href="">Inscribirse</a></td>
							</tr>
							<tr>
								<td>18-12-2016</td>
								<td>12:30 PM</td>
								<td>Mataró</td>
								<td><a href="">The Tribune</a></td>
								<td>Jazz</td>
								<td>295€</td>
								<td><a href="">3</a></td>
								<td><a href="">Baja</a></td>
							</tr>
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
							<tr>
								<td>18-12-2016</td>
								<td>10:30 PM</td>
								<td>Barcelona</td>
								<td><a href="">Heliogàbal</a></td>
								<td>Ramón y Cajal, 80</td>
								<td>200€</td>
							</tr>
							<tr>
								<td>21-12-2016</td>
								<td>09:30 PM</td>
								<td>Madrid</td>
								<td><a href="">El Búho Real</a></td>
								<td>Regueros, 5</td>
								<td>250€</td>
							</tr>
							<tr>
								<td>23-12-2016</td>
								<td>10:00 PM</td>
								<td>Valencia</td>
								<td><a href="">Sala Matisse</a></td>
								<td>Campoamor, 60</td>
								<td>275€</td>
							</tr>
							<tr>
								<td>26-12-2016</td>
								<td>09:30 PM</td>
								<td>Barcelona</td>
								<td><a href="">Razzmatazz</a></td>
								<td>Pamplona, 88</td>
								<td>300€</td>
							</tr>
							<tr>
								<td>3-1-2017</td>
								<td>11:00 PM</td>
								<td>Terrasa</td>
								<td><a href="">Crossroads</a></td>
								<td>Josep Tapiolas, 75</td>
								<td>195€</td>
							</tr>
							<tr>
								<td>5-1-2017</td>
								<td>00:30 PM</td>
								<td>Mataró</td>
								<td><a href="">Sala Privat</a></td>
								<td>Francesc Layret, 16</td>
								<td>275€</td>
							</tr>
							<tr>
								<td>8-1-2017</td>
								<td>11:15 PM</td>
								<td>Sabadell</td>
								<td><a href="">Griffin Pub</a></td>
								<td>Segarra, 25</td>
								<td>300€</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<footer class="footer">
				<?php require_once '/includes/footer.php'; ?>
			</footer>
		</div>
	</div>
</body>
</html>