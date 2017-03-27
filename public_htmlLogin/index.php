<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ConcertPush - Index</title>
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/index.css">
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Open+Sans|Roboto" rel="stylesheet"> 
	<script src="js/src/jquery-3.1.1.min.js"></script>
	<script src="js/src/menu.js"></script>
</head>
<body>
	<?php require_once 'bbdd.php'; ?>
	<header>
		<nav id="mobile-menu" class="mobile-menu">
			<div class="mobile-menu-top">ConcertPush</div>
			<ul>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="signin.php"><span class="fa fa-user"></span>Iniciar sesión</a></li>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="signup.php"><span class="fa fa-pencil-square"></span>Regístrate</a></li>
			</ul>
			<ul>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Castellano</a></li>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Catalan</a></li>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Euskera</a></li>
				<li class="mobile-menu-item"><a class="mobile-menu-link" href="#"><span class="fa fa-language"></span>Gallego</a></li>
			</ul>
		</nav>
		<div id="overlay" onclick="disableMenu()"></div>
		<div id="topbar">
			<div class="logo">
				<a href="index.php" title="ConcertPush" class="logo-link">ConcertPush</a>
			</div><div id="mobile-button-container">
			<div class="mobile-menu-button" onclick="enableMenu()" title="Abrir menú">
				<span class="fa fa-bars"></span>
			</div>
		</div><div class="mobile-title"><h1>ConcertPush</h1></div>
		<nav id="user-menu">
			<div class="dropdown">
				<a class="dropdown-top" href="#">IDIOMA<span class="fa fa-caret-down"></span></a>
				<ul class="dropdown-sub">
					<li class="dropdown-sub-item"><a href="#">CASTELLANO</a></li>
					<li class="dropdown-sub-item"><a href="#">CATALAN</a></li>
					<li class="dropdown-sub-item"><a href="#">EUSKERA</a></li>
					<li class="dropdown-sub-item"><a href="#">GALLEGO</a></li>
				</ul>
			</div><div class="signin-signup">
			<ul>
				<li class="user-menu-item"><div class="user-menu-link signin" onclick="enableModal()">INICIAR SESIÓN</div></li><li class="user-menu-item"><a href="signup.php" class="user-menu-link">REGÍSTRATE</a></li>
			</ul>
		</div>
	</nav>
	<div id="modal-container">
		<div id="modal-content">
			<div id="modal-header">
				<h3>Inicia sesión en ConcertPush</h3>
			</div>
			<div id="login-form">
				<form action="" method="post">
					<input type="email" name="email" placeholder="Email" maxlength="80" required>
					<input type="password" name="password" placeholder="Contraseña" maxlength="32" required>
					<input type="checkbox" name="remember" value="1">
					<span>Recordar mis datos</span>
					<a href="">¿Olvidaste tu contraseña?</a>
					<input type="submit" class="btn-submit" name="entrar" value="Iniciar sesión">
				</form>
				<?php
			require_once 'bbdd.php';
		    if (isset($_POST["entrar"])) {
		    	$user = $_POST["email"];
		        $pass = $_POST["password"];
		        if (validateUser($user, $pass)) {
		        	session_start();
		            $_SESSION["user"] = $user;
		            $tipo = getTypeByUser($user);
		            $_SESSION["tipo"] = $tipo;
		            $id = getIdByUser($user);
		            $_SESSION["id"] = $id;
		            if ($tipo == "M") {
		            	header("Location: musico.php");
		            }else if($tipo == "L"){
		                 header("Location: local.php");
		            }else if($tipo == "F"){
		               	header("Location: fan.php");
		            }
		    	} else {
		            //Mensaje de error
		        	}
		    }
	        ?>
			</div>
			<div id="modal-footer">
				¿Nuevo en ConcertPush? <a href="signup.php">Regístrate »</a>
			</div>
			<button type="button" class="fa fa-lg fa-close btn-close" onclick="disableMenu()"></button>	
		</div>
	</div>
</div>
</header>
<div id="slider">
	<div id="slider-content">
		<h1>ConcertPush</h1>
		<h6>LA PLATAFORMA PARA LOS AMANTES DE LA MÚSICA EN DIRECTO</h6>
		<form class="search-box" action="" method="get">
			<input type="search" id="search-field" name="buscar" placeholder="Busca locales, músicos, géneros..."><button type="submit" class="  btn-search"><i class="fa fa-lg fa-search search-icon"></i></button>
		</form>
	</div>
</div>
<div class="main-container">
	<div class="item-wrap">
		<div class="item">
			<div id="agenda">
				<h2>Próximos conciertos</h2>
				<ul>
				<?php
				$concerts = agenda();
				while ($row = mysqli_fetch_array($concerts,MYSQLI_NUM)) {
					echo "<li>".$row[0]." - ".$row[1]." - ".$row[2]."</li>";
				}
				?>	  
				</ul>
			</div>
		</div>
	</div><div class="item-wrap">
	<div class="item">
		<div id="ranking">
			<h2>Ranking músicos</h2>
			<ul>
			<?php
			$musics = ranking();
			while ($row = mysqli_fetch_array($musics)) {
				echo "<li><div class='ranking-img'><img src='".$row["imagen"]."'></div><div class='ranking-data'>".$row["musico"]." - ".$row["genero"]." - ".$row["votos"]."</div></li>";
			}
			?>
			</ul>
		</div>
	</div>
</div><div class="item-wrap">
<div class="item">
	<div id="banners">
		<h2>Patrocinadores</h2>
		<ul>
			<li><a href=""><img src="img/yamaha.jpg" alt=""></a></li>
			<li><a href=""><img src="img/fender.jpg" alt=""></a></li>
		</ul>
	</div>
</div>
</div>
<footer class="footer">
	<?php require_once 'includes/footer.php'; ?>
</footer>
</div>
</body>
</html>