
<h1 class="page-caption"><?= $page["name"] ?></h1>
<?= $page["content"] ?>

<div class="guestbook-messages-list-cont">
	<?php if (@$messages && count($messages) > 0) { ?>
		<?php foreach ($messages as $item) { ?>
			<div class="guestbook-message">
				<span class="name"><?= $item['name'] ?></span> написал(а) <?= $item['data']?> в <?= $item['time'] ?>:<br/>
				<span class="text"><?= $item['text'] ?></span>
			</div>
		<?php } ?>
		<a href="/?s=guestbook&amp;t=clear" class="guestbook-messages-clear">[очистить]</a>
	<?php } else { ?>
		<span>Сообщений пока нет</span>
	<?php } ?>
</div>


<div class="guestbook-form-cont">
	<?php if (@$errors && count($errors) > 0) { ?>
		<?php foreach ($errors as $error) { ?>
			<div class="error"><?= $error ?></div>
		<?php } ?>
	<?php } ?>

	<form action="/?s=guestbook&amp;t=add" method="post">
		Имя:<br/>
		<input type="text" name="name" value="" class="f-input" /><br/>
		Сообщение:<br/>
		<input type="text" name="text" value="" class="f-input" /><br/>
		<br/>
		<input type="submit" value="Отправить" />
	</form>
</div>
