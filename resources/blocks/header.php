<div class="main-wrapper">
	<header>
		<div class="name-logo">
			<a href="/"><img src="#"> <span id="name-of-site">Wynex</span></a>
		</div>
		<div class="search">
			<input type="text" name="search" placeholder="Поиск">
		</div>
		<div class="const">
			<a href="/constructor">Создать свою историю</a>
		</div>
		<?php 
			if ($_SESSION['id'])
				echo '<div class="profile" id="auth-yet">
					<a onclick="outProfile()" id="log-out">Выйти</a> |
					<a href="/profile">Мой профиль</a>
					</div>';
			else
				echo '<div class="registr-auth" id="not-auth">
					<a href="/regist">Регистрация</a> | 
					<a href="/login">Вход</a>
					</div>'	;
		?>	
	</header>