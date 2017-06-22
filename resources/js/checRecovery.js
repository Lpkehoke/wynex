var email = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/;

function funSeccess(qwe) {

	if(qwe) 
		alert(qwe);
	else
		location.href='/confirm';
}

function checRecovery(){
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


	$.ajax ({
		url: '/gform' ,
		type: 'POST' , 
		data: 'login_f=3' + '&email=' + $("#email").val(),
		cache: false,
		dataType: "html",
		success: funSeccess
	});
}