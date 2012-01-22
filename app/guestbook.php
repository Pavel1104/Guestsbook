<?php

// указываем какою юзать шаблон
$_template = DIR_VIEWS . "/guestbook.tpl";

// контент для страницы
$page = array(
	"name" => "Гостевая книга",
	"content" => '<p>Тут вы можете написать сообщение</p>'
);

$data_file = DIR_PUBLIC . "/data/guestbook.txt";

if (@$_GET['t'] === "clear") // удаляем все записи
{
	fopen($data_file, "w");
	fclose($data_file);
	redirect_to("/?s=guestbook");
}

if (@$_GET['t'] === "add") // добавляем новую запись
{
	$name = trim(@$_POST['name']);
	$text = trim(@$_POST['text']);

	$errors = array();
	if (empty($name))
		$errors[] = "Имя обязательно для заполнения";
	if (empty($text))
		$errors[] = "Сообщение обязательно для заполнения";

	if (count($errors) > 0)
	{
		unset($_GET['t']);
	}
	else
	{
		$record = $name . "|" . $text . "\n";
		file_put_contents($data_file, $record, FILE_APPEND);
		redirect_to("/?s=guestbook");
	}
}

if (empty($_GET['t'])) // отображаем список записей
{
	$records = @file($data_file);
	$messages = array();

	if (@$records && count($records) > 0)
	{
		foreach ($records as $record)
		{
			$record_arr = explode("|", $record);
			$messages[] = array(
				"name" => @$record_arr[0],
				"text" => @$record_arr[1],
			);
		}
	}
}