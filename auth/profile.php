<?php
	$title = "$_SESSION[login]"; 
	require_once 'resources/blocks/head.php';
?>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
		<span>Ваш логин: <?=$_SESSION['login']?> <br></span>
		<span>Ваш email: <?=$_SESSION['email']?> <br></span>
		<span>Количество ваших историй: <?=$_SESSION['number_of_story']?> <br></span>
		<span>Ваши истории:</span><br>
		<ol>
			<?php 
				$story = mysqli_fetch_assoc(mysqli_query($connection , "SELECT `nstory` FROM `story` WHERE `autor` = '$_SESSION[id]' "));
				foreach ($story as $value) {
					echo "<li class='spisok'>$value</li>";
				}
			?>
		</ol>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?> </body>
</html>