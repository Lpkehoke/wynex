var loginCh = /^[a-zA-Z1-9]+$/;

function funSeccessinp(qwe) {
	if (qwe){
		alert(qwe);
		return false;
	}
	location.href='/';
}

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

	var str = ('&login=' + $("#login").val() + '&password=' + $("#password").val() ) ;

	$.ajax ({
		url: '/gform' ,
		type: 'POST' , 
		data: 'login_f=1' + str,
		cache: false,
		dataType: "html",
		success: funSeccessinp
	});


}