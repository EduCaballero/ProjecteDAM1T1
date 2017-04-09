function enableModal(id) {
	resetErrors();
	$('body').addClass('has-active-modal');
	$(id).css('display','block');
	
	$(id+ ' .close-modal').click(function() {
		disableModal(id);
	});
	
	$('<div class="modal-background"></div>').appendTo('body');
	// si creo el background con la clase 'in' 
	// no hace la transicion de opacidad
	setTimeout(function() { $('.modal-background').addClass('in'); }, 10);
	// Focus para el focusout
	$('.modal-container').focus(); 
	// Forma pedestre de evitar el focusout cuando se clica o tabula en
	// un hijo, aunque si tabulo fuera despues de haber tabulado en un hijo
	// sigue sin cerrarse, I NEED HELP - preventDefault(), stopPropagation()
	// TELL ME YOUR SECRETS
	var out = true;
	$('.modal-container').mousedown(function() { out = false; });
	$('.modal-container').keydown(function() { out = false; });
	// si se piedre el focus (se clica fuera), se cierra el modal
	$('.modal-container').on("focusout", function() {
		if (out) disableModal(id);
		out = true;
	});
} 

function disableModal(id) {
	$(id).hide();
	setTimeout(function() { $('.modal-background').removeClass('in'); }, 100);
	setTimeout(function() { 
		$('.modal-background').remove(); 
		$('body').removeClass('has-active-modal');
		$('.modal-container, .modal-content , .close-modal').off();
	}, 400);
}

function resetErrors() {
	$('input, select').removeClass('inputError');
	$('span.error').remove();
}