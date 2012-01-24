<?php	
	//функция чтения данных из файла
	function read_file($file_name, $file_msg)
	{
		fopen($file_name, "r");
		fopen($file_msg, "r");
		$text_name = file($file_name);
		$text_msg = file($file_msg);
		$ct = "";
		for ($i = count($text_name)-1; $i >= 0; --$i)
		{
			$ii = $i+1;
			$ct .= "<dt>Сообщение №$ii: $text_name[$i] :</dt>\n";
			$ct .= "<dd>$text_msg[$i]</dd>\n";
		}
		//fclose($file_name);
		//fclose($file_msg);
		return $ct;	
	}
	//функция "очистка истории"
	function clear_history($file_name, $file_msg)
	{
		fopen($file_name, "w");
		fclose($file_name);
		fopen($file_msg, "w");
		fclose($file_msg);
	};
	//функция записи в файл
	function write_to_file($file, $text)
	{
		$add_text = rtrim($text);
		$add_text .= "\n";
		file_put_contents($file, $add_text, FILE_APPEND | LOCK_EX);
	}	
	//блок объявления переменных
	$file_name = 'name.tmp';
	$file_msg = 'msg.tmp';
	//блок логики
	if (!empty($_POST['clear']))
	{
		$clear_button = $_POST['clear'];
		$psswrd = $_POST['psswrd'];
		//очистка истории
		if (@$clear_button && $psswrd == php)
		{
			clear_history($file_name, $file_msg);
			header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?history_cleaned");
		}
		else 
		{
			header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?incorrect_password");
		};
	}
	//запись в файл
	if (!empty($_POST['addmsg']))
	{
		//удаляем лишние пробелы из начала и конца сообщения
		$name = trim($_POST['name']);
		//удаляем лишние пробелы из начала и конца сообщения 
		$msg = trim($_POST['msg']);
		$add_button = $_POST['addmsg'];
		if ($name != "" && $msg != "")
		{
			write_to_file($file_name, $name);
			write_to_file($file_msg, $msg);
			header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?message_added");
		}
		else
		{
			header("Location: {$_SERVER['HTTP_HOSTS']}/index.php?wrong_data_name_or_msg");
		}
	}
	//чтение файла
	$ct = read_file($file_name, $file_msg);
	ob_start();
	require_once "layout.php";
	ob_end_flush();
	exit();
?>
