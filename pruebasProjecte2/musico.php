<?php
require_once 'bbdd.php';
session_start();
if (isset($_SESSION["id"])) {
    if ($_SESSION["tipo"] == "M") {
        $userData = mysqli_fetch_array(getUserDataById($_SESSION["id"]));
        ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>ConcertPush - Músico</title>
                <link rel="stylesheet" href="css/font-awesome.css">
                <link rel="stylesheet" href="css/musico.css">
                <link rel="stylesheet" href="css/intranet.css">
                <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
                <script src="js/src/jquery-3.1.1.min.js"></script>
                <script src="js/src/mobile.js"></script>
                <script src="js/src/musico.js"></script>
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfITkskFnkQFXkgSbMT-AoPXCx9_yHoXw&region=GB"></script>
                <script src="js/src/gmap3.min.js" type="text/javascript"></script>
                <script src="js/src/modal.js" type="text/javascript"></script>
                <link href="css/modalGmap.css" rel="stylesheet" type="text/css"/>
                <script>
                    $(document).ready(function () {
                        $(".showMap").click(function () {
                            //var idLocal= $(this).attr("idLocal");
                            var direccion=$(this).attr("direccion");
                            //var direccion = "stucom, barcelona";
                            $('#map').gmap3({
                                zoom: 10
                            })
                                    .infowindow({})
                                    .marker([
                                        {address: direccion, data: "<h3>" + direccion + "</h3><div>"}
                                    ])
                                    .on('click', function (marker) {  //Al clicar obrim una finestra sobre la marca i hi insertem el data de la marca
                                        marker.setIcon('http://maps.google.com/mapfiles/marker_green.png');
                                        var map = this.get(0); //this.get(0) retorna la primera propietat vinculada-> gmap3
                                        var infowindow = this.get(1); //this.get(1) retorna la segona propietat vinculada -> infowindow
                                        infowindow.setContent(marker.data);     //dins la finestra mostrem el atribut data de la marca
                                        infowindow.open(map, marker);
                                    })
                                    .fit();
                        });
                    });


                </script>


            </head>

            <body>
                <header>
                    <?php require_once 'includes/header-intranet.php'; ?>
                </header>
                <div id="container">
                    <div id="profile">
                        <?php require_once 'includes/music-profile.php'; ?>
                    </div>
                    <div id="main">
                        <div id="pending" class="content">
                            <div class="content-container">
                                <h2><span class="fa fa-calendar"></span>Conciertos pendientes de asignar</h2>
                                <table id='pending-table' class="contentTable">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th width="18%">Ciudad</th>
                                            <th width="23%">Local</th>
                                            <th width="18%">Género</th>
                                            <th>Pago</th>
                                            <th>Inscritos</th>
                                            <th colspan="2">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $pending = MusicoPendienteAsignar();
                                        while ($row = mysqli_fetch_array($pending)) {
                                            echo "
                                            <tr>
                                                <input type='hidden' value='" . $row["id_concierto"] . "'>";
                                            //idLocal($row["id_concierto"]);
                                            $idLocal = idLocal($row["id_concierto"]);
                                            $direccion = address($idLocal) . ", " . $row["ciudad"];

                                            echo "
                                                <td>" . $row["dia"] . "</td>
                                                <td>" . $row["hora"] . "</td>
                                                <td>" . $row["ciudad"] . "</td>" .
                                            '<td class="showMap" idLocal="' . $idLocal . '" direccion="' . $direccion . '" ><a href="#gmodal" title="">' . $row["local"] . '</a></td>'
                                            . "<td>" . $row["genero"] . "</td>
                                                <td>" . $row["pago"] . "</td>
                                                <td>" . $row["inscritos"] . "</td>";
                                            if (musicSignedUp($_SESSION["id"], $row["id_concierto"])) {
                                                echo "
                                                    <td><span class='disabled'>Inscribirse</span></td>
                                                    <td><span class='enabled'>Baja</span></td>
                                                </tr>";
                                            } else {
                                                echo "
                                                    <td><span class='signup enabled'>Inscribirse</span></td>
                                                    <td><span class='disabled'>Baja</span></td>
                                                </tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="assigned" class="content">
                            <div class="content-container">
                                <h2><span class="fa fa-calendar-check-o"></span>Conciertos asignados</h2>
                                <table id='assigned-table' class="contentTable">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th width="18%">Ciudad</th>
                                            <th width="23%">Local</th>
                                            <th width="36%">Dirección</th>
                                            <th width="10%">Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        //Llamamos a la funcion de la tabla 2 de musicos
                                        $assigned = MusicoAsignado($_SESSION["id"]);
                                        //Extraccion de datos
                                        while ($row = mysqli_fetch_array($assigned)) {
                                            echo "
                                            <tr>
                                                <td>" . $row["dia"] . "</td>
                                                <td>" . $row["hora"] . "</td>
                                                <td>" . $row["ciudad"] . "</td>
                                                <td>" . $row["loc"] . "</td>
                                                <td>" . $row["direccion"] . "</td>
                                                <td>" . $row["pago"] . "</td>
                                            </tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <footer class="footer">
                            <?php require_once 'includes/footer.php'; ?>
                        </footer>
                    </div>
                </div>

                <!--<div id="modal-map" class="modal">
                    <div class="modal-container" tabindex="-1">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Dirección: <?php $row["local"]; ?></h3>
                                <button type="button" class="fa fa-lg fa-close btn-close close-modal"></button>	
                            </div>
                            <div class="modal-body">
                                <div id="map" style="height: 200px; width: 100%;background-color: black;">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-reset close-modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <!--<div id="map" style="height: 200px; width: 200px;background-color: black; display: none; position: fixed;">-->


                <!--<a href="#miModal">Abrir Modal</a>
                
                <div id="miModal" class="modal">
                  <div class="modal-contenido">
                    <a href="#">X</a>
                    <div id="map" style="height: 200px; width: 200px;"></div>
                  </div>  
                </div>-->

                <!--<a href="#modal" title="" class="BTN">Pincha aquí</a>-->

                <div id="gmodal">
                    <a href=""></a>
                    <div id="modalContent">
                        <div id="map" style="height: 200px; width: 200px;"></div>
                        <a href="" class="btn btn-reset close-modal">X</a>
                    </div>
                </div>

            </div>
        </body>
        </html>
        <?php
    } else {
        if ($_SESSION["tipo"] == "F") {
            header("Location: fan.php");
        } else if ($_SESSION["tipo"] == "L") {
            header("Location: local.php");
        }
    }
} else {
    header("Location: index.php");
}
?>