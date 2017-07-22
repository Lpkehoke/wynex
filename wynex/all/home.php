<?php
	$title = "Wynex"; 
	require_once 'resources/blocks/head.php';
?>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<div class="left-cell">
			<span>Истории:</span><br>
				<?php
					$story = mysqli_query($connection , "SELECT `nstory` FROM `story`");
					$id = mysqli_query($connection , "SELECT `id` FROM `story`");
					for ($i = 1; $history = mysqli_fetch_assoc($story) ; $i++) 
					{
						$rid = mysqli_fetch_assoc($id);
						echo "<a href='?id_of_story=$rid[id]'>$i.$history[nstory]</a><br>";
					}
				?>
			</div>
			<div class="right-cell">
			<span>Авторы:</span><br>
				<?php 
					$autor = mysqli_query($connection , "SELECT `autor` FROM `story`");
					for ($i = 1; $autor_of_story = mysqli_fetch_assoc($autor) ; $i++)
					{ 
						mysqli_fetch_assoc( $autor );
						$relautor = mysqli_fetch_assoc(mysqli_query($connection , "SELECT `login` FROM `users` WHERE `id` = '$autor_of_story[autor]' "));
						echo "$relautor[login]";
					}
				?>
			</div>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>