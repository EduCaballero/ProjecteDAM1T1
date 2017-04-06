$(document).ready(function() { 
	$('.act-del').click(deleteConcert);
	$('#create-concert input[type="submit"]').click(function() {
		resetErrors();
		// Coloco el nombre y los valores de los inputs en un array
		// excepto el de tipo submit, para validarlo con ajax
		var data = {};
		$.each($('#create-concert input, #create-concert select'), function(i, v) {
     		if (v.type !== 'submit') {
        		data[v.name] = v.value;
      		}
      	});
		$.ajax({
      		dataType: 'json',
      		type: 'POST',
      		url: 'validateConcert.php',
      		data: data,
     		success: function(resp) {
     			// si la validacion tiene exito
     			if (resp.validation === true) {
     				// reseteo el formulario
     				$('#create-concert').trigger('reset');
     				// añado una linea en la tabla de conciertos creados con los datos del concierto
     				$('#pending-conc tr:last').after("<tr><input type='hidden' class='idconc' value='" + resp.id_concierto + "'>" +
     					"<td>" + resp.dia + "</td><td>" + resp.hora + "</td><td>" + resp.genero + "</td><td>" + resp.pago + "</td>" +
						"<td>" + resp.inscritos + "</td><td><span class='act-del'>Eliminar</span></td>" +
						"<td><span class='act-upd'>Modificar</span></td></tr>");
     				
     				$('.act-del').click(deleteConcert);

     				return false;
     			} else {
         			$.each(resp, function(k, v) {
         				// k = indice/key, v = valor/value
	          			console.log(k + " => " + v); // ver los mensajes de error en la consola
	          			var error_msg = '<span class="error" for="'+k+'">'+v+'</span>';
	          			//al input con error le añado una clase y despues el mensaje de error
            			$('input[name="' + k + '"], select[name="' + k + '"]').addClass('inputError').after(error_msg);
     				});
     				// nombre de los campos con errores
     				// para seleccionar el primer input con error
     				var keys = Object.keys(resp);
     				$('input[name="'+keys[1]+'"]').focus();
     			}
     			return false;
     		},
     	    error: function() {
        		console.log('Algo ha hecho kaput');
      		}
		});
		return false;
	});

	function resetErrors() {
		$('#create-concert input, #create-concert select').removeClass('inputError');
		$('span.error').remove();
	}

	function deleteConcert() {
		var row = $(this);
		var idcon = $('.idconc', $(this).parents('tr')).val();		
		$.ajax({
			type : "POST",
			url : "delete-concert.php",
			data: {id: idcon},
			success: function() {
		      	row.closest('tr').remove();
		   	}
		});
	}
});
