<?php
/*
	1 - login ++
	2 - regist ++ 
	3 - recovery
	4 - confirm
	5 - logout ++ 
*/
if ($_POST['login_f'] == 1) 
{
	$sol =  mysqli_query( $connection , "SELECT `solid` FROM `users` WHERE `login` = '$_POST[login]'" );
	$solt =  mysqli_fetch_assoc($sol)[solid];
	$_POST[password] = crypt( $_POST[password] , $solt);
	if ( !mysqli_num_rows(mysqli_query($connection , "SELECT `id` FROM `users` WHERE `login` = '$_POST[login]' AND `password` = '$_POST[password]' ")))
		exit ('Неправильно введен логин или пароль');
	$row = mysqli_fetch_assoc(mysqli_query($connection , "SELECT * FROM `users` WHERE `login` = '$_POST[login]'"));
	foreach ($row as $key => $value)
		$_SESSION[$key] = $value;
}



if ($_POST['login_f'] == 2) 
{
	if ( mysqli_num_rows(mysqli_query($connection , "SELECT `id` FROM `users` WHERE `login` = '$_POST[login]'")))
		exit ('Этот логин занят');
	if ( mysqli_num_rows(mysqli_query($connection , "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]'")))
		exit('Эта почта занята');
	$code = random_str(5);
	$_SESSION['confirm'] = array(
		'login' => $_POST['login'],
		'password' => $_POST['password'],
		'email' => $_POST['email'],
		'code' => $code
	);
	$title = "Регистрация";
	$body="--$bound\n";
	$body.="Content-type: text/html; charset=\"windows-1251\"\n";
	$body.="Content-Transfer-Encoding: 8bit\n\n";
	$body.="
  	<br /><br />Код подтверждения регистрации: <b>$code</b><br />";
	mail($_POST['email'], $title , $body);
}


if ($_POST['login_f'] == 4)
{

	if ($_SESSION["confirm"]["from"] == 'recovery')
	{
		if ($_POST['code'] == $_SESSION['confirm']['code'])
		{
			$_newPass = random_str(8);
			$_newSoll = random_str(10);
			mysqli_query($connection , 'UPDATE `users` SET `password` = "'.crypt($_newPass , $_newSoll).'" WHERE `email` = "'.$_SESSION['confirm']['email'].'" ');
			mysqli_query($connection , 'UPDATE `users` SET `solid` = "'.$_newSoll.'" WHERE `email` = "'.$_SESSION['confirm']['email'].'" ');
			$title = "Новый пароль";
			$body="--$bound\n";
			$body.="Content-type: text/html; charset=\"windows-1251\"\n";
			$body.="Content-Transfer-Encoding: 8bit\n\n";
			$body.="<br /><br />Ваш новый пароль: <b>$_newPass</b> Вы можете изменить его в личном кабинете<br />";
			mail($_SESSION["confirm"]["email"], $title , $body);
			echo "Новый пароль у вас на почте";
			unset($_SESSION['confirm']);
			die();
		}
		else{
			exit('Код подтверждения не верный');
			die();
		}
	}

	if ($_POST['code'] == $_SESSION['confirm']['code']){
		$sol = random_str(10);
		$timeFF = time();
		mysqli_query($connection , 'INSERT INTO `users` (`login`, `email` ,`password`, `solid` , `data_of_registration` ) VALUES ("'.$_SESSION['confirm']['login'].'" , "'.$_SESSION["confirm"]["email"].'" ,"'.crypt($_SESSION["confirm"]["password"] , $sol).'" , "'.$sol.'" , "'.$timeFF.'")');
		unset($_SESSION['confirm']);
		}
	else
		exit('Код подтверждения не верный');
}


if ($_POST['login_f'] == 3)
{
	if ( !mysqli_num_rows(mysqli_query($connection , "SELECT `id` FROM `users` WHERE `email` = '$_POST[email]'")))
		exit('Аккаунт не найден');
	$code = random_str(5);
	$_SESSION['confirm'] = array(
		'email' => $_POST['email'],
		'code' => $code,
		'from' => 'recovery');
	$title = "Восстановление пароля";
	$body="--$bound\n";
	$body.="Content-type: text/html; charset=\"utf-8\"\n";
	$body.="Content-Transfer-Encoding: 8bit\n\n";
	$body.="<br /><br />Код подтверждения восстановления пароля: <b>$code</b><br />";
	mail($_POST["email"], $title , $body);
}

if ($_POST['login_f'] == 5){
	session_destroy();
}
?>