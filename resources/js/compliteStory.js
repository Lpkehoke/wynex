var nameStor = "";
var count = 1; /////////////id блока 1 в 1
var linkpar = []; // предок
var linkchi = []; // ребенок
var fin = []; // финалы


function saveName() {
	if ($("#text-name-inp").val()){
		nameStor = $("#text-name-inp").val();
		$("#level-1-name").hide();
		$(".rools").show();
		$(".main-const").prepend("<div style='text-align:center;'><span style='font-size:1.5em; margin:auto;'>" + nameStor + "</span></div><br>");
		$(".main-const").append("<div id='level-2-story' class='level-2-story id1'><span>id = 1.Старт</span><br><textarea class='text-of-story-all text-of-story-1'></textarea><br><br><span class='error text-err-1'>Введите текст<br><br></span><input type='text' placeholder='Название переходной ветки' class='change-all change-branch-1'><br><br><span class='error name-err-str-1'>Введите название<br><br></span><button class='but-for-new' onclick='criate(1)'>Сделать ответвление</button></div>");
		$(".level-2-story").show();
		$(".save-story").show();
	} else {
		$("#name-err").show();
	}
}


function criate( fromid ) {
	$(".name-err-str-" + fromid).hide();
	$(".text-err-" + fromid).hide();
	if ($(".text-of-story-" + fromid).val()){
		$(".text-err-" + fromid).hide();
	} else {
		$(".text-err-" + fromid).show();
		return false;
	}
	if ($(".change-branch-" + fromid).val()){
		$(".name-err-str-" + fromid).hide();
	} else {
		$(".name-err-str-" + fromid).show();
		return false;
	}
	count++;
	linkpar[ count - 2 ] = fromid;
	linkchi[ count - 2 ] = count;
	$(".main-const").append("<div id='level-2-story' class='level-2-story id" + count + "'><span>id = " + count + ". Эта ветка от id = " + fromid + "</span><br><span class='to-this-" + count + "'>" + $(".change-branch-" + fromid).val() + "</span><br><textarea class='text-of-story-all text-of-story-" + count + "'></textarea><br><br><span class='final-s final-" + count + "'>Это один из финалов<br><br></span><span class='but-for-hide-" + count + "'><span class='error text-err-" + count +"'>Введите текст<br><br></span><input type='text' placeholder='Название переходной ветки' class='change-all change-branch-" + count +"'><br><br><span class='error name-err-str-" + count +"'>Введите название<br><br></span><button class='but-for-new but-for-hide-" + count + "' onclick='criate(" + count +")'>Сделать ответвление</button><br></span><button class='but-for-new' onclick='removebr(" + count + ")'>Удалить эту ветку</button><br><button class='but-for-new but-for-hide-" + count +"' onclick='finishS(" + count + ")'>Это конечное звено</button></div>");
	$(".level-2-story").show();
	$(".change-branch-" + fromid).val('');
}

function removebr( idrem ) {
	for ( var i = 0; i < linkpar.length; ++i )
		if ( linkpar[ i ] == idrem ) 
			removebr( linkchi[i] );
		else 
		{
			$(".id" + idrem).remove();
			linkpar[idrem - 2] = 0;
			linkchi[idrem - 2] = 0;
		}
}

function finishS( id ) {
	$(".change-branch-" + id).hide();
	$(".but-for-hide-" + id).hide();
	$(".final-" + id).show();
	fin[fin.length] = id;
}

function funSeccess( err ) {
	alert(err);
}

function saveSt() {
	var str = ( 'name=' + $("#text-name-inp").val() );
	str += ( '&text1=' + $(".text-of-story-1").val() );
	for ( var i = 0; i < count; i++ ){
		if ( linkchi[i] )
			str += ("&text"+ ( i + 2 ) + "=" + $(".text-of-story-" + (i + 2) ).val() + "&choise"+ ( i + 2 ) + "=" + $(".to-this-" + (i + 2) ).html() + "&idper"+ ( i + 2 ) + "=" + linkpar[i] );
	}
	for (var i = 0; i < fin.length ; i++) 
		str += ( "&idoffin" + (i + 1) + "=" + fin[i] ); 
	
	$.ajax ({
		url: '/enginConstruct' , 
		type: 'POST' , 
		data: str,
		cache: false,
		dataType: "html",
		success: funSeccess
	});
}