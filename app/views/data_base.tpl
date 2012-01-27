
<h1 class="page-caption"><?= $page["name"] ?></h1>
<?= $page["content"] ?>
<div class="data_base_errors">
	<?php if (@$errors && count($errors) > 0) { ?>
		<?php foreach ($errors as $error) { ?>
			<div class="error"><?= $error ?></div>
		<?php } ?>
	<?php } ?>
</div>
<div>
	<?php if (@$messages && count($messages) > 0) { ?>
		<?php foreach ($messages as $message) { ?>
		
			<div class="message"><?= $message ?></div>
		<?php } ?>
	<?php } ?>
</div>
<div class="data_base_form">
	<form action="/?s=data_base&amp;t=test_db" method="post">
		<input type="submit" value="проверить подключение к БД" />
	</form>
	<form action="/?s=data_base&amp;t=create_db" method="post">
		<input type="submit" value="создать базу данных" />
	</form>
	<form action="/?s=data_base&amp;t=delete_db" method="post">
		<input type="submit" value="удалить базу данных" />
	</form>
	<form action="/?s=data_base&amp;t=create_table" method="post">
		<input type="submit" value="создать таблицу данных" />
	</form>
	<form action="/?s=data_base&amp;t=clear_table" method="post">
		<input type="submit" value="очистить таблицу данных" />
	</form>
	<form action="/?s=data_base&amp;t=delete_table" method="post">
		<input type="submit" value="удалить таблицу данных" />
	</form>
</div>
