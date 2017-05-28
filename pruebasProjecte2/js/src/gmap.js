$(document).ready(function () {
    $(".showMap").click(function () {
        var local = $(this).attr("local");
        var direccion = $(this).attr("direccion");
        var img = $(this).attr("img");
        //var direccion = "stucom, barcelona";
        $('#map').gmap3({
            options: {
                zoom: 10
            }
        })
                .infowindow({})
                .marker([
                    {address: direccion, data: "<h4>" + local + "</h4>\n\
                                                        <p>" + direccion + '</p>\n\
                                        <img src="img/' + img + '" alt="" width="100" height="120">'}
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