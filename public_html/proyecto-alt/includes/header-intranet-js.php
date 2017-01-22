<?php echo '
<nav id="mobile-menu" class="mobile-menu">
	<div class="mobile-menu-title">ConcertPush</div>
	<ul>
		<li class="mobile-menu-item"><a href="#" class="mobile-menu-link"><span class="fa fa-user"></span>Usuario</a></li>
		<li class="mobile-menu-item"><a href="#" class="mobile-menu-link"><span class="fa fa-pencil-square"></span>Editar Perfil</a></li>
		<li class="mobile-menu-item"><a href="#" class="mobile-menu-link"><span class="fa fa-times"></span>Salir</a></li>
	</ul>
</nav>
<div id="overlay"></div>
<div id="topbar">
	<div id="top-menu">
		<div class="logo">
			<a href="index.php" title="ConcertPush" class="logo-link">
				<div></div>
			</a>
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
			<li class="user-menu-item"><a href="" class="user-menu-link">USUARIO</a></li><li class="user-menu-item"><a href="" class="user-menu-link">EDITAR PERFIL</a></li><li class="user-menu-item"><a href="" class="user-menu-link">SALIR</a></li>
		</ul>
	</nav>
</div>
</div>

<script>
	var mobileMenu = new Menu();
	var menuOpenBtn = document.querySelector("#mobile-button-container");

	menuOpenBtn.addEventListener("click", function(e) {
		e.preventDefault;
		mobileMenu.open();
	});
</script>

'; ?>

