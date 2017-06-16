<?php
	$title = "Вход"; 
	require_once 'resources/blocks/head.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="resources/js/checInput.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<form method="post" name="input">
				<input type="text" placeholder="Логин" class="spase-inp" name="login" id="login"> <br>
				<span class="error" id="empty-log">Вы не ввели логин<br></span>
				<span class="error" id="uncorrect">Логин введен некорректно<br></span> 
				<input type="password" placeholder="Пароль" class="spase-inp" name="password" id="password"> <br>
				<span class="error" id="empty-pas">Вы не ввели пароль<br></span>
				<input type="button" value="Войти" class="button-in" onclick="checInput()"> 
				<input type="button" value="Восстановить пароль" class="button-in"  onclick=" location.href='/recovery'">
			</form>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>