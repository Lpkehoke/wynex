<?php
	$title = "Восстановление пароля"; 
	require_once 'resources/blocks/head.php';
?>
<script type="text/javascript" src="resources/js/checRecovery.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<form method="post" name="regist">
				<input type="text" placeholder="Почта" class="spase-inp" id="email"> <br>
				<span class="error" id="empty-email">Вы не ввели почту<br></span>
				<span class="error" id="unemail">Почта введена некорректно<br></span>
				<input type="button" value="Восстановить" class="button-in" onclick="checRecovery()"> 
			</form>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>