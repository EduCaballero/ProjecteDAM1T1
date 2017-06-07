<div id="delete-user-modal" class="modal">
    <div class="modal-container" tabindex="-1">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Borrar Cuenta</h3>
                <button type="button" class="fa fa-lg fa-close btn-close close-modal"></button>	
            </div>
            <div class="modal-body">
                <p><?php echo "Estas seguro que te quieres dar de baja para siempre?"; ?></p>
            </div>
            <div class="modal-footer">
                <form action="../darDeBaja.php" method="POST">
                     <input type="submit" name="delete" value="Borrar Cuenta" class="btn btn-submit">
                    <button class="btn btn-reset close-modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
