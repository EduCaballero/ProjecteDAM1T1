<?php
require_once '../bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
    if ($_SESSION["tipo"] == "A") {
        ?>
        <html>
            <head>
                <title>PANEL DE ADMINISTRACIÓN</title>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
                      Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
                <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
                <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
                <!-- Custom Theme files -->
                <link href="css/style.css" rel='stylesheet' type='text/css' />
                <link href="css/font-awesome.css" rel="stylesheet"> 
                <script src="js/jquery.min.js"></script>
                <!-- Mainly scripts -->
                <script src="js/jquery.metisMenu.js"></script>
                <script src="js/jquery.slimscroll.min.js"></script>
                <!-- Custom and plugin javascript -->
                <link href="css/custom.css" rel="stylesheet">
                <script src="js/custom.js"></script>
                <script src="js/screenfull.js"></script>
                <script>
                    $(function () {
                        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

                        if (!screenfull.enabled) {
                            return false;
                        }



                        $('#toggle').click(function () {
                            screenfull.toggle($('#container')[0]);
                        });



                    });
                </script>

                <!----->

                <!--pie-chart--->
                <script src="js/pie-chart.js" type="text/javascript"></script>
                <script type="text/javascript">

                    $(document).ready(function () {
                        $('#demo-pie-1').pieChart({
                            barColor: '#3bb2d0',
                            trackColor: '#eee',
                            lineCap: 'round',
                            lineWidth: 8,
                            onStep: function (from, to, percent) {
                                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                            }
                        });

                        $('#demo-pie-2').pieChart({
                            barColor: '#fbb03b',
                            trackColor: '#eee',
                            lineCap: 'butt',
                            lineWidth: 8,
                            onStep: function (from, to, percent) {
                                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                            }
                        });

                        $('#demo-pie-3').pieChart({
                            barColor: '#ed6498',
                            trackColor: '#eee',
                            lineCap: 'square',
                            lineWidth: 8,
                            onStep: function (from, to, percent) {
                                $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                            }
                        });


                    });

                </script>
                <!--skycons-icons-->
                <script src="js/skycons.js"></script>
                <!--//skycons-icons-->
            </head>
            <body>
                <div id="wrapper">

                    <!----->
                    <nav class="navbar-default navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1> <a class="navbar-brand" href="index.php">ConcertPush</a></h1>         
                        </div>
                        <div class=" border-bottom">
                            <div class="full-left">
                                <section class="full-top">
                                    <button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
                                </section>
                                <!--<form class=" navbar-left-right">
                                    <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {
                                  this.value = 'Search...';}">
                                    <input type="submit" value="" class="fa fa-search">
                                </form>-->
                                <div class="clearfix"> </div>
                            </div>
                            <div class="clearfix">

                            </div>

                            <div class="navbar-default sidebar" role="navigation">
                                <div class="sidebar-nav navbar-collapse">
                                    <ul class="nav" id="side-menu">

                                        <li>
                                            <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Inicio</span> </a>
                                        </li>

                                        <li>
                                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label">Administración</span><span class="fa arrow"></span></a>
                                            <ul class="nav nav-second-level">
                                                <li><a href="gallery.php" class=" hvr-bounce-to-right"> <i class="fa fa-picture-o nav_icon"></i>Banners</a></li>

                                                <li><a href="404.html" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>404</a></li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </nav>
                    <div id="page-wrapper" class="gray-bg dashbard-1">
                        <div class="content-main">

                            <!--banner-->	
                            <div class="banner">

                                <h2>
                                    <a href="index.php">Home</a>
                                    <i class="fa fa-angle-right"></i>
                                    <span>Banners</span>
                                </h2>
                            </div>
                            <!--//AQUÍ SUBIR IMÁGENES------------------------------------------------------->
                            <div class="content-mid">


                                <form id="local-profile" class="form-profile" action="" method="POST" enctype="multipart/form-data">
                                    <!-- Input hidden con la ID para la comprobacion de la contraseña -->
                                    <input type="hidden" id="userid" value="<?php echo $_SESSION["id"] ?>">

                                    <div class="form-row">
                                        <label>Imagen de perfil </label><div class="input-file-wrap">
                                            <div class="btn btn-file">
                                                <i class="fa fa-file-image-o"></i>
                                                <span>Examinar …</span> 
                                                <input type="file" accept="image/*" name="profileImg">
                                            </div>
                                            <div class="img-caption">
                                                <div class="img-caption-name"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label></label><div class="input-wrap">
                                            <input type="submit" name="update" value="Modificar" class="btn btn-submit"/><input type="reset" value="Limpiar" class="btn btn-reset"></div>
                                    </div>
                                </form>




                            </div>
                            <div class="copy">
                                <p>CONCERTPUSH - ¡Por la música!</p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!---->
                <!--scrolling js-->
                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <!--//scrolling js-->
                <script src="js/bootstrap.min.js"></script>
            </body>
        </html>
    <?php
    } else {
        header("Location: https://previews.123rf.com/images/carmendorin/carmendorin1502/carmendorin150200075/37151501-Grunge-rubber-stamp-with-text-Access-Prohibited-vector-illustration-Stock-Vector.jpg");
    }
}
?>