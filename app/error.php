<?php

// указываем какою юзать шаблон
$_template = DIR_VIEWS . "/error.tpl";

$_error_code = (string) $_error_code;

$error_codes = array(
	"404" => array(
		"name" => "Ошибка 404",
		"content" => '<p>Такая страница не найдена</p>'
	)
);

// контент для страницы
$page = $error_codes[$_error_code];

// TODO: а еще нужно высылать соответствующий хедер
