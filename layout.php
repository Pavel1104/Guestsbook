<?php
$file = 'r.tmp';
//удаляем лишние пробелы из начала и конца сообщения
$name = ltrim(rtrim($_GET['name']));
//удаляем лишние пробелы из начала и конца сообщения 
$msg = ltrim(rtrim($_GET['msg']));
$clear_button = $_GET['clear'];
$add_button = $_GET['addmsg'];
$psswrd = $_GET['psswrd'];
$dat = Date("d-F-20y");
$tm = Date("h:i:s");
//очистка истории
if (@$clear_button && $psswrd == php)
	{
	fopen($file, "w");
	fclose($file);
	header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?history_cleaned");
	};
if ($psswrd != php)
	{
	header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?error=4");
	}
//запись в файл
if (@$add_button)
	{
	if ($name == "")
		{
		header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?error=1");
		}
	if ($msg == "")
		{
		header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?error=2");
		}
	if ($name == "" && $msg == "")
		{
		header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?error=3");
		};
	if ($name != "" && $msg != "")
		{
		$add  = "$name|";
		$add .= "$msg\n";
		file_put_contents($file, $add, FILE_APPEND | LOCK_EX);
		header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?message_added");
		}	
	};
exit();
?>
