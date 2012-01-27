<?php

// указываем какою юзать шаблон
$_template = DIR_VIEWS . "/guestbook.tpl";

// контент для страницы
$page = array(
	"name" => "Гостевая книга",
	"content" => '<p>Тут вы можете написать сообщение</p>'
);

if (@$_GET['t'] === "clear") // удаляем все записи
{
	mysql_connect(HOST, "user", "123") or die (mysql_error ());
	mysql_select_db("guestbook") or die(mysql_error());
	$strSQL = "TRUNCATE TABLE guest"; 
	mysql_query($strSQL) or die (mysql_error());
	mysql_close();
	redirect_to("/?s=guestbook");
}

if (@$_GET['t'] === "add") // добавляем новую запись
{
	$name = trim(@$_POST['name']);
	$text = trim(@$_POST['text']);
	$data = date("Y-m-d");
	$time = date("H:i:s");

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
		mysql_connect(HOST, USER, PASSWORD) or die (mysql_error ());
		mysql_select_db("guestbook") or die(mysql_error());
		$strSQL = "INSERT INTO guest(name,message,data,time) VALUES('$name','$text','$data','$time')"; 
		mysql_query($strSQL) or die (mysql_error());
		mysql_close();
		redirect_to("/?s=guestbook");
	}
}

if (empty($_GET['t'])) // отображаем список записей
{
	mysql_connect(HOST, USER, PASSWORD) or die (mysql_error ());
	mysql_select_db("guestbook") or die(mysql_error());
	$strSQL = "SELECT `data`, `time`, `name`, `message` FROM `guest` ORDER BY `id` DESC";
	$rs = mysql_query($strSQL);
	while($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
		$messages[] = array(
			"name" => @$row['name'],
			"text" => @$row['message'],
			"data" => @$row['data'],
			"time" => @$row['time']
		);
	}
	mysql_close();
}