<?php

// указываем какою юзать шаблон
$_template = DIR_VIEWS ."/static_page.tpl";

// вот это все надо доставать из БД — пока что просто "заглушка"
$static_pages = array(
	"home" => array(
		"name" => "Добро пожаловать!",
		"content" => '<p>Контент главной страницы</p>'
	),
	"solutions" => array(
		"name" => "Решения",
		"content" => '<p>Контент страницы "Решения"</p>'
	),
	"partners" => array(
		"name" => "Партнеры",
		"content" => '<p>Контент страницы "Партнеры"</p>'
	),
	"achievements" => array(
		"name" => "Достижения",
		"content" => '<p>Контент страницы "Достижения"</p>'
	),
);

// контент для страницы
$page = $static_pages[$_static_page_slug];
