<?php
if ($_SESSION["tipo"] == "L") {
    if (basename($_SERVER['PHP_SELF']) == "editlocal.php") {
        $user_url = "../local.php";
        $profile_url = "editlocal.php";
        $logout_url = "../logout.php";
    } else {
        $user_url = "local.php";
        $profile_url = "local/editlocal.php";
        $logout_url = "logout.php";
    }
} else if ($_SESSION["tipo"] == "M") {
    if (basename($_SERVER['PHP_SELF']) == "editmusico.php") {
        $user_url = "../musico.php";
        $profile_url = "editmusico.php";
        $logout_url = "../logout.php";
    } else {
        $user_url = "musico.php";
        $profile_url = "musico/editmusico.php";
        $logout_url = "logout.php";
    }
} else if ($_SESSION["tipo"] == "F") {
    if (basename($_SERVER['PHP_SELF']) == "editfan.php") {
        $user_url = "../fan.php";
        $profile_url = "editfan.php";
        $logout_url = "../logout.php";
    } else {
        $user_url = "fan.php";
        $profile_url = "fan/editfan.php";
        $logout_url = "logout.php";
    }
}
?>
<nav id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-top">ConcertPush</div>
    <ul>
        <li class="mobile-menu-item">
            <a href="<?php echo $user_url; ?>" class="mobile-menu-link"><span class="fa fa-user"></span>Usuario</a>
        </li>
        <li class="mobile-menu-item">
            <a href="<?php echo $profile_url; ?>" class="mobile-menu-link"><span class="fa fa-pencil-square"></span>Editar Perfil</a>
        </li>
        <li class="mobile-menu-item">
            <a href="<?php echo $logout_url; ?>" class="mobile-menu-link"><span class="fa fa-times"></span>Salir</a>
        </li>
    </ul>
</nav>
<div id="overlay"></div>
<div id="topbar">
    <div id="top-menu">
        <div class="logo">
            <a href="<?php echo $user_url; ?>" title="ConcertPush" class="logo-link">ConcertPush</a>
        </div><div id="mobile-button-container">
            <div class="mobile-menu-button" title="Abrir menú">
                <span class="fa fa-bars"></span></div>
    </div>
</div>


