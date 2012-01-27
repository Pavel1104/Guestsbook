<?php

function trace_dump ($var)
{
	echo "<pre>" .var_export($var, true). "</pre>";
}

function redirect_to ($url)
{
	header("Location: " .$url);
	exit;
}
