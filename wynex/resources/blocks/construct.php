<div class="main-const">
	<div class="level-1-name" id="level-1-name">
		<span>Введите название вашей будующей истории</span><br><br>
		<input type="text" name="name-story" placeholder="Название" class="text-name-inp" id="text-name-inp"> <br><br>
		<span class="error" id="name-err">Введите название<br><br></span>
		<input type="button" name="save" onclick="saveName()" value="Сохранить" class="button-save-name">
	</div>
	<span class="rools">(поля можно расширять)</span><br>
</div>
<button class="save-story" onclick="rename()">Изменить название историии</button>
<button class="save-story" onclick="saveSt()">Сохранить историю</button>
