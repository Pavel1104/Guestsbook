<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>SHAMAN</title>
		<link rel="stylesheet" href="/css/styles.css"/>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	</head>
	<body>
		<div id="header">
			<a href="/" id="logo">SHAMAN</a>
		</div>
		<div id="content">

			<div id="main">
				<?php require $_template ?>
			</div>

			<div id="menu">
				<?php require DIR_VIEWS . "/parts/menu.tpl" ?>
			</div>

			<div id="sidebar">
				<?php require DIR_VIEWS . "/parts/sidebar_news.tpl" ?>
				<?php require DIR_VIEWS . "/parts/sidebar_articles.tpl" ?>
		 	</div>

		</div>
		<div id="footer">
			Made by Shaman &copy; <?= date("Y") ?>
		</div>
	</body>
</html>