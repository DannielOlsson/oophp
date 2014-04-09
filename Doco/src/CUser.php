<?php

class CUser
{

	private $loggedIn;

	public function login($acronym, $password)
	{
		$acronym = strip_tags($acronym);
		$password = strip_tags($password);
		//$res = array();
		if(isset($_POST['acronym']) && isset($_POST['password'])) 
		{
			global $db;
		  	$sql = "SELECT acronym, name FROM User WHERE acronym = ? AND password = md5(concat(?, salt))";
		  	$params = (array($_POST['acronym'], $_POST['password']));
		  	$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
		  
	  		if(isset($res[0])) 
	  		{
	    		$_SESSION['user'] = $res[0];
			}

	  		header('Location: movie.php?p=movie&u=login.php');
		}
	}

	public function isLoggedIn($acronym)
	{
		if(/*isset($_SESSION['user']->acronym) == $acronym && */!empty($_SESSION['user']))
		{
			$loggedIn = true;
		}
		else 
		{
			$loggedIn = false;
		}
		return $loggedIn;
	}
	

	public function logout()
	{
		if (isset($_SESSION['user']))
		{
			unset($_SESSION['user']);

		}
		
		header('Location: movie.php?p=movie&u=login.php');
	}

}


?>