<?php

// Check that incoming parameters are valid
$id = isset($_POST['id']) ? $_POST['id'] : null;
is_numeric($id) or die('Check: Id must be numeric.');

$url    = isset($_POST['url'])   ? strip_tags($_POST['url']) : null;
$type   = isset($_POST['type'])  ? strip_tags($_POST['type']) : array();
 
$title  = isset($_POST['title']) ? $_POST['title'] : null;
$data   = isset($_POST['data'])  ? $_POST['data'] : array();

$date = date('NOW');

$sql = 'SELECT * FROM Content WHERE id = ?';
$res = $db->ExecuteSelectQueryAndFetchAll($sql, array($id));
$c   = $res[0];
 
$url    = htmlentities($c->url, null, 'UTF-8');
$type   = htmlentities($c->type, null, 'UTF-8');
$title  = htmlentities($c->title, null, 'UTF-8');
$data   = htmlentities($c->data, null, 'UTF-8');

$print = "
<form method='POST'>
Titel: <input type='text' name='title' value='$title'/>
Slug: <input type='text' name='slug' value='$slug'/>
URL: <input type='text' name='url' value='$url'/>
Text: <input type='text' name='text' value='$text'/>
Type: <input type='text' name='type' value='$type'/>
Filter: <input type='text' name='filter' value='$filter'/>
Publiceringsdatum: <input type='date' name='pubdate' value='$date'/>
<input type='submit' value='Spara'/>
<input type='reset' value='Återställ'/>
"


?>