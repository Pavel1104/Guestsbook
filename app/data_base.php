<?php

// указываем какою юзать шаблон
$_template = DIR_VIEWS . "/data_base.tpl";

// контент для страницы
$page = array(
	"name" => "Гостевая книга",
	"content" => '<p>Администрирование БД</p>'
);
	
	$errors = array();
	$messages = array();
	//проверка подкдёчения к серверу БД
	if (@$_GET['t'] === "test_db") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		else {
			mysql_close();
			$messages[] = "<p>Успешное подключение к серверу БД</p>";
					}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}

	//создаём базу данных
	if (@$_GET['t'] === "create_db") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		elseif (!@mysql_select_db("guestbook")) {
			$strSQL = "CREATE DATABASE  `guestbook` ;"; 
			mysql_query($strSQL);
			mysql_close();
			$messages[] = "<p>БД guestbook создана</p>";
		}
		else {
			$errors[] = "<p>БД guestbook уже сущесствует</p>";
		}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}
	
	//удаляем базу данных
	if (@$_GET['t'] === "delete_db") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		elseif (@mysql_select_db("guestbook")) {
			$strSQL = "DROP DATABASE  `guestbook` ;"; 
			mysql_query($strSQL) or die (mysql_error());
			mysql_close();		
			$messages[] = "<p>БД guestbook удалена</p>";
		}
		else {
			$errors[] = "<p>БД guestbook удалить не удалось</p>";
		}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}
	
	//создаём таблицу данных
	if (@$_GET['t'] === "create_table") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		elseif (!@mysql_select_db("guestbook")) {
			$errors[] = "<p>ошибка открытия таблицы данных</p>";
		}
		else {
		
			$strSQL = "CREATE TABLE  `guest` (`id` INT( 255 ) UNSIGNED NOT NULL AUTO_INCREMENT ";
			$strSQL .= "PRIMARY KEY , `name` CHAR( 20 ) NOT NULL , `message` CHAR( 255 ) NOT NULL ,";
			$strSQL .= "`data` DATE NOT NULL , `time` TIME NOT NULL) ENGINE = MYISAM ;";
			mysql_query($strSQL);
			mysql_close();		
			$messages[] = "<p>Таблица данных создана</p>";
		}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}
	
	if (@$_GET['t'] === "clear_table") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		elseif (!@mysql_select_db("guestbook")) {
			$errors[] = "<p>ошибка открытия таблицы данных</p>";
		}
		else {
			$strSQL = "TRUNCATE TABLE guest"; 
			mysql_query($strSQL) or die (mysql_error());
			mysql_close();
			$messages[] = "<p>Таблица данных очищена</p>";
		}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}
	
	if (@$_GET['t'] === "delete_table") {
		if (!@mysql_connect(HOST, USER, PASSWORD)) {
			$errors[] = "<p>ошибка подключения к серверу БД</p>";
		}
		elseif (!@mysql_select_db("guestbook")) {
			$errors[] = "<p>ошибка открытия таблицы данных</p>";
		}
		else {
			$strSQL = "DROP TABLE guest"; 
			mysql_query($strSQL) or die (mysql_error());
			mysql_close();
			$messages[] = "<p>Таблица данных удалена</p>";
		}
		if (count($errors) > 0)
		{
			unset($_GET['t']);
		}
	}