

function funSeccessCode(qwe) {
	if (qwe == "Код подтверждения не верный"){
		alert(qwe);
		return false;
	}
	if (qwe == "Новый пароль у вас на почте")
		alert(qwe);
	location.href= '/login';
}
function checCode() {
	str = '&code=' + $("#code").val();
	$.ajax ({
	url: '/gform' ,
	type: 'POST' , 
	data: 'login_f=4' + str,
	cache: false,
	dataType: "html",
	success: funSeccessCode
	});
}





