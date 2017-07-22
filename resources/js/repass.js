function funSeccesspass() {
	$("#seccses").show();
}

function repass() {
	if ($("#passwordR").val() == ""){
		$("#uncor-pasR").hide();
		$("#empty-pasR").show();
		return false;
	}
	else
		$("#empty-pasR").hide();

	if ($("#passwordR").val() != $("#repasswordR").val()){
		$("#repas-er").show();
		return false;
	}
	else
		$("#repas-er").hide();

	str = "&new=" + $("#passwordR").val();

	$.ajax ({
		url: '/gform' ,
		type: 'POST' , 
		data: 'login_f=6' + str,
		dataType: "html",
		success: funSeccesspass
	});
}