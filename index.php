<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Pragma: no-cache"); // HTTP/1.0
	//функция чтения данных из файла
	function read_file($file)
	{
	fopen($file);
	$text = file ($file);
	for ($i = count($text)-1; $i >= 0; --$i)
		{
			list ($name, $msg) = split('[|]', $text[$i]);
			$msg = rtrim($msg);
			$ii = $i+1;
			$ct .= "Сообщение №$ii: \t\"$name : $msg\"\n";
		}
	return $ct;		
	}
	//функция обработки ошибок
	function error($id)
	{
	if ($id == 1)
		{
		$error_msg = "Введите Ваше имя";
		}
	if ($id == 2)
		{
		$error_msg = "Введите текст сообщения";
		}
	if ($id == 3)
		{
		$error_msg = "Введите Ваше имя и текст сообщения";
		}
	if ($id == 4)
		{
		$error_msg = "Вы ввели неправильный пароль";
		}
	return $error_msg;		
	}
	//блок объявления переменных
	$months_rus = array(1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$data_file = 'r.tmp';
	$m = Date("n");
	$dat = Date("d ");
	$dat .= "$months_rus[$m]";
	$dat .= Date(" Y");
	$tm = Date("H:i:s");
	$error_id = $_GET['error'];
	$ct = read_file($data_file);
	$error = error($error_id);
?>
<!DOCTYPE html>
<html lang = "ru">
	<head>
		<title>Гостевая книга</title>
		<link rel = "stylesheet" type = "text/css" href = "style/style.css">
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
	<a href= "index.php"><h1>Добро пожаловать в гостевую книгу</h1></a>
	<h2>Сегодня <? echo $dat ?> года. Время на Ваших часах <? echo $tm ?>.</h2>
	<hr />
	<h4><? echo "$error" ?></h4>
	<p>
	<textarea id = "txt" name = "text" rows = "10" cols = "100"><? echo "$ct" ?></textarea>
	</p>
	<hr />
	<form action = "layout.php" method = "POST" name = "DataForm"> 
		<p id = "nt">Введите Ваше <b>Имя:</b><br>
		<input id = "np" maxlength = "20" size = "20" name = "name" value = "Имя пользователя"><br>
		Введите Ваше <b>сообщение:</b><br>
		<textarea id = "msgp" name = "msg" wrap = "virtual" cols = "100" rows = "2">Текст сообщения...</textarea><br>
		<input id = "sbtn" value = "Отправить сообщение" type = "submit" name = "addmsg"></p>
	</form>
	<hr/>
	<form action = "layout.php" method = "POST" name = "ClearForm"> 
		<p><input id = "chbtn" value = "Очистить историю" type = "submit" name = "clear">
		Пароль: 
		<input type = "password" maxlength = "128" size = "20" name = "psswrd" value = "php"></p>
	</form>
	<h5>Maded by Shaman</h5>
	</body>
</html>
