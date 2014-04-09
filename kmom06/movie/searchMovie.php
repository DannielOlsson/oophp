<?php

$title = isset($_POST['title']) ? $_POST['title'] : null;

$print = searchMovie($title);
$params = null;

// Do SELECT from a table
if($title) {
  
$sql = "SELECT * FROM Movie WHERE title LIKE ?;";
$params = array($title); 
$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
} 

else {
	  // Do SELECT from a table
$sql = "SELECT * FROM Movie;";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);
}

//String checkout
 $title = htmlentities($title);
 $paramsPrint = htmlentities(print_r($params,1));


//Print table with movies
$print .=movieTable($res);

?>