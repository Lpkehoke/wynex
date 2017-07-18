var nameStor = "";
var count = 1; /////////////id блока 1 в 1
var linkpar = []; // предок
var linkchi = []; // ребенок
const MIN_SLIDE = -1; /// минимальное колво слайдов
var openRen = false; // открыт ли редактор изменения названия
const Max_NAME = 60; // max length of name


function saveName() 
{
	nameStor = $("#text-name-inp").val();
	if (nameStor){
		if (nameStor.length > Max_NAME)
		{
			alert("Введите более короткое название");
			return false;
		}
		$("#level-1-name").hide();
		$(".rools").show();
		$(".main-const").prepend("<div style='text-align:center;'><span style='font-size:1.5em; margin:auto;' class='truename'>" + nameStor + "</span></div><br>");
		$(".main-const").append("<div id='level-2-story' class='level-2-story id1'><span>id = 1.Старт</span><br><textarea class='text-of-story-all text-of-story-1'></textarea><br><br><span class='error text-err-1'>Введите текст<br><br></span><input type='text' placeholder='Название переходной ветки' class='change-all change-branch-1'><br><br><span class='error name-err-str-1'>Введите название<br><br></span><button class='but-for-new' onclick='criate(1)'>Сделать ответвление</button></div>");
		$(".level-2-story").show();
		$(".save-story").show();
	} 
	else 
	{
		$("#name-err").show();
	}
}


function criate( fromid ) 
{
	$(".err-min").remove();
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
	$(".main-const").append("<div id='level-2-story' class='level-2-story id" + count + "'><span>id = " + count + ". Эта ветка от id = " + fromid + "</span><br><p class='to-this to-this-" + count + "'>" + $(".change-branch-" + fromid).val() + "</p><br><textarea class='text-of-story-all text-of-story-" + count + "'></textarea><br><br><span class='final-s final-" + count + "'>Это один из финалов<br><br></span><span class='but-for-hide-" + count + "'><span class='error text-err-" + count +"'>Введите текст<br><br></span><input type='text' placeholder='Название переходной ветки' class='change-all change-branch-" + count +"'><br><br><span class='error name-err-str-" + count +"'>Введите название<br><br></span><button class='but-for-new but-for-hide-" + count + "' onclick='criate(" + count +")'>Сделать ответвление</button><br></span><button class='but-for-new' onclick='removebr(" + count + ")'>Удалить эту ветку</button><br><button class='but-for-new but-for-hide-" + count +"' onclick='finishS(" + count + ")'>Это конечное звено</button></div>");
	$(".level-2-story").show();
	$(".change-branch-" + fromid).val('');
}

function removebr( idrem ) 
{
	$(".err-min").remove();
	for ( var i = 0 ; i < linkpar.length; ++i )
		if ( linkpar[ i ] == idrem ) 
			removebr( linkchi[i] );
		else 
		{
			$(".id" + idrem).remove();
			linkpar[idrem - 2] = 0;
			linkchi[idrem - 2] = 0;
		}
}

function finishS( id ) 
{
	$(".err-min").remove();
	$(".change-branch-" + id).hide();
	$(".but-for-hide-" + id).hide();
	$(".final-" + id).show();
	for (var i = 0; i < linkpar.length; i++)
		if (id == linkpar[i])
			removebr(linkchi[i]);
}

function rename() 
{
	if (!openRen)
		$(".main-const").append("<span class='after-rename-hide'>Введите новое название<br><br></span><input type='text' class='change-all after-rename-hide newName'></input><span class='after-rename-hide'><br><br></span><button class='but-for-new after-rename-hide' onclick='saverename()'>Сохранить название</button>");
	openRen = true;
}

function saverename() 
{
	temp = $(".newName").val();
	if (temp.length > Max_NAME){
		alert("Введите более короткое название");
		return false;
	}
	openRen = false;
	$(".truename").html('');
	$(".truename").html($(".newName").val());
	nameStor = $(".newName").val(); //// new value
	$(".after-rename-hide").remove();
}

function funfor( errofwr ) 
{
	if (errofwr)
		alert(errofwr); 
	location.href='/';
}

function saveSt() 
{

	$(".err-min").remove();

	for ( var i = 0 ; i < count ; i++ )
		if ( $(".text-of-story-" + (i + 1) ).val() == '')
		{
			$(".text-err-" + (i + 1)).show();
			return false;
		}  // Проверка на пустоту текста  

		if (count < MIN_SLIDE)
		{
		$(".main-const").append("<span class='error err-min'>Необходимо как минимум " + MIN_SLIDE + " эллементов истории!</span>");
		$(".err-min").show();
		return false;
		} /////////// проверка на количество слайдов

		var fin = [];

	for ( var i = 0; i < count - 1; i++ ) 
		if (linkchi[i])
			fin[i] = (i + 2);
		else
			fin[i] = 0;	 /// заполняем финалы id  , чтобы потом отсеить тех,  кого есть дети

	for ( var i = 1; i < count; i++ )
		if (linkpar[i])
			fin[linkpar[i] - 2] = 0; /////////// определение финалов

	var strfortr = "from=1";
	strfortr += ( '&name=' + nameStor );
	strfortr += ( '&text1=' + $(".text-of-story-1").val() );
	
	var num = 1;

	for (var i = 0; i < count ; i++ )
		if ( linkchi[i] )
		{
			strfortr += ("&text"+ ( i + 2 ) + "=" + $(".text-of-story-" + (i + 2) ).val() + "&choise"+ ( i + 2 ) + "=" + $(".to-this-" + (i + 2) ).html() + "&idper"+ ( i + 2 ) + "=" + linkpar[i] );
			num++;
		}
		var numfin = 1;
	for (var i = 0; i < fin.length ; i++) 
		if (fin[i])
		{
			strfortr += ( "&idoffin" + (numfin) + "=" + fin[i] );
			numfin++;
		}
	
	strfortr += "&num=" + num;
	strfortr += "&count=" + count;

	$.ajax ({
		url: '/enginConstruct' , 
		type: 'POST' , 
		data: strfortr,
		cache: false,
		dataType: "html",
		success: funfor
	});/**/
}