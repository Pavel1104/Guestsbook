<?php

// определяем пути к ключевым директориям и назначаем соответствующие константы
define('DIR_PUBLIC', dirname(__FILE__));
define('DIR_ROOT', dirname(DIR_PUBLIC));
define('DIR_LIB', DIR_ROOT . "/lib");
define('DIR_APP', DIR_ROOT . "/app");
define('DIR_VIEWS', DIR_APP . "/views");
//доступ к базе данных
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'S1h1a0m4');
// подключаем "ништяки"
require DIR_LIB . "/functions.php";

/**
 * Основные параметры:
 * $_GET['s'] - секция - модуль
 * $_GET['t'] - таск - действие, которое должен выполнить модуль
 */

// по-умолчанию секция - home
if (empty($_GET['s']))
	$_GET['s'] = "home";

// значения по-умолчанию
$_section = $_GET['s'];
$_layout = "layout";

// определяем секцию исходя из параметров
switch ($_GET['s']) {
	case "home":
	case "partners":
	case "achievements":
		$_section = "static_page";
		$_static_page_slug = $_GET['s'];
		break;
	case "data_base":
		$_section = "data_base";
		break;
	case "guestbook":
		$_section = "guestbook";
		break;
	default:
		$_section = "error";
		$_error_code = 404;
		break;
}

require DIR_APP . "/" .$_section. ".php"; // логика
require DIR_VIEWS . "/layouts/" .$_layout. ".tpl"; // отображение