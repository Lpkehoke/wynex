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
					<span class="p-for-log" onclick="showMenu()">' . $_SESSION["login"] . '</span>
					<ul class="ul-foll" id="foll-id">
						<li><a href="/profile" class="a-for-log">Мой профиль</a></li>
						<li><a onclick="outProfile()" id="log-out" class="a-for-log">Выйти</a></li>
					</ul>
					</div>';
			else
				echo '<div class="registr-auth" id="not-auth">
					<a href="/regist">Регистрация</a> | 
					<a href="/login">Вход</a>
					</div>'	;
		?>	
	</header>