<div id="gmap-modal" class="modal">
    <div class="modal-container" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Dirección:</h3>
                <button type="button" class="fa fa-lg fa-close btn-close close-modal"></button>	
            </div>
            <div class="modal-body">
                <script>
            $(document).ready(function () {
                $('#map').gmap3({
                    zoom: 10
                })
                        .infowindow({})
                        .marker([
                            {address: "<?php echo $direccion ?>", data: "<h3><?php echo $direccion ?></h3><div>"}
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
        </script>
            </div>
            <div class="modal-footer">
                <button class="btn btn-reset close-modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="gmap-modal" class="modal">
    <div class="modal-container" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Dirección:</h3>
                <button type="button" class="fa fa-lg fa-close btn-close close-modal"></button>	
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button class="btn btn-reset close-modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>