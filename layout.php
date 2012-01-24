<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="style/style3.css"/>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	</head>
	<body>
		<div id="header">
			<h1>Добро пожаловать в гостевую книгу</h1>
		</div>
		<div id="main">
			<h2>Гостевая книга</h2>
			<dl><? echo $ct ?></dl>
		</div>
		<div id="content">
			<div id="sections">
				<h2>Ссылочки</h2>
				<ul>
					<li><a href="index.php">Решения</a></li>
					<li><a href="index.php">Партнеры</a></li>
					<li><a href="index.php">Достижения</a></li>
				</ul>
				<form id="search" action="#" method="get">
					<p>Поиск по сайту</p>
					<p><input type="text"/><button type="submit">Искать</button></p>
				</form>
			</div>
			<div id="news">
				<h2>Новости</h2>
				<h3>01.01.06</h3>
				<p>Мегакорпорация поздравляет своих клиентов с Новым Годом! Пусть в новом году ваши деньги перетекают в наши карманы еще быстрее. И больше!</p>
		 	</div>
		</div>
		<div id="meta">
			<form action="index.php" method="post" name="data_form"> 
				<dl>
					<dt><label for="name">Введите Ваше <strong>Имя:</strong> *</label></dt>
					<dd><input type="text" maxlength="20" size="20" name="name" value="Имя"/></dd>
				</dl>
				<dl>
					<dt><label for="msg">Введите Ваше <em>сообщение:</em> *</label></dt>
					<dd><textarea name="msg" rows="2">Текст сообщения...</textarea></dd>
				</dl>
				<input id="button_send" value="Отправить сообщение" type="submit" name="addmsg"/>
			</form>
			<form action="index.php" method="post" name="clear_form"> 
				<dl>
					<dt>Пароль:</dt>
					<dd>
						<input type="password" maxlength="20" size="20" name="psswrd" value="php"/>
						<input id="button_clear" value="Очистить историю" type="submit" name="clear"/>
					</dd>
				</dl>
				
			</form>
		</div>
		<div id="footer">
			<p>Maded by Shaman &copy; 2012</p>		
		</div>
	</body>
</html>
