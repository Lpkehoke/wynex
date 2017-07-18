<?php
	$title = "Wynex"; 
	require_once 'resources/blocks/head.php';
?>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<span>Истории:</span><br>
			<div>
				<?php
					$story = mysqli_query($connection , "SELECT `nstory` FROM `story`");
					$id = mysqli_query($connection , "SELECT `id` FROM `story`");
					for ($i = 1; $history = mysqli_fetch_assoc($story) ; $i++) {
						$rid = mysqli_fetch_assoc($id);
						echo "<a href='?id_of_story=$rid[id]'>$i.$history[nstory]</a><br>";
					}
				?>
			</div>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>