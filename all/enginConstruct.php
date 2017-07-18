<?php

//// 1 - запись


if ($_POST['from'] == 1)
{
	if ( mysqli_num_rows( mysqli_query ($connection , "SELECT `nstory` FROM `story` WHERE `nstory` = '$_POST[name]' ") ) )
		exit('История с таким названием уже существует');

	mysqli_query($connection , "UPDATE `users` SET `number_of_story` = `number_of_story` + 1 WHERE `id` = '$_SESSION[id]'"); //включить!!!
	$fin = [];

	for ($i = 1 ; isset($_POST['idoffin' . $i]) ; $i++)
		$fin[] = $_POST['idoffin' . $i];

	mysqli_query($connection , 'INSERT INTO `story` ( `autor` , `nstory` ) VALUES ("'.$_SESSION['id'].'" , "'.$_POST['name'].'")');

	$id = mysqli_fetch_assoc( mysqli_query($connection , "SELECT `id` FROM `story` WHERE `nstory` = '$_POST[name]' ") );
	// $id['id'] it is id of story

	for ( $i = 1 ; $i < $_POST['count'] + 1; ++$i )
	{

		if ($i == 1)
		{
			mysqli_query($connection , 'INSERT INTO `cell` ( `id_in_story` , `story` , `text` , `status` ) VALUES ("'.$i.'" , "'.$id['id'].'" , "'.$_POST['text1'].'" , "1")');
			continue;
		}

		for ($j = 0; $j < count($fin) ; $j++)
			if ( $fin[$j] == ($i) )
			{
				mysqli_query($connection , 'INSERT INTO `cell` ( `id_in_story` , `story` , `text` , `status` ) VALUES ("'.$i.'" , "'.$id['id'].'" , "'.$_POST['text' . ($i)].'" , "3")');
				mysqli_query($connection , 'INSERT INTO `button` ( `id_story` , `parent` , `child`, `choise` ) VALUES ("'.$id['id'].'" , "'.$_POST['idper' . ($i)].'" , "'.$i.'" , "'.$_POST['choise' . ($i)].'")');
				continue 2;
			}

		mysqli_query($connection , 'INSERT INTO `cell` ( `id_in_story` , `story` , `text` , `status` ) VALUES ("'.$i.'" , "'.$id['id'].'" , "'.$_POST['text' . ($i)].'" , "2")');
		mysqli_query($connection , 'INSERT INTO `button` ( `id_story` , `parent` , `child`, `choise` ) VALUES ("'.$id['id'].'" , "'.$_POST['idper' . ($i)].'" , "'.$i.'" , "'.$_POST['choise' . ($i)].'")');

	}
	


}
	
	/*Файл для сохранения имторий*/

	
?>