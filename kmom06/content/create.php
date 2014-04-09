<?php

$isset = isset($_POST['isset']) ? $_POST['isset'] : false;

// $slug 		= isset($_POST['slug'])  ? $_POST['slug'] : null;
$title  	= isset($_POST['title']) ? $_POST['title'] : null;
// $url    	= isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
// $data   	= isset($_POST['data'])  ? $_POST['data'] : array();
// $type   	= isset($_POST['type'])  ? strip_tags($_POST['type']) : array();
// $filter 	= isset($_POST['filter'])  ? $_POST['filter'] : null;
// $published 	= isset($_POST['pubdate']) ? $_POST['pubdate'] : null;


$print  ="<br>";
if($isset){
	
	$sql = '
	  INSERT INTO content (title) VALUES(?)
	';
	
	$params = array($title);
	$res = $db->ExecuteQuery($sql, $params);
	
	if($res) {
  		 $print = "Informationen sparades.";
	}
	else {
  		$print = "Informationen sparades EJ.<br><pre>" . print_r($db->ErrorInfo(), 1) . "</pre>";
	}
}


// $sql = 'SELECT * FROM Content WHERE id = ?';
// 	$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($id));
// 	$c   = $res[0];
	
// 	$title  	= htmlentities($c->title, null, 'UTF-8'); 
// 	$url    	= htmlentities($c->url, null, 'UTF-8');
// 	$type  		= htmlentities($c->TYPE, null, 'UTF-8');
// 	$slug 		= htmlentities($c->slug, null, 'UTF-8');
// 	$data   	= htmlentities($c->DATA, null, 'UTF-8');
// 	$filter 	= htmlentities($c->FILTER, null, 'UTF-8');
// 	$published 	= htmlentities($c->published, null, 'UTF-8');
	



$print .= 
"
<form action='content.php?p=content&amp;u=content/create.php' method='POST'>
Title: <input type='text' name='title' /> <br>
<input type='hidden' name='isset' value='true'/>

<input type='submit' value='Spara'> 
<input type='reset' value='Återställ'>

</form>
";

?>