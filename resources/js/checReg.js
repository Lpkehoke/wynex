var loginCh = /^[a-zA-Z1-9]+$/;
var email = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/;


function checReg() {
	if ($("#loginR").val() == ""){
		$("#uncorrectR").hide();
		$("#empty-logR").show();
		return false;
	}
	else 
		$("#empty-logR").hide();


	if (loginCh.test($("#loginR").val()) == false){
		$("#uncorrectR").show();
		return false;
	}
	else
		$("#uncorrectR").hide();

	if ($("#email").val() == ""){
		$("#unemail").hide();
		$("#empty-email").show();
		return false;
	}
	else
		$("#empty-email").hide();

	if (email.test($("#email").val()) == false){
		$("#unemail").show();
		return false;
	}
	else
		$("#unemail").hide();

	if ($("#passwordR").val() == ""){
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
}