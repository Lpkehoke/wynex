<?php
	$title = "Конструктор"; 
	require_once 'resources/blocks/head.php';
?>
<script type="text/javascript" src="resources/js/compliteStory.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>
	<div class="wrapper">
		<div class="main">
		<?php 
			if(!$_SESSION['id'])
				echo 'Чтобы создать историю вам необходимо авторизироваться или создать новый аккаунт<br><br>
			<a href="/login">Войти в аккаунт</a><br><br>
			<a href="/regist">Создать новый</a><br>';
			else
				require_once 'resources/blocks/construct.php';
			?>
		</div>
		<?php require_once 'resources/blocks/leftcol.php';?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>