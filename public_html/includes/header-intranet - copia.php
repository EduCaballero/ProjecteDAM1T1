<?php 
if ($_SESSION["tipo"]=="L"){
	if (basename($_SERVER['PHP_SELF']) == "editlocal.php") {
		$user = "../local.php";
		$profile = "editlocal.php";
	} else {
		$user = "local.php";
		$profile = "local/editlocal.php";
	}
} else if ($_SESSION["tipo"]=="M") {
	if (basename($_SERVER['PHP_SELF']) == "editmusico.php") {
		$user = "../musico.php";
		$profile = "editmusico.php";
	} else {
		$user = "musico.php";
		$profile = "musico/editmusico.php";
	}
} else if ($_SESSION["tipo"]=="F") {
	if (basename($_SERVER['PHP_SELF']) == "editfan.php") {
		$user = "../fan.php";
		$profile = "editfan.php";
	} else {
		$user = "fan.php";
		$profile = "fan/editfan.php";
	}
}
echo '
<nav id="mobile-menu" class="mobile-menu">
	<div class="mobile-menu-top">ConcertPush</div>
	<ul>
		<li class="mobile-menu-item"><a href="'.$user.'" class="mobile-menu-link"><span class="fa fa-user"></span>Usuario</a></li>
		<li class="mobile-menu-item"><a href="'.$profile.'" class="mobile-menu-link"><span class="fa fa-pencil-square"></span>Editar Perfil</a></li>
		<li class="mobile-menu-item"><a href="cerrarSesion.php" class="mobile-menu-link"><span class="fa fa-times"></span>Salir</a></li>
	</ul>
</nav>
<div id="overlay"></div>
<div id="topbar">
	<div id="top-menu">
		<div class="logo">
			<a href="#" title="ConcertPush" class="logo-link">ConcertPush</a>
		</div><div id="mobile-button-container">
		<div class="mobile-menu-button" title="Abrir menú">
			<span class="fa fa-bars"></span></div>
		</div><form class="search-box" action="" method="GET">
		<div id="inner-search-wrap">
			<i class="fa fa-search search-icon"></i>
			<input id="search-field" type="search" placeholder="Busca locales, músicos, géneros..." name="buscar"><button id="search-submit" type="button" name="buscar" value=""><span class="fa fa-search"></span></button>
		</div>
	</form>
	<nav id="user-menu">
		<ul>
			<li class="user-menu-item"><a href="'.$user.'" class="user-menu-link">USUARIO</a></li><li class="user-menu-item"><a href="'.$profile.'" class="user-menu-link">EDITAR PERFIL</a></li><li class="user-menu-item"><a href="cerrarSesion.php" class="user-menu-link">SALIR</a></li>
		</ul>
	</nav>
</div>
</div>
'; ?>

