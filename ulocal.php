<!DOCTYPE html>
<?php
require_once 'bbdd.php';
session_start();
        ?>
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
     <header>
        <?php
        if (isset($_SESSION["id"])) {
            $userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
            require_once 'includes/header-intranetFooter.php';
        } else {
        ?>
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
        <?php } 
        require_once 'includes/modal-login.php'; ?>
         </header>
        <div id="slider">
            <div id="slider-content">
                <h1>ConcertPush</h1>
                    <h6>¿Tienes un local?¡Éste es tu sitio!</h6>
            </div>
        </div>
        <div class="main-container">
            <div><h3>¿Por qué deberías estar en ConcertPush?</h3>
                    <p>Consectetur adipiscing elit. Phasellus sit amet ante sollicitudin, vulputate magna tempor, ullamcorper ligula. Sed semper libero a tortor lobortis, a interdum eros vestibulum. Vestibulum dictum vel felis venenatis convallis. Praesent eleifend convallis tortor, id auctor tortor tempus eget. Donec in tempor odio. Suspendisse porta varius dui id pulvinar. In malesuada, augue id ultricies pharetra, nibh arcu maximus dolor, at dictum nisl ex vehicula enim. Etiam interdum arcu ac tristique auctor. Nam euismod non libero at dictum. Proin ultrices urna quis libero interdum dictum. Nam sed sem eu arcu rutrum ornare. Sed in mi sollicitudin, euismod odio at, luctus sem. Maecenas vitae nulla dapibus, maximus lorem vel, lacinia orci. Mauris ac odio eget dolor lacinia commodo in in enim. Nunc sem orci, mollis at tempus at, rutrum quis turpis. Donec nulla dolor, tincidunt a nulla vitae, laoreet fringilla ex.</p>
                    <p>Mauris commodo, turpis vitae fermentum maximus, velit enim imperdiet dolor, sit amet volutpat urna odio ut elit. Donec vulputate, risus vitae sollicitudin sagittis, libero elit egestas nisl, gravida malesuada nisi justo nec sapien. Vestibulum vitae consequat dolor. Integer in dui leo. Aliquam vel eros diam. Quisque nec dui sodales, porttitor ex eget, finibus arcu. Proin pulvinar maximus enim.</p>
                    <h3>¿Te gusta lo que lees? ¡Inscríbite!</h3>
                    <p>Pellentesque feugiat sed turpis in faucibus. Nulla ullamcorper augue sapien, vitae dictum augue semper ac. Suspendisse non augue id tellus viverra sollicitudin sit amet et nisl. Donec nec mollis turpis, at malesuada nibh. Nulla facilisi. Cras ornare imperdiet rhoncus. Fusce ultrices tortor sapien, sed faucibus dui condimentum ac. Morbi hendrerit nulla mi, a euismod mauris efficitur at. Etiam cursus interdum tellus a aliquet. Mauris est purus, sollicitudin ac lectus et, placerat ornare ex. Morbi at sagittis augue, et viverra lacus. Maecenas augue lacus, commodo quis mauris hendrerit, volutpat sodales magna. Quisque eleifend ornare fermentum.</p>
                    <p>Sed gravida eros odio, sed placerat nunc condimentum et. Praesent pretium, tellus ac fringilla pulvinar, dui est egestas est, vitae rhoncus lacus tellus lobortis magna. Nunc convallis, enim a auctor maximus, tellus dui efficitur metus, at aliquet tortor diam non nibh. Nunc rhoncus ex vel sodales lacinia. Nunc a eleifend leo, a ullamcorper justo. Morbi libero nisi, sodales id urna eu, aliquet sagittis ex. Ut vel nibh scelerisque, cursus orci sed, rutrum tortor. Aenean luctus accumsan enim, eu blandit est sagittis id. Integer posuere tortor in tellus placerat, eget accumsan arcu blandit.</p>
                    <p>Phasellus auctor suscipit erat, vel commodo orci hendrerit nec. Morbi dapibus tellus ut mi sodales convallis. Proin volutpat at lorem sed congue. Vestibulum sit amet ornare purus, eget pulvinar mi. Suspendisse fermentum ex vulputate, mattis nisl mattis, posuere enim. Etiam tempus turpis eu nisl congue, sit amet consequat libero vulputate. Integer non est a turpis convallis dapibus. Nulla sagittis facilisis felis. Nullam vel fringilla lorem.</p>
                </div>
            <footer class="footer">
                 <?php require_once 'includes/footer.php'; ?>
            </footer>
        </div>
        
    </div>
</body>
</html>