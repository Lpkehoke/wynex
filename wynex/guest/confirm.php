<?php
	if (!$_SESSION["confirm"]["code"])
	{
		include 'all/read.php';
		die();
	}
		

	$title = "Подтверждение"; 
	require_once 'resources/blocks/head.php';
?>
<script type="text/javascript" src="resources/js/checCode.js"></script>
</head>
<body>
	<?php require_once 'resources/blocks/header.php'; ?>

	<div class="wrapper">
		<div class="main">
			<form>
				<span>Введите код, который был выслан вам на почту.</span><br>
				<input type="text" placeholder="Код" id="code" class="spase-inp"> <br>
				<span class="error" id="er-code">Вы ввели неправильный код<br></span>
				<input type="button" value="Подтвердить" class="button-in" onclick="checCode()">
			</form>
		</div>
		<?php require_once 'resources/blocks/leftcol.php'; ?>
	</div>

	<?php require_once 'resources/blocks/footer.php'; ?>
</body>
</html>