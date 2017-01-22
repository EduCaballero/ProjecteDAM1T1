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
					<form action="" method="POST">
						<div class="form-crt-row">
							<div class="form-crt-row-sub">
								<label>Fecha</label><input type="text" name="date" placeholder="dd/mm/aaaa" required/>
							</div><div class="form-crt-row-sub">				
							<label>Hora</label><input type="text" name="time" placeholder="hh:mm" required/> 
						</div>
					</div><div class="form-crt-row">
					<div class="form-crt-row-sub">
						<label>Género</label><select name="genre" required>
						<option value="">Género</option>
						<option value="Pop">Pop</option>
						<option value="Rock">Rock</option>
						<option value="Disco">Disco</option>
						<option value="Clasica">Clásica</option>
						<option value="Heavy Metal">Heavy Metal</option>
						<option value="Jazz">Jazz</option>
						<option value="Blues">Blues</option>
						<option value="Country">Country</option>
						<option value="Electronica">Electronica</option>
						<option value="Hip-hop">Hip-hop</option>
						<option value="Dance">Dance</option>
						<option value="House">House</option>
						<option value="Trance">Trance</option>
						<option value="Folk">Folk</option>
						<option value="Punk">Punk</option>
						<option value="Raggae">Raggae</option>
						<option value="Alternative">Alternative</option>
						<option value="Proressive">Progressive</option>
						<option value="R&B and soul">Soul</option>
					</select>
				</div><div class="form-crt-row-sub">
				<label>Pago</label><input type="text" name="pago" pattern="\d*" placeholder="€" required/></div>
			</div>
			<input type="submit" value="Crear" class="btn btn-submit"/>
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
				<tr>
					<td>18-12-2016</td>
					<td>10:30 PM</td>
					<td>Pop</td>
					<td>300€</td>
					<td><a href="">1</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>19-12-2016</td>
					<td>09:30 PM</td>
					<td>Dance</td>
					<td>225€</td>
					<td><a href="">2</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>19-12-2016</td>
					<td>11:30 PM</td>
					<td>Jazz</td>
					<td>300€</td>
					<td><a href="">4</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>20-12-2016</td>
					<td>06:30 PM</td>
					<td>Soul</td>
					<td>350€</td>
					<td><a href="">3</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>22-12-2016</td>
					<td>04:00 PM</td>
					<td>Blues</td>
					<td>300€</td>
					<td><a href="">4</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>23-12-2016</td>
					<td>10:30 PM</td>
					<td>Disco</td>
					<td>450€</td>
					<td><a href="">4</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>24-12-2016</td>
					<td>11:15 PM</td>
					<td>Punk</td>
					<td>350€</td>
					<td><a href="">2</a></td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
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
					<th width="18%">Género</th>
					<th width="30%">Musico/Grupo</th>
					<th>Pago</th>
					<th>Votos</th>
					<th colspan="2" width="25%" >Acciones</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>12-12-2016</td>
					<td>11:30 PM</td>
					<td>Disco</td>
					<td><a href="">Bee Gees</a></td>
					<td>350€</td>
					<td>5</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>14-12-2016</td>
					<td>09:00 PM</td>
					<td>Rock</td>
					<td><a href="">Queen</a></td>
					<td>650€</td>
					<td>10</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>15-12-2016</td>
					<td>10:30 PM</td>
					<td>Pop</td>
					<td><a href="">The Bangles</a></td>
					<td>250€</td>
					<td>4</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>26-12-2016</td>
					<td>12:30 PM</td>
					<td>Punk</td>
					<td><a href="">The Offspring</a></td>
					<td>300€</td>
					<td>8</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>27-12-2016</td>
					<td>12:30 PM</td>
					<td>Pop</td>
					<td><a href="">Michael Jackson</a></td>
					<td>425€</td>
					<td>13</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>28-12-2016</td>
					<td>11:30 PM</td>
					<td>Soul</td>
					<td><a href="">Stevie Wonder</a></td>
					<td>450€</td>
					<td>7</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
				<tr>
					<td>29-12-2016</td>
					<td>12:30 PM</td>
					<td>Raggae</td>
					<td><a href="">Bob Marley</a></td>
					<td>400€</td>
					<td>6</td>
					<td><a href="">Eliminar</a></td>
					<td><a href="">Modificar</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<footer class="footer">
	<div class="content-container">
		<?php require_once '/includes/footer.php'; ?>
	</div>
</footer>
</div>
</div>
</body>
</html>