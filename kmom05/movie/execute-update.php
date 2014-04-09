<?php


if(isset($_POST['counter']))
{
	$sql = 'SELECT * FROM Movie WHERE id = ?';
	$params = array($id);
	$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
 
	if(isset($res[0])) {
  	$movie = $res[0];
}
else {
  die('Failed: There is no movie with that id');
}
	$print = "<form method=post>
  	<fieldset>
  	<legend>Uppdatera info om film</legend>
  	<input type='hidden' name='id' value='{$id}'/>
  	<p><label>Titel:<br/><input type='text' name='title' value='{$movie->title}'/></label></p>
  	<p><label>År:<br/><input type='text' name='year' value='{$movie->year}'/></label></p>
	<p><label>Bild:<br/><input type='text' name='image' value='{$movie->image}'/></label></p>
	<p><input type='submit' name='save' value='Spara'/> <input type='reset' value='Återställ'/></p>
	<output>{$output}</output>
	</fieldset>
	</form>";
	
}

