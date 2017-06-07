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
                                    <span>Inicio</span>
                                </h2>
                            </div>
                            <!--//AQUÍ SUBIR IMÁGENES------------------------------------------------------->
                            <div class="content-mid"></div>

                        <div class="col-md-5">
                            <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
                            <!----Calender -------->
                            <link rel="stylesheet" href="css/clndr.css" type="text/css" />
                            <script src="js/underscore-min.js" type="text/javascript"></script>
                            <script src= "js/moment-2.2.1.js" type="text/javascript"></script>
                            <script src="js/clndr.js" type="text/javascript"></script>
                            <script src="js/site.js" type="text/javascript"></script>
                            <!----End Calender -------->
                        </div>
                        <div class="col-md-7 mid-content-top">
                            <div class="middle-content">
                                <h3>Latest Images</h3>
                                <!-- start content_slider -->
                                <div id="owl-demo" class="owl-carousel text-center">
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na1.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na2.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na1.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na2.jpg" alt="name">
                                    </div>
                                    <div class="item">
                                        <img class="lazyOwl img-responsive" data-src="images/na.jpg" alt="name">
                                    </div>

                                </div>
                            </div>
                            <!--//sreen-gallery-cursual---->
                            <!-- requried-jsfiles-for owl -->
                            <link href="css/owl.carousel.css" rel="stylesheet">
                            <script src="js/owl.carousel.js"></script>
                            <script>
                      $(document).ready(function () {
                          $("#owl-demo").owlCarousel({
                              items: 3,
                              lazyLoad: true,
                              autoPlay: true,
                              pagination: true,
                              nav: true,
                          });
                      });
                            </script>
                      
                    </div>
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