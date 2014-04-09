<?php
$acronym = isset($_SESSION['user']->acronym) ? $_SESSION['user']->acronym : null;
$name = isset($_SESSION['user']->name) ? $_SESSION['user']->name : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$username = isset($_POST['acronym']) ? $_POST['acronym'] : null;

$user->login($username, $password);
$loggedIn = $user->isLoggedIn($acronym);

if($loggedIn) //ta bort inte
{
	$print = "<p>Du är inloggad som {$name}.</p>";
}
else
{
	$print = "<p>Du är EJ inloggad.</p>
	
	<form method='POST'>
	<p>Akronym: <input type='text' name='acronym' value='$name'/></p>
	<p>Lösenord: <input type='password' name='password'/></p>
	<p><input type='submit' value='Logga in'/></p>
	</form>
	";
	
}


?>