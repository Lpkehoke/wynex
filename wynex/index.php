<?php

function random_str( $num = 30 )
{
	return substr(str_shuffle('0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM') , 0 , $num);
}

session_start();

$connection = mysqli_connect('localhost' , 'root' , '' , 'wynex-db');

if ($connection == false)
{
	echo "Не удалось подключиться к базе данных!";
	die();
}

//exit(print_r($_GET));

if($_GET['id_of_story'])
{
	if ( is_numeric($_GET['id_of_story']) ) 
	{
		include 'all/read.php';
		die();
	}
	
}

if ($_SERVER['REQUEST_URI'] == '/')
	$page = 'home';
else
{
	$page = substr($_SERVER['REQUEST_URI'] , 1 );
	if ( !preg_match('/^[A-z0-9]{3,15}$/' , $page) )
	{
		include 'all/page404.php';
		die();
	}
}

//exit(var_dump($_SESSION)); //посмотреть сессию
//unset($_SESSION); // удалить сессию
//session_destroy();	

if ( file_exists('all/' . $page . '.php') )
	include 'all/' . $page . '.php';
else if ( $_SESSION['id'] and file_exists('auth/' . $page . '.php') )
	include 'auth/' . $page . '.php';
else if ( !$_SESSION['id'] and file_exists('guest/' . $page . '.php') )
	include 'guest/' . $page . '.php';
else
	include 'all/page404.php';
?>
