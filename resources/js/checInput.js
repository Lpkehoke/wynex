var loginCh = /^[a-zA-Z1-9]+$/;

function checInput() {
	if ($("#login").val() == ""){
		$("#uncorrect").hide();
		$("#empty-log").show();
		return false;
	}
	else 
		$("#empty-log").hide();


	if (loginCh.test($("#login").val()) == false){
		$("#uncorrect").show();
		return false;
	}
	else
		$("#uncorrect").hide();

	if ($("#password").val() == ""){
		$("#empty-pas").show();
		return false;
	}
	else
		$("#empty-pas").hide();


	

	
}