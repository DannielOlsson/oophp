<?php

if(isset($_POST['acronym']) && isset($_POST['password']))
{
	$acronym = strip_tags($_POST['acronym']);
	$password = strip_tags($_POST['password']);

}
$db->login($acronym, $password);

?>