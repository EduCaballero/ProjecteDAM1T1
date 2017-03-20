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
	<?php require_once 'bbdd.php'; require_once 'bbdd_1.php';?>
	<header>
		<?php require_once 'includes/header-intranet.php'; 

			$dia = date("d");
			$mes = date("m");
			$anyo = date("Y");
			$hora = date("H");
			$minutos = date("m");
			echo "<script> function saberDia(){return '".$dia."'}</script>";
			echo "<script> function saberMes(){return '".$mes."'}</script>";
			echo "<script> function saberAnyo(){return '".$anyo."'}</script>";
			echo "<script> function saberHora(){return '".$hora."'}</script>";
			echo "<script> function saberMinutos(){return '".$minutos."'}</script>";
		?>

		<script type="text/javascript">

			function checkdate(input,input2){
			var validformat=/^\d{2}\/\d{2}\/\d{4}$/
			var validformatHour=/^\d?\d:\d{2}$/; 	
			var returnval=false
			var dia = saberDia()
			var mes = saberMes()
			var anyo = saberAnyo()
			var hora = saberHora()
			var min = saberMinutos()

			if (!validformat.test(input.value))
				alert("Fecha: Formato invalido")
			if(!validformatHour.test(input2.value))
				alert("Hora: Formato invalido")
			else{
				var monthfield=input.value.split("/")[1]
				var dayfield=input.value.split("/")[0]
				var yearfield=input.value.split("/")[2]
				var hourfield=input2.value.split(":")[0]
				var minfield=input2.value.split(":")[1]
				var dayobj = new Date(yearfield, monthfield-1, dayfield, hourfield, minfield)
				var dayserv = new Date(anyo, mes-1, dia, hora, min)
			if ((dayobj.getMonth()+1!=monthfield)||(dayobj.getDate()!=dayfield)||(dayobj.getFullYear()!=yearfield))
				alert("Dia, mes, año incorrecto");
			if(hourfield>23||hourfield<0)alert("Hora incorrecta");
			if(minfield>59||hourfield<0)alert("Hora incorrecta");
			var compareDates = dayobj>dayserv
			if(compareDates == false)alert("La fecha no puede ser anterior a la actual");
			else
				//si va todo bien devolvemos true
				returnval=true
			}
			if (returnval==false) input.select();
				return returnval
			}

		</script>
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
					<form onSubmit="return checkdate(this.mydate,this.mytime)">
						<div class="form-crt-row">
							<div class="form-crt-row-sub">
								<label>Fecha</label><input type="text" name="mydate" placeholder="dd/mm/aaaa" required/>
							</div><div class="form-crt-row-sub">				
							<label>Hora</label><input type="text" name="mytime" placeholder="hh:mm" required/> 
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