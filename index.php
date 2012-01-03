<HTML>
	<HEAD>
		<TITLE>GuestsBook</TITLE>
		<link rel="stylesheet" type="text/css" href="style/style.css" />    
	</HEAD>
	<body>
		<?php
		$F = 'r.tmp';
		$N=$_GET['name'];
		$M=$_GET['msg'];
		$cl=$_GET['clear'];
		$addbtn=$_GET['addmsg'];
		If (@$cl){
			$fp = fopen($F, "w");
			fclose($fp);
		};
		$Dat = Date("d-m-y");
		$Tm = Date("h:i:s");
		echo "<p>Date is $Dat Time is $Tm<Br></p><hr />\n";
		If ($addbtn){
			IF ($N != "" && $M != "" && $M != "Some text...") {
			$add ="<b>$N:</b><br>\n";
			$add.="<i>$M </i><br> <hr />\n";
			file_put_contents($F, $add, FILE_APPEND | LOCK_EX);
			};
		};
		$st = file_get_contents($F);//Read the file
		echo "<p>$st</p>";
		?>
	<FORM action="index.php" method="get" name="TestForm"> 
		<p>Enter your Name:</p>
		<INPUT maxlength="45" size="30" name="name" value="Guest"> <BR>
		<p>Enter your message:</p>
    		<TEXTAREA name="msg" wrap="virtual" cols="40" rows="3">Some text...</TEXTAREA><br>
    		<INPUT value="Send" type="submit" name="addmsg">
    	</FORM>
	<FORM action="index.php" method="get" name="ClearForm"> 
		<INPUT value="Clear History" type="submit" name="clear">
	</FORM>
	</BODY>
</HTML>
