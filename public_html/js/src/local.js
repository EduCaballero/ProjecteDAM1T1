function checkdate(date_inp,time_inp) {
	var validDate = moment(date_inp, "DD-MM-YYYY").isValid();
	if (!validDate) {
		alert("Formato de la fecha invalido");
		$("#concert-date").select();
		return false;
	}
	var validTime = moment(time_inp, "HH:mm").isValid();
	if (!validTime) {
		alert("Formato de la hora invalido");
		$("#concert-hour").select();
		return false;
	}
	var isBefore;
	$.ajax({
		type : "POST",
		async: false,
		url : "server-date.php",
		dataType : "json",
		data: {date: $("#concert-date").val()},
		success: (function(data) {
	      		isBefore = data;
	   	})
	});
	if (isBefore) {
		alert("La fecha no puede ser anterior a la actual");
		$("#concert-date").select();
		return false;
	}
	return true;
}