<!DOCTYPE html>
<HTML lang="ru">
	<HEAD>
		<TITLE>GuestsBook</TITLE>
		<link rel="stylesheet" type="text/css" href="style/style.css">
		</HEAD>
	<body>
	<a  href="http://jigsaw.w3.org/css-validator/#validate_by_upload">
	<img id=WC style="border:0;width:88px;height:31px"
	src="http://jigsaw.w3.org/css-validator/images/vcss"
	alt="Правильный CSS!"></a>
	<h1><a href="index.php">Welcome to my GuestsBook</a></h1>
		<?php
		$F = 'r.tmp';
		$N=$_GET['name'];
		$M=$_GET['msg'];
		$cl=$_GET['clear'];
		$addbtn=$_GET['addmsg'];
		if (@$cl){
			$fp = fopen($F, "w");
			fclose($fp);
		};
		$Dat = Date("d-F-20y");
		$Tm = Date("h:i:s");
		?>
	<a  href="http://jigsaw.w3.org/css-validator/#validate_by_upload">
	<img  id=WCC style="border:0;width:88px;height:31px"
	src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
	alt="Правильный CSS!"></a>
		<?php
		echo "<h2>Date is $Dat Time is $Tm</h2><hr />\n";
		if ($addbtn){
					if ($N != "" && $M != "") {
					$add ="<b>$N:</b> ";
					$add.="<i>$M</i><hr />\n";
					file_put_contents($F, $add, FILE_APPEND | LOCK_EX);
					};
					};
		$st = file_get_contents($F);//Read the file
		echo "<p>$st</p>";
		?>
	<hr/>
	<FORM action="index.php" method="get" name="DataForm"> 
		<h3 id=nt>Enter your <b>Name:</b></h3>
		<INPUT id=np maxlength="20" size="16" name="name" value="Guest"> 
		<h3 id=msgt>Enter your <b>message:</b></h3>
	    <TEXTAREA id=msgp name="msg" wrap="virtual" cols="40" rows="3">Text...</TEXTAREA><br>
	    <INPUT id=sbtn value="Send" type="submit" name="addmsg">
    </FORM>
	<FORM action="index.php" method="get" name="ClearForm"> 
		<INPUT id=chbtn value="Clear History" type="submit" name="clear">
	</FORM>
	</BODY>
</HTML>
