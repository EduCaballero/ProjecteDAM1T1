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
        <script src="js/src/mobile.js"></script>
        <script src="js/src/modal.js"></script>
        <script src="js/src/index.js"></script>
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
            <div id="overlay"></div>
            <div id="topbar">
                <div class="logo">
                    <a href="index.php" title="ConcertPush" class="logo-link">ConcertPush</a>
                </div><div id="mobile-button-container">
                    <div class="mobile-menu-button" title="Abrir menú">
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
                            <li class="user-menu-item"><div id="signin" class="user-menu-link">INICIAR SESIÓN</div></li><li class="user-menu-item"><a href="signup.php" class="user-menu-link">REGÍSTRATE</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <?php require_once 'includes/modal-login.php'; ?>
        <div>
            pruebas
            1
            2
            3
        </div>
            <footer class="footer">
                <?php require_once 'includes/footer.php'; ?>
            </footer>
        </div>
    </body>
</html>