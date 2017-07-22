<?php
	$title = "$_SESSION[login]"; 
	require_once 'resources/blocks/head.php';
?>
<script type="text/javascript" src="resources/js/repass.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
			<div class="main">
			<span>Ваш логин: <?=$_SESSION['login']?> <br></span>
			<span>Ваш email: <?=$_SESSION['email']?> <br></span>
				<br>
			<span>Количество ваших историй: <?=$_SESSION['number_of_story']?> <br></span>
			<span>Ваши истории:</span><br>
			<ol>
				<?php 
					if($_SESSION['number_of_story'])
					{
						$story = mysqli_fetch_assoc(mysqli_query($connection , "SELECT `nstory` FROM `story` WHERE `autor` = '$_SESSION[id]' "));
						foreach ($story as $value) 
						{
							echo "<li class='spisok'>$value</li>";
						}
					}
				?>
			</ol>
				<br>
			<div>
				<span>Если вы хотите изменить пароль:</span><br>
				<input type="password" placeholder="Новый пароль" class="spase-inp-pr" id="passwordR"> <br>
				<span class="error" id="empty-pasR">Вы не ввели пароль<br></span>
				<input type="password" placeholder="Повторите пароль" class="spase-inp-pr" id="repasswordR"> <br>
				<span class="error" id="repas-er">Пароли не совпадют<br></span>
				<button class="but-in-prof" onclick="repass()">Изменить пароль</button><br>
				<span style="display: none" id="seccses">Ваш пароль успешно изменен!</span>
			</div>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?> </body>
</html>