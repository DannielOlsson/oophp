<?php

$id     = isset($_POST['id'])    ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
$title  = isset($_POST['title']) ? strip_tags($_POST['title']) : null;
$year   = isset($_POST['year'])  ? strip_tags($_POST['year'])  : null;
$image  = isset($_POST['image']) ? strip_tags($_POST['image']) : null;
$genre  = isset($_POST['genre']) ? $_POST['genre'] : array();
$save   = isset($_POST['save'])  ? true : false;

// Check if form was submitted
$output = null;
if($save) {
  $sql = '
    UPDATE Movie SET
      title = ?,
      year = ?
    WHERE 
      id = ?
  ';
  $params = array($title, $year, $id);
  $db->ExecuteQuery($sql, $params);
  $output = 'Informationen sparades.';
}
echo $output;
 
 
// Check that incoming parameters are valid
if(isset($_POST['id']))
{
	is_numeric($id) or die('Check: Id must be numeric.');
}
if(isset($_POST['genre']))
{
	is_array($genre) or die('Check: Genre must be array.');
}


if(isset($_POST['id']))
{
	$sql = 'SELECT * FROM Movie WHERE id = ?';
	$params = array($id);
	$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
 
	if(isset($res[0])) {
  	$movie = $res[0];
	}
	else 
	{
	  die('Failed: There is no movie with that id');
	}
		$print = "<form method='post'>
	  	<fieldset>
	  	<legend>Uppdatera info om film</legend>
	  	<input type='hidden' name='id' value='{$id}'/>
	  	<p><label>Titel:<br/><input type='text' name='title' value='{$movie->title}'/></label></p>
	  	<p><label>År:<br/><input type='text' name='year' value='{$movie->YEAR}'/></label></p>
		<p><label>Bild:<br/><input type='text' name='image' value='{$movie->image}'/></label></p>
		<p><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p>
		<output>{$output}</output>
		</fieldset>
		</form>";
	
}

else
{
	$sql = "SELECT * FROM Movie";
	$res = $db->ExecuteSelectQueryAndFetchAll($sql);

 $print = "<table border='1'>
		<th>Rad</th>
		<th>Id</th>
		<th>Bild</th>
		<th>Titel</th>
		<th>År</th>
		<th>Markera</th>
		<form action='' method='post'>";
		$counter = 0;

	foreach ($res as $key => $val)
	{
		$counter+=1;
		$print .= "<tr>
			<td>$key</td>
			<td>{$val->id}</td>
			<td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td>
			<td>{$val->title}</td>
			<td>{$val->YEAR}</td>
			<td><input type='radio' name='id' value='$counter'/></td>
		</tr>";
	} 
	$print .= "<input type='submit' value='Välj'/></form>";

}
?>