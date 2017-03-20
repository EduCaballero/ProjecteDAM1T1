<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Editar perfil</title>
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/editprofile.css">
	<link rel="stylesheet" href="../css/intranet.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
	<script src="../js/src/menu.js"></script>
</head>
<body>
	<header>
		<?php require_once '../includes/header-intranet.php'; ?>
	</header>
	<div id="container">
		<div id="profile">
			<div class="content-container">
				<div id="profileImg"><a href=""><img src="../img/musico.jpg" alt=""></a></div>
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
			<div id="form-container" class="content">
				<div class="content-container">
					<h2><span class="fa fa-pencil"></span>Información personal</h2>
					<form class="form-profile" action="" method="POST">
						<div class="form-row">
							<label>Nombre artístico</label><div class="input-wrap">
							<input type="text" name="nameArtist"/></div>
						</div>
						<div class="form-row">
							<label>Nº de miembros</label><div class="input-wrap">
							<input type="text" name="members" pattern="\d*"></div>
						</div>
						<div class="form-row">
							<label>Género</label><div class="input-wrap">
							<select name="genre">
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
							</select></div>
						</div>
						<div class="form-row">
							<label>Ciudad</label><div class="input-wrap">
							<input type="text" name="city"></div>
						</div>
						<div class="form-row">
							<label>Teléfono</label><div class="input-wrap">
							<input type="text" name="tlf" maxlength="9" pattern="\d*"></div>
						</div>
						<div class="form-row">
							<label>Página web</label><div class="input-wrap">
							<input type="url" name="web"></div>
						</div>

						<div class="form-row">
							<label>Nuevo email</label><div class="input-wrap">
							<input type="email" name="newEmail"/></div>
						</div>
						<div class="form-row">
							<label>Confirma email</label><div class="input-wrap">
							<input type="email" name="emailConfirm"/></div>
						</div>
						<div class="form-row">
							<label>Contraseña actual</label><div class="input-wrap">
							<input type="password" name="currentPass"></div>
						</div>
						<div class="form-row">
							<label>Nueva contraseña</label><div class="input-wrap">
							<input type="password" name="newPass"></div>
						</div>
						<div class="form-row">
							<label>Confirma contraseña</label><div class="input-wrap">
							<input type="password" name="ConfirmNewPass"></div>
						</div>
						<div class="form-row">
							<label>Imagen de perfil </label><div class="input-wrap">
							<input type="file" name="imgprofile"></div>
						</div>
						<div class="form-row">
							<label></label><div class="input-wrap">
							<input type="submit" value="Modificar" class="btn btn-submit"/><input type="reset" value="Limpiar" class="btn btn-reset"></div>
						</div>
					</form>
				</div>
			</div>
			<footer class="footer">
				<?php require_once '../includes/footer.php'; ?>
			</footer>
		</div>
	</div>
</body>
</html>