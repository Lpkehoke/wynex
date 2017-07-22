function funSeccess() {
 	location.reload();
}


function outProfile() {
	$.ajax ({
		url: '/gform' ,
		type: 'POST' , 
		data: 'login_f=5',
		cache: false,
		dataType: "html",
		success: funSeccess
	});
}