$(document).ready(function () {
    $('#pending-table .enabled').click(signUpConcert);
    $(".showMap").click(function () {
        gmap($(this));
    });
});

function signUpConcert() {
    var id = $(this).closest('tr').children('input').val();
    var signup = $(this).hasClass('signup') ? 1 : 0;
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: "signup-concert.php",
        data: {concertId: id, signup: signup},
        success: function (resp) {
            $('#pending-table tbody').html(resp);
            $('#pending-table .enabled').click(signUpConcert);
        },
        error: function () {
            console.log('Algo ha petado');
        }
    });
}

function gmap(elem) {
    var local = elem.attr("local");
    var direccion = elem.attr("direccion");
    var img = elem.attr("img");
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
    enableModal("#gmap-modal");
}