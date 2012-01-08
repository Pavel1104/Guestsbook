<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Pragma: no-cache"); // HTTP/1.0
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
	//блок объявления переменных
	$data_file = 'r.tmp';
	$psswrd = $_GET['psswrd'];
	$dat = Date("d-n-Y");
	$tm = Date("H:i:s");
	$clear_button = $_GET['clear'];
	$ct = read_file($data_file);
?>
<!DOCTYPE html>
<html lang = "ru">
	<head>
		<title>GuestsBook</title>
		<link rel = "stylesheet" type = "text/css" href = "style/style.css">
		<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
	</head>
	<body>
	<a href= "index.php"><h1>Добро пожаловать в гостевую книгу</h1></a>
	<h2>Date is <? echo $dat ?> Time is <? echo $tm ?></h2>
	<hr />
	<textarea name = "text" rows = "20" cols = "170"><? echo "$ct" ?></textarea>
	<hr/>
	<form action = "layout.php" method = "get" name = "DataForm"> 
		<h3 id = "nt">Enter your <b>Name:</b></h3>
		<input id = "np" maxlength = "20" size = "16" name = "name" value = "Имя"> 
		<h3 id = "msgt">Enter your <b>message:</b></h3>
	  <textarea id = "msgp" name = "msg" wrap = "virtual" cols = "170" rows = "3">Text...</textarea>
	  <br>
	  <input id = "sbtn" value = "Send" type = "submit" name = "addmsg">
	</form>
	<form action = "layout.php" method = "get" name = "ClearForm"> 
		<input id = "chbtn" value = "Clear History" type = "submit" name = "clear">
		<input type = "password" maxlength = "128" size = "16" name = "psswrd" value = "php">
	</form>
	</body>
</html>
