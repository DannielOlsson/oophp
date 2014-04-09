<?php
//autoloader för klasser
function myAutoLoader()
{
	$path = "($class).php";
	if(is_file($path))
	{
	include($path);
	}
}
//Anrop
spl_autoload_register('myAutoLoader');
?>