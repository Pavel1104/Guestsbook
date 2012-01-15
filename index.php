<?php
	//функция чтения данных из файла
	function read_file($file)
	{
		fopen($file);
		$text = file($file);
		for ($i = count($text)-1; $i >= 0; --$i)
		{
			list ($name, $msg) = split('[|]', $text[$i]);
			$msg = rtrim($msg);
			$ii = $i+1;
			$ct .= "\t\t\t\t\t\t<dt>Сообщение №$ii:\t$name :</dt>\n";
			$ct .= "\t\t\t\t\t\t<dd>$msg</dd>\n";
		}
		return $ct;		
	}
	//функция "очистка истории"
	function clear_history($file)
	{
		fopen($file, "w");
		fclose($file);
	};
	//функция записи в файл
	function write_to_file($file, $name, $msg)
	{
		$add = "$name|";
		$add .= "$msg\n";
		file_put_contents($file, $add, FILE_APPEND | LOCK_EX);
	}	
	//блок объявления переменных
	$months_rus = array(1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$data_file = 'r.tmp';
	$m = Date("n");
	$dat = Date("d ");
	$dat .= "$months_rus[$m]";
	$dat .= Date(" Y");
	$tm = Date("H:i:s");
	$file = 'r.tmp';
	//удаляем лишние пробелы из начала и конца сообщения
	$name = trim($_POST['name']);
	//удаляем лишние пробелы из начала и конца сообщения 
	$msg = trim($_POST['msg']);
	$clear_button = $_POST['clear'];
	$add_button = $_POST['addmsg'];
	$psswrd = $_POST['psswrd'];
	//очистка истории
	if (@$clear_button && $psswrd == php)
	{
		clear_history($file);
		header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?history_cleaned");
	};
	//блок логики
	//запись в файл
	if (@$add_button)
	{
		if ($name != "" && $msg != "")
		{
			write_to_file($file, $name, $msg);
			header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?message_added");
		}	
	};
	//чтение файла
	$ct = read_file($data_file);
	ob_start();
	require_once "layout.php";
	ob_end_flush();
	exit();
?>
