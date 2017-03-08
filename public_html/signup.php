<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Registro</title>
	<link rel="stylesheet" href="css/signin-signup.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<script src="js/src/jquery-3.1.1.min.js"></script>
	<script src="js/src/jquery.validate.min.js"></script>
	<script src="js/src/signup.js"></script>
</head>
<body>
	<header>
		<div id="topbar">
			<div class="logo">
				<a href="index.php" title="ConcertPush" class="logo-link">ConcertPush</a>
			</div>
		</div>
		<?php require_once('bbdd_1.php'); ?>
	</header>
	<?php
		if (isset($_POST["reg-local"])) {
       		$nombre = $_POST["nombre_local"];
        	$ciudad = $_POST["ciudad_local"];
        	$dir = $_POST["dir_local"];
        	$aforo = $_POST["aforo"];
        	$telefono = $_POST["telefono_local"];
        	$web = $_POST["web_local"];
        	$email = $_POST["email"];
			$pass = $_POST["password"];
			$user = $_POST["user"];
        	altaUsuario($email,$pass,$user,$ciudad,$telefono,$web,$nombre);
        	altaLocal($dir,$aforo);
        } else if(isset($_POST["reg-music"])) {
        	$nombre = $_POST["nombre_musico"];
        	$numMiembros = $_POST["num_miembros"];
		    $genero = $_POST["genero"];
		    $telefono = $_POST["telefono_musico"];
		    $web = $_POST["web_musico"];
		    $ciudad = $_POST["ciudad_music"];
		    $email = $_POST["email"];
			$pass = $_POST["password"];
			$user = $_POST["user"];
		    altaUsuario($email,$pass,$user,$ciudad,$telefono,$web,$nombre);
		    altaMusico($numMiembros,$genero);	
        } else if (isset($_POST["reg-fan"])) {
		    $nombre = $_POST["nombre_fan"];
		    $apellidos = $_POST["apellidos_fan"];
		    $ciudad = $_POST["ciudad_fan"];
		    $telefono = $_POST["telefono_fan"];
		    $sex = $_POST["fan_sex"];
		    $day = $_POST["day"];
		    $month = $_POST["month"];
		    $year = $_POST["year"];
		    $web = $_POST["web_fan"];
		    $email = $_POST["email"];
			$pass = $_POST["password"];
			$user = $_POST["user"];
		    altaUsuario($email,$pass,$user,$ciudad,$telefono,$web,$nombre);
		    altaFan($sex,$apellidos,$day,$month,$year);  
		} else {
	?>
	<div id="signin-signup-container">
		<div id="signup-form-two-steps">
		<?php if(!isset($_POST["next"])) { ?>
			<div id="signup-step-one">
				<form id="reg-user" action="" method="post">
					<div class="signin-signup-form">
						<h1>Únete hoy a ConcertPush.</h1>
						<input type="email" name="email" placeholder="Email">
						<input type="password" id="password" name="password" placeholder="Contraseña">
						<input type="password" name="confirm_password" placeholder="Reescribe la contraseña">
						<select name="usertype" id="usertype">
							<option value="">Tipo de usuario</option>
							<option value="L">Local</option>
							<option value="M">Músico</option>
							<option value="F">Fan</option>
						</select>
					</div>
					<input type="submit" class="btn btn-submit" name="next" value="Siguiente">
				</form>
				<div id="subtext-box">
					<small>¿Tienes cuenta? <a href="signin.php">Iniciar sesión</a>
					</small>
				</div>
			</div>
			<?php } else { 
				$emailR = $_POST["email"];
				$passR = $_POST["password"];
				$userR = $_POST["usertype"];
			?>
			<div id="signup-step-two">
			<?php if ($userR=='L') { ?>
				<form id="user-local" action="" method="post">
					<div class="signin-signup-form">
						<h1>Registro local</h1>
						<input type="text" name="nombre_local" placeholder="Nombre del local">
						<select class="provincia" name="provincia" required>
							<option value="">Provincia</option>
						<?php
						$provincias=selectProvincias();
						while ($row = mysqli_fetch_array($provincias)) {
							echo "<option value='".$row["id"]."'>".$row["provincia"]."</option>";
						}
						?>
						</select>
						<select class="ciudad" name="ciudad_local" required>
							<option value="">Municipio</option>
						</select>
						<input type="text" name="dir_local" placeholder="Dirección">
						<input type="text" name="aforo" placeholder="Aforo">
						<input type="text" name="telefono_local" placeholder="Teléfono">
						<input type="url" name="web_local" placeholder="Página web">
						<input type='hidden' name='email' value='<?php echo $emailR ?>'>
						<input type='hidden' name='password' value='<?php echo $passR ?>'>
						<input type='hidden' name='user' value='<?php echo $userR ?>'>
					</div>
					<input type="submit" class="btn btn-submit" name="reg-local" value="Registrarte">
				</form>
				<?php } else if ($userR=='M') { ?>
				<form id="user-musico" action="" method="post">
					<div class="signin-signup-form">
						<h1>Registro músico</h1>
						<input type="text" name="nombre_musico" placeholder="Nombre artistico">
						<input type="text" name="num_miembros" placeholder="Numero de miembros">
						<select name="genero">
							<option value="">Género</option>
							<option value="1">Rock</option>
							<option value="2">Pop</option>
							<option value="3">Disco</option>
							<option value="4">Punk</option>
							<option value="5 Metal">Dance</option>
							<option value="6">Heavy Metal</option>
							<option value="7">Clasica</option>
						</select>
                        <select class="provincia" name="provincia">
                        	<option value="">Provincia</option>
						<?php
						$provincias=selectProvincias();
						while ($row = mysqli_fetch_array($provincias)) {
							echo "<option value='".$row["id"]."'>".$row["provincia"]."</option>";
						}
						?>
						</select>
						</select>
						<select class="ciudad" name="ciudad_musico" required>
							<option value="">Municipio</option>
						</select>
						<input type="text" name="telefono_musico" placeholder="Teléfono">
						<input type="url" name="web_musico" placeholder="Página web">
						<input type='hidden' name='email' value='<?php echo $emailR ?>'>
						<input type='hidden' name='password' value='<?php echo $passR ?>'>
						<input type='hidden' name='user' value='<?php echo $userR ?>'>
					</div>	
					<input type="submit" class="btn btn-submit" name="reg-music" value="Registrarte">
				</form>
				<?php } else if ($userR=='F') { ?>
				<form id="user-fan" action="" method="post">
					<div class="signin-signup-form">
						<h1>Registro fan</h1>
						<ul>
                            <li><input type="text" id="nombre_fan" name="nombre_fan" placeholder="Nombre"></li><li><input type="text" id="apellidos_fan" name="apellidos_fan" placeholder="Apellidos"></li>
						</ul>
						<select class="provincia" name="provincia">
                        	<option value="">Provincia</option>
						<?php
						$provincias=selectProvincias();
						while ($row = mysqli_fetch_array($provincias)) {
							echo "<option value='".$row["id"]."'>".$row["provincia"]."</option>";
						}
						?>
						</select>
						</select>
						<select class="ciudad" name="ciudad_fan" required>
							<option value="">Municipio</option>
						</select>
						<input type="text" name="telefono_fan" placeholder="Teléfono">
						<input type="url" name="web_fan" placeholder="Página web">
						<div id="user-sex">
							<span>Sexo:</span>
							<label for="fan-hombre">Hombre</label>
							<input id="fan-hombre" type="radio" name="fan_sex" value="H">
							<label for="fan-mujer">Mujer</label>
							<input id="fan-mujer" type="radio" name="fan_sex" value="M">
						</div>
						<span id="fecha-nac">Fecha de nacimiento</span>
						<ul>
							<li class="birthdate">
								<select name="day">
									<option value="">Dia</option>
									<?php
									for ($i=1; $i<32;$i++) {
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
									?>
								</select>
							</li><li class="birthdate">
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
						</li><li class="birthdate">
						<select name="year">
							<option value="">Año</option>
							<?php
							for ($i=2016; $i>1900;$i--) {
								echo '<option value="'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
					</li>
				</ul>
				<input type='hidden' name='email' value='<?php echo $emailR ?>'>
				<input type='hidden' name='password' value='<?php echo $passR ?>'>
				<input type='hidden' name='user' value='<?php echo $userR ?>'>
			</div>
			<input type="submit" class="btn btn-submit" name="reg-fan" value="Registrarte">
		</div>              
	</form>
	<?php 
			} 
		}
	} 
	?>
</div>
</div>
</div>
</body>
</html>
