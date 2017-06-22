var loginCh = /^[a-zA-Z1-9]{3,30}$/;
var email = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/;
//var pass = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/;

var qwe;

function funSeccess(qwe) {
	if (qwe){
		alert(qwe);
		return false;
	}
	location.href= '/confirm';
}


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
		$("#uncor-pasR").hide();
		$("#empty-pasR").show();
		return false;
	}
	else
		$("#empty-pasR").hide();

	/*if (pass.test($("#uncor-pasR").val()) == false){
		$("#uncor-pasR").show();
		return false;
	}
	else
		$("#uncor-pasR").hide();*/

	if ($("#passwordR").val() != $("#repasswordR").val()){
		$("#repas-er").show();
		return false;
	}
	else
		$("#repas-er").hide();


var str = ('&login=' + $("#loginR").val() + '&password=' + $("#passwordR").val() + '&email=' + $("#email").val() );


	$.ajax ({
		url: '/gform' ,
		type: 'POST' , 
		data: 'login_f=2' + str,
		dataType: "html",
		success: funSeccess
	});




}