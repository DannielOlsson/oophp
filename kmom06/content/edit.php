<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
is_numeric($id) or die('Check: Id must be numeric.');


$slug 		= isset($_POST['slug'])  ? $_POST['slug'] : null;
$title  	= isset($_POST['title']) ? $_POST['title'] : null;
$url    	= isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
$url = empty($url) ? null : $url;
$data   	= isset($_POST['data'])  ? $_POST['data'] : null;
$type   	= isset($_POST['type'])  ? strip_tags($_POST['type']) : null;
$filter 	= isset($_POST['filter'])  ? $_POST['filter'] : null;
$published 	= isset($_POST['pubdate']) ? $_POST['pubdate'] : null;

$isset = isset($_POST['isset']) ? $_POST['isset'] : false;

$print  ="<br>";

if($isset){
	$result = $content->updateContent($title, $slug, $url, $data, $type, $filter, $published, $id);
	$print = $result;
}
$sql = "SELECT * FROM Content WHERE id = ?";
$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($id));

foreach($res as $c)
{
	$print .= 
	"
	<form action='content.php?p=content&amp;u=content/edit.php&amp;id=$id' method='POST'>
	Title: <input type='text' name='title' value='{$c->title}'/> <br>
	Slug: <input type='text' name='slug' value='{$slug}'/> <br>
	Url: <input type='text' name='url' value='{$url}'/> <br>
	Text: <textarea name='data'>{$data}</textarea> <br>
	Type: <input type='text' name='type' value='{$type}'/> <br>
	Filter: <input type='text' name='filter' value='{$filter}'/> <br>
	Publiserat: <input type='text' name='pubdate' value='{$published}'/> <br>
	<input type='hidden' name='isset' value='true'/>

	<input type='submit' value='Spara'> 
	<input type='reset' value='Återställ'>

	</form>
	";
}




?>