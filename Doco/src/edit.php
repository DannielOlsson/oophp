<?php
$id = isset($_GET['id']);

$sql = "SELECT * FROM content WHERE id = $id";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);

foreach($res as $val)
{

$print = 
"
<form action='insert.php' method='POST'>
Title: <input type='text' name='title' value='{$val->title}'> <br>
Slug: <input type='text' name='slug' value='{$val->slug}> <br>
Url: <input type='text' name='url' value='{$val->url}> <br>
Text: <input type='text' name='DATA' value='{$val->DATA}> <br>
Type: <input type='text' name='type' value='{$val->TYPE}> <br>
Filter: <input type='text' name='Filter' value='{$val->FILTER}> <br>
Publiserat: <input type='text' name='pubdate' value='{$val->published}> <br>

<input type='submit' value='Spara'> 
<input type='reset' value='Återställ'>

</form>

"
}

?>