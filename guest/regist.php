<?php
	$title = "Регистрация"; 
	require_once 'resources/blocks/head.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="resources/js/checReg.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<form method="post" name="regist">
				<input type="text" placeholder="Логин" class="spase-inp" id="loginR"> <br>
				<span class="error" id="empty-logR">Логин не введен<br></span>
				<span class="error" id="uncorrectR">Логин введен некорректно<br></span>
				<input type="text" placeholder="Почта" class="spase-inp" id="email"> <br>
				<span class="error" id="empty-email">Вы не ввели почту<br></span>
				<span class="error" id="unemail">Почта введена некорректно<br></span>
				<input type="password" placeholder="Пароль" class="spase-inp" id="passwordR"> <br>
				<span class="error" id="empty-pasR">Вы не ввели пароль<br></span>
				<input type="password" placeholder="Повторите пароль" class="spase-inp" id="repasswordR"> <br>
				<span class="error" id="repas-er">Пароли не совпадют<br></span>
				<input type="button" value="Регистрация" class="button-in" onclick="checReg()"> 
				<input type="button" value="Есть аккаунт" class="button-in" onclick=" location.href='/login'">
			</form>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>